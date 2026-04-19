<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Dossier;
use setasign\Fpdi\Fpdi;
use App\Models\Dossiers;
use App\Models\Parametres;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\TemplateProcessor;

class DossiersController extends Controller
{

    public function dossier_personnel_index()
    {
        //EntrepriseAdminId
        $entreprise_id = Auth::user()->entreprise_id;

        $typeDossiers = TypeDossier::where('type', '=', 'dossierPersonnel')->first();
     //   dd($typeDossiers);
        $recent_files = Dossier::where('type_dossier_id', '=', $typeDossiers->id)
        ->where('entreprise_id', $entreprise_id)->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(4)->get();
        $files  = Dossier::where('type_dossier_id', '=', $typeDossiers->id)->where('entreprise_id', $entreprise_id)->where('user_id', Auth::user()->id)->get();

     //   dd($files);

      return view('dossiers.dossiers_personnelles.index', compact('recent_files','files'));
    }

    public function contrat_index()
    {

          //EntrepriseAdminId
          $entreprise_id = Auth::user()->entreprise_id;

        $typeDossiers = TypeDossier::where('type', '=', 'Contrat')->first();
        if (Auth::user()->roles->contains('nom', 'Administrateur')) {
            $contrats_recents = Dossier::where('type_dossier_id', '=', $typeDossiers->id)
            ->where('entreprise_id', $entreprise_id)->orderBy('created_at', 'desc')->limit(4)->get();
            $contrats  = Dossier::where('type_dossier_id', '=', $typeDossiers->id)->where('entreprise_id', $entreprise_id)->get();
        } else {
            $contrats_recents = Dossier::where('type_dossier_id', '=', $typeDossiers->id)
                ->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')
                ->limit(4)->get();
            $contrats  = Dossier::where('type_dossier_id', '=', $typeDossiers->id)
                ->where('user_id', '=', Auth::user()->id);
        }
        // dd($contrats);
      //  dd($contrats_recents);
        return view('dossiers.contrats.index', compact('contrats_recents', 'contrats'));
    }

    public function rapport_index()
    {
        return view('dossiers.rapports.index');
    }

    public function typeContrats()
    {
        return view('dossiers.contrats.typeContrats');
    }

    public function contratCDD(Request $request)
    {
        //EntrepriseAdminId
        $entreprise_id = Auth::user()->entreprise_id;
        $id = $request->query('id');
        $userData = User::where('id', $id)->with('departement', 'infospersonnelle', 'fonction')->first();
        $entreprise = Parametres::where('entreprise_id', $entreprise_id)->first();

       // dd($entreprise);

        return view('dossiers.contrats.contratCDD', compact('userData', 'entreprise'));
    }

    public function contratCDI(Request $request)
    {
        //EntrepriseAdminId
        $entreprise_id = Auth::user()->entreprise_id;
        $id = $request->query('id');
        $userData = User::where('id', $id)->with('departement', 'infospersonnelle', 'fonction')->first();
        $entreprise = Parametres::where('entreprise_id', $entreprise_id)->first();
        return view('dossiers.contrats.contratCDI', compact('userData', 'entreprise'));
    }

    public function contratPrestataire()
    {
        return view('dossiers.contrats.contratPrestataire');
    }


    public function users_listContrat(Request $request)
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté (Admin)
        //EntrepriseAdminId
        $entreprise_id = Auth::user()->entreprise_id;

        $typeContrat = $request->input('id');
        $employees = User::whereNotIn('id', [$user->id])->where('entreprise_id',$entreprise_id)->get();
        return view('dossiers.contrats.users_list_contrat', compact('employees', 'typeContrat'));
    }


    public function submitFormPDF(Request $request)
    {
        // Récupérer les données du formulaire
        $currentRouteName = Route::currentRouteName();
        if ($currentRouteName == 'submit-form-pdf-CDD') {
            $formData = $request->input('formData');
            //dd($formData);
            $title = "CDD";
            $typeDossiers = TypeDossier::where('type', '=', 'Contrat')->first();
            //  dd($typeDossiers);
            // dd($typeDossiers);

            if ($formData && array_key_exists('date_debut', $formData) && array_key_exists('nbMois', $formData)) {
                //  $date_debut = Carbon::createFromFormat('d/m/Y', $formData['date_debut'])->format('Y-m-d');
                $date_debut = $formData['date_debut'];
                $date_fin = Carbon::createFromFormat('Y-m-d', $date_debut)->addMonths($formData['nbMois'])->format('Y-m-d');
            } else {
                $date_debut = null;
                $date_fin = null;
            }
            $pdfContent = view('dossiers.contrats.pdf_CDD_editable', compact('formData'))->render();
        }

        if ($currentRouteName == 'submit-form-pdf-CDI') {
            $formData = $request->input('formData');
            //dd($formData);
            $title = "CDI";
            $typeDossiers = TypeDossier::where('type', '=', 'Contrat')->first();
            //  dd($typeDossiers);
            // dd($typeDossiers);

            if ($formData && array_key_exists('date_debut', $formData) && array_key_exists('nbMois', $formData)) {
                //  $date_debut = Carbon::createFromFormat('d/m/Y', $formData['date_debut'])->format('Y-m-d');
                $date_debut = $formData['date_debut'];
                $date_fin = Carbon::createFromFormat('Y-m-d', $date_debut)->addMonths($formData['nbMois'])->format('Y-m-d');
            } else {
                $date_debut = null;
                $date_fin = null;
            }
            $pdfContent = view('dossiers.contrats.pdf_CDI_editable', compact('formData'))->render();
        }

        // Instancier la classe Dompdf avec les options
        $options = new Options();
        $options->setIsPhpEnabled(true); // Activer le support PHP dans Dompdf
        $dompdf = new Dompdf($options);

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($pdfContent);

        // Définir le format du papier
        $dompdf->setPaper('A4', 'portrait');

        // Générer le PDF
        $dompdf->render();

        // Enregistrement du PDF

        $relativePath = "Contrats";
        $name = $title . "_" . $formData['nom_prenom_Employe'] . ".pdf";
        $name = str_replace(' ', '-', $name);
        Storage::disk('public')->put($relativePath . '/' . $name, $dompdf->output());

        // Sauvegarde des informations du PDF dans la base de données
      //  Log::debug('hello');
        $user = User::where('email', $formData['emailEmploye'])->first();
        //EntrepriseAdminId
        $entreprise_id = Auth::user()->entreprise_id;
        $pdf = new Dossier();
        $pdf->id = Uuid::uuid4()->toString();
        $pdf->title = $title;
        $pdf->path = $relativePath . '/' . $name;
        $pdf->nom = $name;
        $pdf->format = "pdf";
        $date_creation = Carbon::now()->toDate()->format('d-m-Y');
        $pdf->date_creation = Carbon::createFromFormat('d-m-Y', $date_creation)->toDateString();
        $pdf->date_debut = $date_debut;
        $pdf->date_fin = $date_fin;
        $pdf->type_dossier_id = $typeDossiers->id;
        $pdf->entreprise_id = $entreprise_id;
        //   $pdf->user_id = $user->id;
        $pdf->user()->associate($user);
       // $pdf->dossiers()->associate($entreprise_id);
      $pdf->save();



        return redirect()->route('contrat_index');
    }



    public function submitFormWord(Request $request)
    {

        $currentRouteName = Route::currentRouteName();

        // dd($currentRouteName);

        if ($currentRouteName == 'submit-form-word-CDD') {
            $formData = $request->input('formData');

            $title = "CDD";
            $typeDossiers = TypeDossier::where('type', '=', 'Contrat')->first();
            //  dd($typeDossiers);
            // dd($typeDossiers);

            if ($formData && array_key_exists('date_debut', $formData) && array_key_exists('nbMois', $formData)) {
                //  $date_debut = Carbon::createFromFormat('d/m/Y', $formData['date_debut'])->format('Y-m-d');
                $date_debut = $formData['date_debut'];
                $date_fin = Carbon::createFromFormat('Y-m-d', $date_debut)->addMonths($formData['nbMois'])->format('Y-m-d');
            } else {
                $date_debut = null;
                $date_fin = null;
            }

            $html = view('dossiers.contrats.pdf_CDD_editable', $formData)->render();
        }

        Settings::setOutputEscapingEnabled(true);
        // Créer une nouvelle instance de PhpWord
        $phpWord = new PhpWord();

        // Charger la vue Laravel avec les données que vous souhaitez inclure dans le document Word

        // Ajouter le contenu HTML dans le document Word
        $section = $phpWord->addSection();
        //   dd($html);
        $htmlContent = $html;
        // $section->addHtml($html);

        $relativePath = "Contrats";
        Storage::makeDirectory("public/{$relativePath}");

        // Sauvegarder le document Word généré dans un emplacement temporaire
        // $name = $title . "_" . $formData['nom_prenom_Employe'] . ".docx";
        // $name = str_replace(' ', '-', $name);
        // $filePath = "public/{$relativePath}/{$name}";

        $path = $request->path;



        $pdfContent = file_get_contents($path);

        // Créer une instance de PhpWord
        $phpWord = new PhpWord();

        // Ajouter une section et un paragraphe dans le document Word
        $section = $phpWord->addSection();
        $section->addText($pdfContent);

        // Enregistrer le document Word au format .docx
        $fileName = 'document_modifiable.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($fileName);
    }


    public function submitForm(Request $request)
    {

        //   $currentRouteName = Route::currentRouteName();
        // dd($currentRouteName);

        // Récupérer les données du formulaire
        $formData = $request->all();

        // Récupérer la valeur du bouton cliqué
        $submitType = $request->input('submitType');

        if ($submitType === 'pdf') {
            // Rediriger vers la route pour le format PDF
            if (Route::is('submit-form-CDD')) {
                return redirect()->route('submit-form-pdf-CDD', ['formData' => $formData]);
            }

            if (Route::is('submit-form-CDI')) {
                return redirect()->route('submit-form-pdf-CDI', ['formData' => $formData]);
            }
        } elseif ($submitType === 'word') {
            // Rediriger vers la route pour le format Word
            if (Route::is('submit-form-CDD')) {
                return redirect()->route('submit-form-word-CDD', ['formData' => $formData]);
            }
        }
    }

    // public function fileUpload()
    // {

    // }
}
