<?php

use Inertia\Inertia;
use App\Models\League;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PanController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\LanguageStoreController;



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });

Route::get('/privacy',function(){
    return Inertia::render('PrivacyPolicy');
})->name('privacy');

Route::get('/terms',function(){
    return Inertia::render('Terms');
})->name('terms');

Route::get('/dashboard',[PanController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/about',AboutController::class)->name('about');
Route::get('/matches/{matchId}', [FootballController::class, 'show'])->name('match.show');
Route::get('/{league:code?}', [FootballController::class, 'index'])->name('football');

Route::post('/language',LanguageStoreController::class)->name('language.store');



// Route::get('/dashboard/{league?}',LeagueController::class);