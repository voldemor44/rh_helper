<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Departement;
use App\Models\Departements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();

        return view('employeeManagement.departement', compact('departements'));
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
        // dd(Auth::user()->entreprise_id);
        Departement::create([
            'id' => Uuid::uuid4()->toString(),
            'nom' => $request->nom,
            'entreprise_id' => Auth::user()->entreprise_id
        ]);

        $data = [
            'contenu' => 'Vous avez ajouté un département'
        ];

        // Appel de la méthode notify() du contrôleur NotificationsController 
       // $notificationsController->notify($data);

        return redirect()->route('departements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departement = Departement::findOrFail($id);

        return view('departement.edit-departement', compact('departement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('Yeah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, NotificationsController $notificationsController)
    {
        $departement = Departement::findOrFail($id);
        if ($departement->nom != $request->nom) {
            $departement->update([
                'nom' => $request->nom
            ]);


            $data = [
                'contenu' => 'Vous avez modifié un département'
            ];

            // Appel de la méthode notify() du contrôleur NotificationsController
            $notificationsController->notify($data);
        }

        return redirect()->route('departements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, NotificationsController $notificationsController)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();


        $data = [
            'contenu' => 'Vous avez supprimé un département'
        ];

        // Appel de la méthode notify() du contrôleur NotificationsController
        $notificationsController->notify($data);

        return redirect()->route('departements.index');
    }

    public function destroyPage($id)
    {
        $departement = Departement::findOrFail($id);

        return view('departement.delete-departement', compact('departement'));
    }
}
