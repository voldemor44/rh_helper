<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Fonctions;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FonctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonctions::all();
        $departements = Departement::all();

        return view('employeeManagement.fonctions', compact('fonctions', 'departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, NotificationsController $notificationsController)
    {
        Fonctions::create([
            'id' => Uuid::uuid4()->toString(),
            'nom' => $request->nom,
            'departement_id' => $request->departement,
            'entreprise_id' => Auth::user()->entreprise_id 
        ]);

        $data = [
            'contenu' => 'Vous avez ajouté une fonction'
        ];

        // Appel de la méthode notify() du contrôleur NotificationsController 
       // $notificationsController->notify($data);

        return redirect()->route('fonctions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonctions  $fonctions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonction = Fonctions::findOrFail($id);
        $departements = Departement::all();

        return view('fonction.edit-fonction', compact('fonction', 'departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonctions  $fonctions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonctions  $fonctions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fonction = Fonctions::findOrFail($id);
        if ($fonction->nom != $request->nom) {
            $fonction->update([
                'nom' => $request->nom
            ]);
        }

        if ($fonction->departement_id != $request->departement) {
            $fonction->update([
                'departement_id' => $request->departement
            ]);
        }

        return redirect()->route('fonctions.index'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonctions  $fonctions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fonction = Fonctions::findOrFail($id);
        $fonction->delete();

        return redirect()->route('fonctions.index');
    }

    public function destroyPage($id)
    {
        $fonction = Fonctions::findOrFail($id);

        return view('fonction.delete-fonction', compact('fonction'));
    }
}
