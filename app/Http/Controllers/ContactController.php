<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Contact;
use App\Models\TypeContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //

    public function contact(){

       $idAdmin = Auth::user()->id;
       $user = User::find($idAdmin);
       $entrepriseAdmin = $user->entreprise_id;
      // dd($entrepriseAdmin);
        $Type_contacts = TypeContact::all();
        $contacts = Contact::where('entreprise_id', $entrepriseAdmin )->with('typeContact')->paginate(8);

        // $contacts = Contact::paginate(8);
        return view('contacts.contacts', compact('contacts', 'Type_contacts'));
    }

    // public function contactslist()
    // {
    //     $Type_contacts = TypeContact::all();
    //     $contacts = Contact::with('typeContact')->get();
    //     // dd($contacts);
    //     return view('contacts.contacts_list', compact('contacts', 'Type_contacts'));
    //     // return $dataTable->render('contacts.contacts_list');
    // }

    public function store(Request $request){
        // $request->validate([
        //     'Entreprise' => 'required|string',
        //     'typeContact' => 'required|numeric',
        //     'nom' => 'required|string',
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Contact::class],
        //     'fonction' => 'required|string',
        //     'telephone' => 'required|string',
        // ]);

     //   dd($request);


        $existingContact = Contact::where('email', $request->email)->first();
        if ($existingContact) {
            return redirect()->back()->with('error', 'Un contact avec la même adresse e-mail existe déjà.');
        }

        //Id de l'entreprise de l'administrateur
         $entreprise_id = Auth::user()->entreprise_id;



        $contact =  Contact::create([
            "id" => Uuid::uuid4()->toString(),
            'Entreprise' => $request->entreprise,
            'type_contact_id' => $request->typeContact,
            'nom' => $request->nom,
            'email' => $request->email,
            'fonction' => $request->fonction,
            'telephone' => $request->telephone,
            'entreprise_id' => $entreprise_id
        ]);


      //  dd($contact);


        return redirect()->back()->with('success', 'Le contact a été enregistré avec succès.');

    }


    public function edit(Request $request)
    {

        $id = $request->query('id');
        dd($id);
        // Rechercher le contact par son ID
    //     $contact = Contact::find($id)->with('typeContact')->first();
    //     $typesContact = TypeContact::all();

    //    // dd($contact);

    //     // Vérifier si le contact existe
    //     if (!$contact) {
    //         // Retourner une réponse appropriée si le contact n'est pas trouvé
    //         return response()->json(['error' => 'Contact not found'], 404);
    //     }

    //  //   dd($contact);

    //     // Retourner les détails du contact
    //     return response()->json(['contact' => $contact, 'typesContact' => $typesContact]);
    }

}
