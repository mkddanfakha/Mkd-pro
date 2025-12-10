<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\SimpleCaptchaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes publiques de l'API MKD-pro
Route::prefix('v1')->group(function () {
    // Page d'accueil - toutes les données
    Route::get('/home', [HomeController::class, 'index']);

    // Services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);

    // Portfolio / Projets
    Route::get('/portfolio', [ProjectController::class, 'index']);
    Route::get('/portfolio/{id}', [ProjectController::class, 'show']);

    // À propos
    Route::get('/about', [AboutController::class, 'index']);

    // Routes nécessitant la session (captcha et contact)
    // Note: Le middleware 'web' active la session mais désactive CSRF pour les routes API
    Route::middleware(['web'])->group(function () {
        // Contact
        Route::post('/contact', [ContactController::class, 'store']);

        // Simple Math Captcha
        Route::get('/simple-captcha', [SimpleCaptchaController::class, 'generate']);
        Route::post('/simple-captcha/verify', [SimpleCaptchaController::class, 'verify']);
    });
});

