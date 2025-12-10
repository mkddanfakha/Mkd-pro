<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Exclure CSRF pour les routes API qui utilisent la session (captcha)
        $middleware->validateCsrfTokens(except: [
            'api/v1/simple-captcha*',
            'api/v1/contact',
        ]);

        // Forcer HTTPS pour toutes les requêtes (sauf en local)
        $middleware->append(\App\Http\Middleware\ForceHttps::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
