<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Vérifie si l'utilisateur est connecté ET si son rôle est 'admin'.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté ET si son rôle est 'admin'
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request); // Autorise l'accès
        }

        // Sinon, on le redirige vers la page de connexion
        return redirect('/login');
    }
}
