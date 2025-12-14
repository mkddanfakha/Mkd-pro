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
        // Vérifier aussi si on est en localhost pour éviter les problèmes en développement
        $isLocal = config('app.env') === 'local' 
            || config('app.env') === 'testing'
            || $request->getHost() === 'localhost'
            || $request->getHost() === '127.0.0.1'
            || str_contains($request->getHost(), '.local');
        
        if (!$isLocal && config('app.env') === 'production') {
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
