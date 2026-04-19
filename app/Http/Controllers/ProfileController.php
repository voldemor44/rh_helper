<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ContactsUrgences;
use App\Models\InfosPersonelles;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{



    public function viewUserProfil($id)
    {
        $user = User::findOrFail($id);
        return view('profile.user-profile', compact('user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user()

        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {

        $employee = User::findOrFail(Auth::user()->id);

        // validation du formulaire
        $request->validate([]);

        $name_employee = $request->name;
        $tel_employee = $request->tel;
        $email_employee = $request->email;

        $date_naissance_employee = $request->date_naissance;
        $adresse_employee = $request->adresse;
        $genre_employee = $request->genre;

        $ifu = $request->ifu;
        $nationalite = $request->nationalite;
        $religion = $request->religion;
        $civil = $request->civil;
        $age = $request->age;
        $numBank = $request->numBank;

        $contact_urgence1 = [$request->nom1, $request->relation1, $request->num1];
        $contact_urgence2 = [$request->nom2, $request->relation2, $request->num2];


        $infos = InfosPersonelles::where('user_id', Auth::user()->id)->first();
        $urgence_contact = ContactsUrgences::where('user_id', Auth::user()->id)->first();



        if ($contact_urgence1[0] != null && $contact_urgence1[1] != null && $contact_urgence1[2] != null) {
            if ($urgence_contact) {
                if (ContactsUrgences::where('telephone', $contact_urgence1[2])->first() != null) {
                    $contact = ContactsUrgences::where('telephone', $contact_urgence1[2])->first();
                    $contact->update([
                        'nom' => $contact_urgence1[0],
                        'relation' => $contact_urgence1[1],
                        'telephone' => $contact_urgence1[2]
                    ]);
                }
            } else {
                ContactsUrgences::create([
                    'user_id' => Auth::user()->id,
                    'nom' => $contact_urgence1[0],
                    'relation' => $contact_urgence1[1],
                    'telephone' => $contact_urgence1[2]

                ]);
            }
        }

        if ($contact_urgence2[0] != null && $contact_urgence2[1] != null && $contact_urgence2[2] != null) {

            if ($urgence_contact) {
                if (ContactsUrgences::where('telephone', $contact_urgence2[2])->first() != null) {
                    $contact = ContactsUrgences::where('telephone', $contact_urgence2[2])->first();
                    $contact->update([
                        'nom' => $contact_urgence2[0],
                        'relation' => $contact_urgence2[1],
                        'telephone' => $contact_urgence2[2]
                    ]);
                }
            } else {
                ContactsUrgences::create([
                    'user_id' => Auth::user()->id,
                    'nom' => $contact_urgence2[0],
                    'relation' => $contact_urgence2[1],
                    'telephone' => $contact_urgence2[2]
                ]);
            }
        }


        if ($date_naissance_employee != null || $adresse_employee != null || $genre_employee != null) {
            if ($infos) {

                $infos->update([
                    'date_de_naissance' => $date_naissance_employee,
                    'adresse' => $adresse_employee,
                    'genre' => $genre_employee
                ]);
            } else {

                InfosPersonelles::create([
                    'user_id' => Auth::user()->id,
                    'date_de_naissance' => $date_naissance_employee,
                    'adresse' => $adresse_employee,
                    'genre' => $genre_employee
                ]);
            }
        }



        if ($ifu != null || $nationalite != null || $religion != null || $civil != null || $age != null || $numBank != null) {

            if ($ifu != '' || $nationalite != '' || $religion != '' || $civil != '' || $age != '' || $numBank != '') {
                if ($infos) {
                    $infos->update([
                        'numero_ifu' => $ifu,
                        'nationalite' => $nationalite,
                        'religion' => $religion,
                        'etat_civil' => $civil,
                        'age_actuel' => $age,
                        'n_compte_bancaire' => $numBank,

                    ]);
                } else {
                    InfosPersonelles::create([
                        'user_id' => Auth::user()->id,
                        'numero_ifu' => $ifu,
                        'nationalite' => $nationalite,
                        'religion' => $religion,
                        'etat_civil' => $civil,
                        'age_actuel' => $age,
                        'n_compte_bancaire' => $numBank,

                    ]);
                }
            }
        }




        if ($name_employee != $employee->name && $name_employee != null) {
            $employee->update([
                'name' => $name_employee
            ]);
        }
        if ($tel_employee != $employee->telephone && $tel_employee != null) {
            $employee->update([
                'telephone' => $tel_employee
            ]);
        }
        if ($email_employee != $employee->email && $email_employee != null) {
            $employee->update([
                'email' => $email_employee
            ]);
        }

        // Sauvegarde du fichier
        if ($request->file) {
            $filename = time() . '.' . $request->file->extension();
            $path = $request->file->storeAs('photos', $filename, 'public');
        }
        $media = new Media();

        if ($request->file) {

            $media->nom = $employee->name;
            $media->path = $path;

            if (Auth::user()->media) {

                $media = Auth::user()->media;
                $media->update([
                    'path' => $path
                ]);
            } else {
                $employee->media()->save($media);
            }
        }


        return redirect()->route('profile.edit');
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
