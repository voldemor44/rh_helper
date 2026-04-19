<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyRoutesController extends Controller
{
    public function verifyDashboard()
    {

        $user = Auth::user();

        $roles = $user->roles;

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
            return redirect()->intended('/');
        }
    }
}
