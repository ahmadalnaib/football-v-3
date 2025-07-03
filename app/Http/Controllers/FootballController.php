<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\LeagueResource;

class FootballController extends Controller
{
    public function index(League $league)
    {
        if (!$league->exists) {
            $league = League::where('code', 'PL')->first() ?? League::first();
        }
// old data
        $start = Carbon::create(2024, 4, 1)->toDateString(); // April 1st, 2024
$end = Carbon::create(2024, 4, 30)->toDateString(); // April 30th, 2024
        // $start = now()->startOfWeek(Carbon::MONDAY)->toDateString();
        // $end = now()->endOfWeek(Carbon::SUNDAY)->toDateString();


    
        $language = app()->getLocale();
    
        // Cache match results for 5 minutes
        $cacheKey = "matches_{$league->code}_{$start}_{$end}";
        $matches = Cache::remember($cacheKey, 5 * 60, function () use ($league, $start, $end) {
            try {
                $response = Http::withHeaders([
                    'X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')
                ])->get("https://api.football-data.org/v4/competitions/{$league->code}/matches?dateFrom={$start}&dateTo={$end}");

                if ($response->ok()) {
                    return $response->json()['matches'];
                }
                throw new \Exception('Failed to fetch matches from Football Data API.');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return [];
            }
        });

        // Cache AI analysis for 1 day
        foreach ($matches as &$match) {
            $analysisCacheKey = "match_analysis_{$match['id']}";
            
            // Check if AI analysis already exists (first guess)
            if (Cache::has($analysisCacheKey)) {
                $match['analysis'] = Cache::get($analysisCacheKey); // Use the first cached analysis
            } else {
                // If no cached analysis exists, request it from OpenAI and cache it permanently
                $match['analysis'] = Cache::rememberForever($analysisCacheKey, function () use ($match) {
                    try {
                        $analysisResponse = Http::withHeaders([
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
                        ])->post('https://api.openai.com/v1/chat/completions', [
                            'model' => 'gpt-4o-mini',
                            'messages' => [
                                [
                                    'role' => 'user',
                                    'content' => "Analyze the following football match and provide the winning or draw probabilities for each team in the format 'Team Name: Probability%'. Ensure that the probabilities add up to 100% and there are no extra lines or text:\n" . json_encode($match)
                                ]
                            ]
                        ]);
        
                        if ($analysisResponse->ok()) {
                            return $analysisResponse->json()['choices'][0]['message']['content'];
                        }
                        throw new \Exception('OpenAI analysis failed');
                    } catch (\Exception $e) {
                        Log::error($e->getMessage());
                        return 'Analysis failed';
                    }
                });
            }
        }
        
     
        $summaryCacheKey = "summary_{$league->code}_{$start}_{$end}_{$language}";
        $summary = Cache::remember($summaryCacheKey, 60 * 60 * 24, function () use ($matches, $language) {
            try {
                $language = app()->getLocale();
                $summaryResponse = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
                ])->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o-mini',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Respond in {$language}. Select the most exciting football matches happening this week and craft a short, energetic sentence that will excite and engage the user:\n" . json_encode($matches)
                        ]
                    ]
                ]);
    
                if ($summaryResponse->ok()) {
                    return $summaryResponse->json()['choices'][0]['message']['content'];
                }
                throw new \Exception('Failed to generate summary from OpenAI');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return 'Summary generation failed';
            }
        });

        return Inertia::render('Football', [
            'matches' => $matches,
            'league' => LeagueResource::make($league),
            'leagues' => LeagueResource::collection(League::get()),
            'summary' => $summary
            
        ]);
    }

    public function show($matchId)
    {
        // Define cache keys
        $matchCacheKey1 = "match1_data_{$matchId}"; // Cache key for match data
        $language = app()->getLocale();
        $analysisCacheKey1 = "match1_analysis_{$matchId}_{$language}"; // Locale-specific cache key for match analysis
    
        // Fetch match data from the football API with short-lived cache (e.g., 5 minutes)
        $match = Cache::remember($matchCacheKey1, 5 * 60, function () use ($matchId) {
            try {
                $response = Http::withHeaders([
                    'X-Auth-Token' => env('FOOTBALL_DATA_API_KEY')
                ])->get("https://api.football-data.org/v4/matches/{$matchId}");
    
                if ($response->ok()) {
                    return $response->json();
                } else {
                    throw new \Exception('Failed to fetch match data');
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return null; // Return null to indicate failure
            }
        });
    
        // Handle case where match data is not available
        if (!$match) {
            return Inertia::render('MatchAnalysis', [
                'leagues' => LeagueResource::collection(League::get()),
                'match' => [],
                'analysis' => 'Match data not available',
            ]);
        }
    
        // Fetch AI analysis from cache or make a new request with long-lived cache (e.g., 1 week)
        $analysis = Cache::remember($analysisCacheKey1, 7 * 24 * 60 * 60, function () use ($match, $language) {
            try {
                $language = app()->getLocale();
                $analysisResponse = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
                ])->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o-mini',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Respond in {$language}. Analyze this football match briefly and explain why one team is favored to win or draw the teams in three to four sentences. Also, predict the final result:\n" . json_encode($match)
                        ]
                    ]
                ]);
    
                if ($analysisResponse->ok()) {
                    return $analysisResponse->json()['choices'][0]['message']['content'];
                } else {
                    throw new \Exception('OpenAI analysis failed');
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return 'Analysis failed'; // Return a default value in case of failure
            }
        });
    
        return Inertia::render('MatchAnalysis', [
            'leagues' => LeagueResource::collection(League::get()),
            'match' => $match,
            'analysis' => $analysis,
            'language' => $language
        ]);
    }
}