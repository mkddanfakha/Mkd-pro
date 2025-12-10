<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Symfony\Component\HttpFoundation\Response;

class EnableSessionForApi
{
    /**
     * Handle an incoming request.
     * Active la session pour les routes API qui en ont besoin (captcha)
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Utiliser le middleware StartSession pour activer la session
        $sessionMiddleware = new StartSession(
            app(\Illuminate\Contracts\Session\SessionManager::class),
            app(\Illuminate\Contracts\Cookie\QueueingFactory::class)
        );

        return $sessionMiddleware->handle($request, function ($request) use ($next) {
            return $next($request);
        });
    }
}
