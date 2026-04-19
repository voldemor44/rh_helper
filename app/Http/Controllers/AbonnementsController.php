<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tarifs;
use App\Models\Abonnements;
use App\Models\Entreprise;
use App\Models\ModePaiement;
use Illuminate\Http\Request;
use App\Models\TypeEntreprise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AbonnementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function show(Abonnements $abonnements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonnements $abonnements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abonnements $abonnements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonnements $abonnements)
    {
        //
    }

    public function freeOffer(Request $request)
    {
        // $request->authenticate();

        // $request->session()->regenerate();
        //Abonnements
        $type_entreprise = $request->query('type_entreprise');
        $entreprise_id = $request->query('entreprise_id');

        ///  $tarif_id = TypeEntreprise::where('type_entreprise', $type_entreprise)->get();
        //dd($tarif_id);

        $abonnements =  Abonnements::create([
            'date_debut' => Carbon::now(),
            'date_fin' => Carbon::now()->addDays(15),
            'entreprise_id' => $entreprise_id,
            'tarif_id' =>  $type_entreprise
        ]);

    //    $abonnements->save();

        $user_id = $request->query('user');
        $user = User::find($user_id);

        // Authentifier l'utilisateur
        Auth::login($user);

        // Notification::send($user, new WelcomeNotification);

        // Récupérer les rôles de l'utilisateur (s'il est authentifié)
        if (Auth::check()) {
            $roles = Auth::user()->roles;

            // Vérifier le rôle de l'utilisateur
            if ($roles->contains('nom', 'Administrateur')) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($roles->contains('nom', 'Utilisateur')) {
                return redirect()->intended('/user/dashboard');
            }
        }

        // Redirection par défaut si l'utilisateur n'est pas authentifié ou les rôles ne correspondent pas
        Auth::logout();
        Session::flush();
        return redirect()->intended('/login');

    }

    public function paidOffer(Request $request)
    {
       // dd('hello');
       $modespaiements = ModePaiement::all();
        $type_entreprise = $request->query('type_entreprise');
        $entreprise_id = $request->query('entreprise_id');
       $tarif = Tarifs::where('id', $type_entreprise)->first();
       $entreprise = Entreprise::find($entreprise_id);
        return view('auth.inscription-paiement', compact('tarif', 'entreprise', 'modespaiements'));
    }

    public function subscription(Request $request){

       //dd($request);
       

    }
}
