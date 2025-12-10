<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     * Force l'utilisation de HTTPS en redirigeant toutes les requêtes HTTP vers HTTPS
     * (sauf en environnement local)
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ne forcer HTTPS qu'en production
        if (config('app.env') === 'production') {
            // Vérifier si la requête n'est pas en HTTPS
            // Note: $request->secure() vérifie aussi les headers X-Forwarded-Proto
            if (!$request->secure()) {
                // Rediriger vers HTTPS en conservant l'URI complète
                return redirect()->secure($request->getRequestUri(), 301);
            }
        }

        return $next($request);
    }
}
