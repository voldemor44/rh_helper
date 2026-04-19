<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function counterBar()
    {
        if (Projet::where('entreprise_id', Auth::user()->entreprise_id)->count() !== 0) {
            $data = [
                'tr' => ((Projet::where('entreprise_id', Auth::user()->entreprise_id)
                    ->where('statut', 'Archivé')->count())
                    / (Projet::where('entreprise_id', Auth::user()->entreprise_id)->count())) * 100
            ];
        } else {
            $data = [
                'tr' => 0
            ];
        }

        return response()->json($data);
    }
}
