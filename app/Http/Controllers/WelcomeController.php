<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tache;
use Ramsey\Uuid\Uuid;
use App\Models\Projet;
use App\Models\Tarifs;
use League\Csv\Reader;
use App\Models\Contact;
use App\Models\Evenement;
use League\Csv\Statement;
use App\Models\Entreprise;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\ProjetUtilisateur;
use App\Models\TypeEntreprise;
use App\Services\CurrencyService;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use libphonenumber\PhoneNumberFormat;
use Umpirsky\ListGenerator\Generator;
use Illuminate\Support\Facades\Storage;
use App\Notifications\WelcomeNotification;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Notification;
use Monarobase\CountryList\CountryListFacade as Countries;


class WelcomeController extends Controller
{
    //

    public function index()
    {

        $tarifs = Tarifs::all();
        $tarifPME = Tarifs::where('type_entreprise', 'PME')->first();
        $tarifGE = Tarifs::where('type_entreprise', 'GE')->first();
        $tarifStartup = Tarifs::where('type_entreprise', 'Startup')->first();
        $tarifGratuite = Tarifs::where('formule', '15')->first();

        // dd($tarifPME);
        return view('welcome', compact(
            'tarifs',
            'tarifPME',
            'tarifGE',
            'tarifStartup',
            'tarifGratuite'
        ));
    }

    public function inscription_entreprise(Request $request, CurrencyService $currencyService)
    {


        $id = $request->query('id');
        $type_entreprise_id = $request->query('type_entreprise');

        $countries = Countries::getList('en');
        //  $currencies = Countries::getCurrencyList();

        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $countryCodes = $phoneNumberUtil->getSupportedRegions();
        $countryIndicatives = [];

        foreach ($countryCodes as $countryCode) {
            $countryIndicatives[$countryCode] = '+' . $phoneNumberUtil->getCountryCodeForRegion($countryCode);
        }

        $csvFile = Storage::path('public/country-code-to-currency-code-mapping.csv');
        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0);

        $records = Statement::create()->process($csv);

        $allCurrencies = [];
        $uniqueCurrencies = [];

        foreach ($records as $record) {
            // Vérifier si la colonne 'Currency' (ou le nom approprié) contient une valeur de devise.
            // Assurez-vous d'ajuster 'Currency' au nom de la colonne correcte dans votre CSV.
            if ($record['Currency'] !== null && $record['Code'] !== null) {
                $uniqueCurrencies[$record['Code']] = $record['Currency'];
            }
        }

        // Utiliser array_unique pour éliminer les doublons et obtenir une liste unique de devises
        //  $uniqueCurrencies = array_unique($allCurrencies);
        //  dd($uniqueCurrencies);

        //   dd($records);


        return view('auth.inscription-entreprise', compact(
            'id',
            'type_entreprise_id',
            'countries',
            'countryIndicatives',
            'uniqueCurrencies'

        ));
    }

    public function inscriptionEntreprise(Request $request)
    {

        //  dd('hello');

        $countryCode = $request->input('country_code');
        $phoneNumber = $request->input('telephone');

        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $number = $phoneNumberUtil->parse($phoneNumber, $countryCode);
        $e164Number = $phoneNumberUtil->format($number, PhoneNumberFormat::E164);

        $entreprise_type = $request->input('type_entreprise');


        $tarif = Tarifs::find($entreprise_type);
        $tarif_entreprise = $tarif->type_entreprise;

        //  dd($entreprise_type);

        $type_entreprise_id = null;
        $entreprise_type_name = null;

        if (!$tarif_entreprise) {
            $type_entreprise_id = null;
            $entreprise_type_name = null;
        } else {

            $type_entreprise_name = $tarif->type_entreprise;

            // dd($type_entreprise_name);

            $types_entreprises = TypeEntreprise::all();

            // foreach ($types_entreprises as  $type_entreprise) {
            //     if ($type_entreprise->type === $type_entreprise_name) {
            //         $type_entreprise_id = $type_entreprise->id;
            //         $entreprise_type_name = $type_entreprise->name;
            //         break;

            //     }
            // }

            $entreprise_data = TypeEntreprise::where('type', $type_entreprise_name)->first();
            $entreprise_type_name = $entreprise_data->type;
            $type_entreprise_id = $entreprise_data->id;
        }


        // dd($entreprise_type_name);

        $entreprise = Entreprise::create([
            'id' => Uuid::uuid4()->toString(),
            'nom' => $request->name,
            'email' => $request->email,
            'telephone' => $e164Number,
            'pays' => $request->selected_country,
            'devise' => $request->devise,
            'type_entreprise_id' => $type_entreprise_id
        ]);

        $entreprise->save();

        $id = $request->id_user;
        $user = User::find($id);
        $user->entreprise_id = $entreprise->id;
        $user->save();

        //   dd($entreprise_type.' ' .'hello'. ' '.$entreprise_type_name);


        return response()->json(
            [
                'entreprise_id' => $entreprise->id,
                'type_entreprise' => $entreprise_type,
                'type_entreprise_name' => $entreprise_type_name,
                'user' => $id,
            ]
        );
    }

    public function adminDashboard()
    {
        // Dashboard infos
        $nbr_employees = User::where('entreprise_id', Auth::user()->entreprise_id)->count();
        $nbr_contacts = Contact::where('entreprise_id', Auth::user()->entreprise_id)->count();
        $contacts = Contact::where('entreprise_id', Auth::user()->entreprise_id)->take(5)->get();
        $projects = Projet::where('entreprise_id', Auth::user()->entreprise_id)->latest()->take(5)->get();
        $nbr_projets = Projet::where('entreprise_id', Auth::user()->entreprise_id)->count();
        $nbr_taches = Tache::where('entreprise_id', Auth::user()->entreprise_id)->count();

        $nbr_tasks_running = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('statut', "En cours")->count();
        $nbr_tasks_completed = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('statut', "accomplie")->count();
        $nbr_tasks_suspended = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('statut', "suspendue")->count();

        $nbr_tasks_max = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('priorite', "Maximale")->count();
        $nbr_tasks_moy = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('priorite', "Moyenne")->count();
        $nbr_tasks_min = Tache::where('entreprise_id', Auth::user()->entreprise_id)->where('priorite', "Minimale")->count();

        if (Projet::where('entreprise_id', Auth::user()->entreprise_id)->count() !== 0) {
            $porcent = ((Projet::where('entreprise_id', Auth::user()->entreprise_id)
                ->where('statut', 'Archivé')->count())
                / (Projet::where('entreprise_id', Auth::user()->entreprise_id)->count()));
        } else {
            $porcent = 0;
        }

        if (Tache::where('entreprise_id', Auth::user()->entreprise_id)->count() !== 0) {
            $completedTask_porcent = Tache::where('entreprise_id', Auth::user()->entreprise_id)->count();
        } else {
            $completedTask_porcent = 0;
        }

        $evenements = Evenement::with('typeEvenement')->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('dashboard.dashboard-admin', compact(
            'nbr_employees',
            'nbr_contacts',
            'contacts',
            'projects',
            'nbr_projets',
            'porcent',
            'nbr_taches',
            'evenements',
            'nbr_tasks_running',
            'nbr_tasks_completed',
            'nbr_tasks_suspended',
            'nbr_tasks_max',
            'nbr_tasks_moy',
            'nbr_tasks_min'
        ));


        //  return view('dashboard.dashboard-admin');
    }

    public function employeeDashboard()
    {
        $taches_total = 0;
        $taches_instances = 0;

        $mypro_users = ProjetUtilisateur::where('user_id', Auth::user()->id)->get();
        $mypro_users_count = ProjetUtilisateur::where('user_id', Auth::user()->id)->count();
        foreach ($mypro_users as $mypro_user) {
            $task_count = Tache::where('projet_id', $mypro_user->projet_id)->count();

            $task_run_count = Tache::where('projet_id', $mypro_user->projet_id)
                ->where('statut', 'En cours')
                ->count();

            $taches_total = $taches_total + $task_count;
            $taches_instances = $taches_instances + $task_run_count;
        }

        // $user = Auth::user();

        //   Notification::send($user, new WelcomeNotification);


        //Permissions
        $permissions = Permission::where('user_id', Auth::user()->id)->get()->count();

        $permissions_enInstance = Permission::where('user_id', Auth::user()->id)->where('statut', 'En instance')->get()->count();
        $permissions_rejetees = Permission::where('user_id', Auth::user()->id)->where('statut', 'Rejetee')->get()->count();
        $permissions_validees = Permission::where('user_id', Auth::user()->id)->where('statut', 'Validee')->get()->count();

        //Evènements

        $currentDate = Carbon::today();
        //   dd($currentDate);
        //       $evenements = Evenement::whereDate('created_at', '>=', $currentDate)
        //       ->orderBy('created_at', 'DESC')
        //       ->get()
        //   ->limit(1)->first();
        $currentDate = Carbon::today();
        $evenements = Evenement::whereDate('created_at', $currentDate)
            ->orderBy('created_at', 'DESC')
            ->first();

        return view(
            'dashboard.dashboard-employee',
            compact(
                'taches_total',
                'taches_instances',
                'mypro_users_count',
                'permissions',
                'permissions_enInstance',
                'permissions_rejetees',
                'permissions_validees',
                'evenements'
            )
        );
    }

    public function superAdminDashboard()
    {

        return view('dashboard.dashboard-superAdmin');
    }

    // public function managerDashboard(){

    // }
}
