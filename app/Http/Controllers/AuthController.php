<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Traite l'inscription (via le formulaire web)
     */
    public function register(Request $request)
    {
        // 1. Valider les données reçues du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Créer l'utilisateur dans la base de données
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Par défaut, un nouvel inscrit est un simple utilisateur
        ]);

        // 3. Connecter l'utilisateur immédiatement
        Auth::login($user);

        // 4. Rediriger vers le tableau de bord qui correspond à son rôle
        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    /**
     * Traite la connexion (via le formulaire web)
     */
    public function login(Request $request)
    {
        // 1. Valider les données
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Tenter de connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            // Connexion réussie ! On régénère la session pour des raisons de sécurité.
            $request->session()->regenerate();

            // 3. Rediriger selon le rôle
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/user/dashboard');
        }

        // 4. Si la connexion échoue
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas.',
        ])->onlyInput('email');
    }

    /**
     * Déconnexion (web)
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // ==========================================
    // MÉTHODES API JWT (PARTIE 9)
    // ==========================================

    /**
     * API: Inscription
     */
    public function apiRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Générer un token JWT pour l'utilisateur qui vient de s'inscrire
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $token
        ], 201);
    }

    /**
     * API: Connexion
     */
    public function apiLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // Tenter de générer un token avec les identifiants
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Identifiants invalides'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Impossible de créer le token'], 500);
        }

        // Succès : on retourne le token et les infos de l'utilisateur
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => auth()->user()
        ]);
    }

    /**
     * API: Obtenir le profil de l'utilisateur connecté
     * (Cette route est protégée par le middleware 'auth:api')
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }
}
