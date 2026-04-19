<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Ramsey\Uuid\Uuid;
use App\Models\Parametres;
use Illuminate\Http\Request;
use App\Models\ParametresMedias;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ParametreController extends Controller
{
    //

    public function entreprise()
    {
        //AdminEntrepriseId
        $entreprise_id = Auth::user()->entreprise_id;


        $infoEntreprise = Parametres::where('entreprise_id', $entreprise_id)->first();

        return view('parametres.entreprise', compact('infoEntreprise'));
    }

    public function modifierMotDePasse()
    {
        return view('parametres.password');
    }

    public function theme()
    {
           //AdminEntrepriseId
           $entreprise_id = Auth::user()->entreprise_id;
        $parametres = Parametres::where('entreprise_id', $entreprise_id)->with('image')->first();
       // dd($parametres);
        return view('parametres.theme', compact('parametres'));
    }

    public function modifier_motDePasse(Request $request)
    {

        // dd($request);

        $user = Auth::user();
        $user_password = $user->password;
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if (Hash::check($old_password, $user_password)) {

            $user->password = Hash::make($new_password);
            $user->save();

            return redirect()->back()->with('success', 'Mot de passe modifié avec succès.');
        } else {
            return redirect()->back()->with('error', 'Ancien mot de passe est incorrect.');
        }
    }

    public function modifierTheme(Request $request, $id = null)
    {

        //AdminEntrepriseId
        $entreprise_id = Auth::user()->entreprise_id;

        //  dd($request);
        $parametre = Parametres::where('entreprise_id', $entreprise_id)->first();
        //    dd($parametre);
        //Logo Limuneux
        if ($request->hasFile('logolimineux')) {
            // Si une nouvelle image est téléchargée, on la traite


            // Suppression de l'ancienne image, s'il y en a une
            // if (isset($parametre) &&  $parametre->image) {
            //     Storage::delete($parametre->image->path);
            //     $parametre->image->delete();
            // }

            // $logolimineux = $request->file('logolimineux');
            // $path = $logolimineux->store('entreprises_medias', 'public');
            // $name = $logolimineux->getClientOriginalName();

            // $image = new ParametresMedias();
            // $image->path = $path;
            // $image->name = $name;
            // $image->type = "logolimineux";

            // $parametre->image()->save($image);
            $parametre->image()->where('type', 'logolimineux')->delete();
            // Traitez le nouveau média
            $logolimineux = $request->file('logolimineux');
            $path = $logolimineux->store('entreprises_medias', 'public');
            $name = $logolimineux->getClientOriginalName();

            $image = new ParametresMedias();
            $image->path = $path;
            $image->name = $name;
            $image->type = "logolimineux";

            $parametre->image()->save($image);

            //   var_dump($image);
        }


        //favicon

        if ($request->hasFile('favicon')) {
            // Si une nouvelle image est téléchargée, on la traite
            //   $parametre = Parametres::findOrFail($request->website_name);

            // Suppression de l'ancienne image, s'il y en a une
            // if ($parametre->image) {
            //     Storage::delete($parametre->image->path);
            //     $parametre->image->delete();
            // }

            // $logolimineux = $request->file('favicon');
            // $path = $logolimineux->store('entreprises_medias', 'public');
            // $name = $logolimineux->getClientOriginalName();

            // $image = new ParametresMedias();
            // $image->path = $path;
            // $image->name = $name;
            // $image->type = "favicon";

            // $parametre->image()->save($image);

            $parametre->image()->where('type', 'favicon')->delete();
            // Traitez le nouveau média
            $favicon = $request->file('favicon');
            $path = $favicon->store('entreprises_medias', 'public');
            $name = $favicon->getClientOriginalName();

            $image = new ParametresMedias();
            $image->path = $path;
            $image->name = $name;
            $image->type = "favicon";

            $parametre->image()->save($image);
        }

        //Message de succès



        return redirect()->back()->with('success', 'Les images ont été enregistrées.');
    }

    public function modifierParametre(Request $request, $id = null)
    {

        //AdminEntrepriseId
        $entreprise_id = Auth::user()->entreprise_id;


        //  dd($request);
        if ($id === null) {
            $parametres = new Parametres();
        } else {
            // Sinon, nous essayons de trouver un paramètre existant par son ID
            $parametres = Parametres::findOrFail($id);
        }



        // Mettre à jour les propriétés du paramètre avec les données validées
        $parametres->id = Uuid::uuid4()->toString();
        $parametres->nom = $request->nom;
        $parametres->adresse = $request->adresse;
        $parametres->pays = $request->pays;
        $parametres->ville = $request->ville;
        $parametres->etat = $request->etat;
        $parametres->codePostal = $request->codePostal;
        $parametres->email = $request->email;
        $parametres->telephone = $request->telephone;
        $parametres->fax = $request->fax;
        $parametres->siteWeb = $request->siteWeb;
        $parametres->entreprise_id = $entreprise_id;

        // Sauvegarder le paramètre
        $parametres->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Les paramètres ont été modifiés.');
    }
}
