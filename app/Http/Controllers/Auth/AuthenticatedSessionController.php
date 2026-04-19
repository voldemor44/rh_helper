<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        //  return redirect()->intended(RouteServiceProvider::HOME);


        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        //Notification::send($user, new WelcomeNotification);

        $roles = $user->roles;

        // Vérifier le rôle de l'utilisateur
        if ($roles->contains('nom', 'Administrateur')) {
            return redirect()->intended('/admin/dashboard');
        } elseif ($roles->contains('nom', 'Utilisateur')) {
            return redirect()->intended('/user/dashboard');
        }
        elseif($roles->contains('nom', 'SuperAdmin')){
            return redirect()->intended('/superAdmin/dashboard');
        }
        // elseif($roles->contains('nom', 'Manager')){
        //     return redirect()->intended('/manager/dashboard');

        // }
        else {
            // Redirection par défaut si le rôle n'est pas reconnu
            Auth::logout();
            Session::flush();
            return redirect()->intended('/login');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
