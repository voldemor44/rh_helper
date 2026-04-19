<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Tarifs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\StatutUtilisateur;
use libphonenumber\PhoneNumberUtil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use libphonenumber\PhoneNumberFormat;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $id = $request->query('tarif');
        $type_entreprise = Tarifs::find($id);

      //  dd($type_entreprise);
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $countryCodes = $phoneNumberUtil->getSupportedRegions();
        $countryIndicatives = [];

        foreach ($countryCodes as $countryCode) {
            $countryIndicatives[$countryCode] = '+' . $phoneNumberUtil->getCountryCodeForRegion($countryCode);
        }
        
        //  dd($type_entreprise);
        return view('auth.register', compact('type_entreprise', 'countryIndicatives'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $validator = Validator::make($request->all(), [
        //     'reg-id' => 'required',
        //     'reg-email' => 'required|email',
        //     'reg-phone' => 'nullable',
        //     'reg-date' => 'required|date',
        //     'reg-password' => 'required|min:6',
        //     'reg-confirm-password' => 'required|same:reg-password',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

      //  dd($request->type_entreprise);

        $statut = StatutUtilisateur::where('statut', 'Actif')->first()->id;
        $countryCode = $request->input('country_code');
        $phoneNumber = $request->input('telephone');

        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $number = $phoneNumberUtil->parse($phoneNumber, $countryCode);
        $e164Number = $phoneNumberUtil->format($number, PhoneNumberFormat::E164);


        $user = User::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $e164Number,
            'date_naissance'  => date('Y-m-d', strtotime($request['date'])),
            'password' => Hash::make($request->password),
            'statut_utilisateur_id' => $statut,
        ]);

        $role = Role::where('nom', 'Administrateur')->first();
        $user->roles()->attach($role);
        $user->save();



        // Après avoir enregistré l'utilisateur avec succès
        return response()->json([
            'status' => 'success',
            'redirect_url' => '/inscription-entreprise', // L'URL de redirection
            'type_entreprise' => $request->type_entreprise,
            'id' =>  $user->id,
        ]);
    }


}
