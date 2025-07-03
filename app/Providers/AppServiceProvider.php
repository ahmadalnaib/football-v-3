<?php

namespace App\Providers;

use App\Models\League;
use Pan\PanConfiguration;
use App\Observers\LeagueObserver;
use App\Http\Resources\LeagueResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        PanConfiguration::unlimitedAnalytics();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
      JsonResource::withoutWrapping();
      
    }
}
