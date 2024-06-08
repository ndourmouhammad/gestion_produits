<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('utilisateurs.auth.register');
    }

    public function showLoginForm()
    {
        return view('utilisateurs.auth.login');
    }

    public function register(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Créer un nouvel enregistrement utilisateur
        User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'password' => Hash::make($request->password), // Utiliser Hash::make() pour hacher le mot de passe
            'role' => 'user_simple', // Définir un rôle par défaut pour les nouveaux utilisateurs
        ]);

        // Rediriger avec un message de succès après l'inscription
        return redirect(route('login'))->with('success', 'Inscription réussie');
    }

    public function login(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Tentative d'authentification avec les informations d'identification fournies
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Vérifier le rôle de l'utilisateur
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Rediriger l'administrateur vers le tableau de bord administrateur
                return redirect()->intended('/admin');
            } else {
                // Rediriger l'utilisateur vers la page d'accueil
                return redirect()->intended('/');
            }
        }

        // Authentification échouée, rediriger avec une erreur
        return back()->withErrors([
            'email' => 'Email invalide ou mot de passe incorrect !',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'User successfully logged out'], 200);
    }
}
