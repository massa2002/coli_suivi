<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Destinataire;
use App\Models\Expediteur;
class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.custom_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
    
        // Vérifier si le nom existe dans Destinataire
        $destinataire = Destinataire::where('nom', $request->name)->first();
        if ($destinataire) {
            Auth::loginUsingId($destinataire->id); // Authentifier l'utilisateur
            session(['user' => $destinataire, 'role' => 'destinataire']);
            return redirect()->route('dashboard.visiteur');
        }
    
        // Vérifier si le nom existe dans Expediteur
        $expediteur = Expediteur::where('nom', $request->name)->first();
        if ($expediteur) {
            Auth::loginUsingId($expediteur->id);
            session(['user' => $expediteur, 'role' => 'expediteur']);
            return redirect()->route('dashboard.visiteur');
        }
    
        return redirect()->route('custom.login.form')->withErrors(['name' => 'Nom d’utilisateur introuvable.']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('custom.login.form');

    }
}