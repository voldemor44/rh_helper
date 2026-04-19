<?php

namespace App\Http\Controllers;

use App\Models\StatutUtilisateur;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = StatutUtilisateur::all();

        return view('employeeManagement.status', compact('statuts'));
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
        StatutUtilisateur::create([
            'statut' => $request->nom
        ]);

        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statut = StatutUtilisateur::findOrFail($id);

        return view('statut.edit-statut', compact('statut'));
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
        $statut = StatutUtilisateur::findOrFail($id);
        if ($statut->statut != $request->statut) {
            $statut->update([
                'statut' => $request->statut
            ]);
        }

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statut = StatutUtilisateur::findOrFail($id);
        $statut->delete();

        return redirect()->route('status.index');
    }
    public function destroyPage($id)
    {
        $statut = StatutUtilisateur::findOrFail($id);

        return view('statut.delete-statut', compact('statut'));
    }
}
