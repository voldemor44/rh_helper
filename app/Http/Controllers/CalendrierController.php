<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\TypeEvenement;
use Illuminate\Support\Facades\Auth;

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_evenements = TypeEvenement::all();
        $evenements = Evenement::all();
        $events = array();
        foreach($evenements as $evenement){
            $color = null;
            if($evenement->titre == 'Test'){
                $color = '#924ACE';
            }
            $events[] = [
                'id' => $evenement->id,
                'title'=> $evenement->titre,
                 //'description' => $evenement->description,
                    'start'=> $evenement->date_debut,
                    'end' => $evenement->date_fin,
                    'color'  => $color,
            ];
        }

        if (Auth::user()->roles->contains('nom', 'Administrateur')){
            return view('calendriers.index', ['events' => $events, 'type_evenements' => $type_evenements]);

        }
else{
    return view('calendriers.user_index', ['events' => $events, 'type_evenements' => $type_evenements]);

}
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

        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
        ]);


       $evenement =  Evenement::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'user_id'=> Auth::user()->id,
            'type_evenement_id' => $request->type_evenement,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        $color = null;

        if($evenement->title == 'Test') {
            $color = '#924ACE';
        }

        return response()->json([
            'id' => $evenement->id,
            'titre' => $evenement->titre,
            'description' => $evenement->description,
            'type_evenement_id' => $evenement->type_evenement_id,
            'date_debut' => $evenement->date_debut,
            'date_fin' => $evenement->date_fin,
            'color' => $color ? $color: '',

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $evenement = Evenement::find($id);
        if(!$evenement){
            return response()->json([
                'error' => 'Impossible de localiser l\'événement'
            ], 404);
        }

        if (!Auth::user()->roles->contains('nom', 'Administrateur')) {
            return response()->json([
                'error' => 'Vous n\'êtes pas autorisé(e) à effectuer cette action. Vos modifications ne seront pas pris en compte.'
            ], 403);
        }

        $evenement->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        return response()->json('Événement mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
               $evenement =  Evenement::find($id);
               if(! $evenement){
                return response()->json([
                    'error' => 'Impossible de localiser l\'événement'
                ], 404);
               }

               if (!Auth::user()->roles->contains('nom', 'Administrateur')) {
                return response()->json([
                    'error' => 'Vous n\'êtes pas autorisé(e) à effectuer cette action. Vos modifications ne seront pas pris en compte.'
                ], 403);
            }

               $evenement->delete();
               return $id;
    }
}
