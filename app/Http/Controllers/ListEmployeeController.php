<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Mail\ToUserMail;
use App\Models\Fonction;
use App\Models\RoleUser;
use App\Models\Fonctions;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\StatutUtilisateur;
use App\Models\ManagerDepartement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ListEmployeeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $employee;
    public function list()
    {
        $employees = User::where('entreprise_id', Auth::user()->entreprise_id)->get();
        $statut_users = StatutUtilisateur::all();
        $fonctions = Fonctions::where('entreprise_id', Auth::user()->entreprise_id)->get();
        $departements = Departement::where('entreprise_id', Auth::user()->entreprise_id)->get();

        $roles = Role::skip(1)->take(3)->get();

        $my_departement_functions = Fonctions::where('entreprise_id', Auth::user()->entreprise_id)
            ->where('departement_id', Auth::user()->departement_id)
            ->get();

        $members_departements = [];

        if (Auth::user()->roles->contains('nom', 'Manager')) {
            $members_departements = User::where('entreprise_id', Auth::user()->entreprise_id)
                ->where('departement_id', Auth::user()->departement_id)
                ->get();
        }

        return view(
            'employeeManagement.list-employees-table',
            compact(
                'employees',
                'members_departements',
                'statut_users',
                'fonctions',
                'departements',
                'roles',
                'my_departement_functions'
            )
        );
    }

    public function index()
    {
        $employees = User::where('entreprise_id', Auth::user()->entreprise_id)->paginate(8);
        $statut_users = StatutUtilisateur::all();
        $fonctions = Fonctions::where('entreprise_id', Auth::user()->entreprise_id)->get();
        $departements = Departement::where('entreprise_id', Auth::user()->entreprise_id)->get();

        $roles = Role::skip(1)->take(3)->get();

        $my_departement_functions = Fonctions::where('entreprise_id', Auth::user()->entreprise_id)
            ->where('departement_id', Auth::user()->departement_id)
            ->get();

        $members_departements = [];

        if (Auth::user()->roles->contains('nom', 'Manager')) {
            $members_departements = User::where('entreprise_id', Auth::user()->entreprise_id)
                ->where('departement_id', Auth::user()->departement_id)
                ->paginate(10);
        }

        return view(
            'employeeManagement.list-employees',
            compact(
                'employees',
                'members_departements',
                'statut_users',
                'fonctions',
                'departements',
                'roles',
                'my_departement_functions'
            )
        );
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
    public function store(Request $request)
    {


        $existingEmail = User::where('email', $request->email)->first();
        $existingPassword = User::where('password', Hash::make($request->password))->first();

        if ($existingEmail) {
            return redirect()->back()->with('errorEmail', 'Un employé possède déjà cette adresse e-mail .');
        }

        if ($existingPassword) {
            return redirect()->back()->with('errorPassword', 'Un employé possède déjà cet nom de passe .');
        }


        $request->validate([
            'nom' => 'required|min:3',
            'prenom'   => 'required',
            'tel'   => 'required',
            'email'   => 'required|email|unique:users,email',
            'password' => 'required|unique:users,password'
        ]);

        if ($request->role === '4') {

            $user = User::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $request->nom . ' ' . $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->tel,
                'date_naissance' => $request->date,
                'statut_utilisateur_id' => $request->statut,
                'departement_id' => $request->departement,
                'fonction_id' => $request->fonction,
                'entreprise_id' => Auth::user()->entreprise_id
            ]);

            // * Vérification de l'existence d'un manager pour le département indexé *

            $manager_exist = ManagerDepartement::where('entreprise_id', Auth::user()->entreprise_id)
                ->where('departement_id', $request->departement)
                ->get();

            if ($manager_exist->count() === 0) {
                ManagerDepartement::create([
                    'manager_id' => $user->id,
                    'departement_id' => $request->departement,
                    'entreprise_id' => Auth::user()->entreprise_id
                ]);
            } else {
                $the_user = User::where('id', $user->id)->first();
                $the_user->delete();
                return redirect()->back()->with('errorAdded', 'Un manager a déjà été assigné à ce département');
            }

            // * Fin de la vérification "manager" et action exécutée *

            $roles = ['3'];
            $roles = array_push($roles, $request->role);
            $user->roles()->attach($roles);


            // Envoie du mail à l'employé créé
            $name = $request->nom . ' ' . $request->prenom;

            $data = [
                'employe' => $name,
                'password' => $request->password
            ];

            // Mail::to($request->email)->send(new ToUserMail($data));


            return redirect()->back()->with('success', 'Employé créé avec succès');
        } else {
            $user = User::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $request->nom . ' ' . $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telephone' => $request->tel,
                'date_naissance' => $request->date,
                'statut_utilisateur_id' => $request->statut,
                'departement_id' => $request->departement,
                'fonction_id' => $request->fonction,
                'entreprise_id' => Auth::user()->entreprise_id
            ]);


            $user->roles()->attach($request->role);

            // Envoie du mail à l'employé créé
            $name = $request->nom . ' ' . $request->prenom;

            $data = [
                'employe' => $name,
                'password' => $request->password
            ];

            // Mail::to($request->email)->send(new ToUserMail($data));


            return redirect()->back()->with('success', 'Employé créé avec succès');
        }
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
        $employee = User::findOrFail($id);
        $statut_users = StatutUtilisateur::all();
        $fonctions = Fonctions::all();
        $departements = Departement::all();
        $roles = Role::all();

        return view('employeeManagement.edit_employee', compact('employee', 'statut_users', 'fonctions', 'departements', 'roles'));
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
        // Recherche du user
        $employee = User::findOrFail($id);

        // Récupération de tous les roles du user
        $roles = $employee->roles;

        // Récupération des données envoyées depuis le formulaire
        $name_employee = $request->name;
        $tel_employee = $request->tel;
        $email_employee = $request->email;
        $statut_employee = $request->statut; // id
        $departement_employee = $request->departement; // id
        $fonction_employee = $request->fonction; // id

        // Il s'agit du id du role sélectionné dans le formulaire
        $role_employee = $request->role;



        if ($name_employee != $employee->name) {
            $employee->update([
                'name' => $name_employee
            ]);
        }
        if ($tel_employee != $employee->telephone) {
            $employee->update([
                'telephone' => $tel_employee
            ]);
        }
        if ($email_employee != $employee->email) {
            $employee->update([
                'email' => $email_employee
            ]);
        }
        if ($statut_employee != $employee->statut_utilisateurs_id) {
            $employee->update([
                'statut_utilisateurs_id' => $statut_employee
            ]);
        }
        if ($departement_employee != $employee->departement->id) {
            $employee->update([
                'departement_id' => $departement_employee
            ]);
        }
        if ($fonction_employee != $employee->fonction->id) {
            $employee->update([
                'fonction_id' => $fonction_employee
            ]);
        }


        if (!$roles->contains('id', $role_employee)) {

            $r = Role::findOrFail($role_employee);
            $employee->roles->push($r);
        }

        return redirect()->route('table-employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyPage($id)
    {
        $employee = User::findOrFail($id);

        return view('employeeManagement.archiver_employee', compact('employee'));
    }

    public function destroy($id)
    {

        $employee = User::findOrFail($id);
        $employee->update([
            'statut_utilisateurs_id' => 3
        ]);
        return redirect()->route('table-employees');
    }
}
