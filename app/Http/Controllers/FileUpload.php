<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Dossier;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileUpload extends Controller
{
    //

    //  public function fileUpload(){
    //     dd('echo');
    //  }

    public function fileUpload(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|mimes:csv,txt,xlsx,xls,pdf,doc,docx,jpg,jpeg,png|max:2048'
        // ]);

        $nom = $req->nom;
        $fileModel = new Dossier;

        if ($req->file()) {
            $uploadedFile = $req->file('file');
            $fileMimeType = $uploadedFile->getClientMimeType();
            $typeDossiers = TypeDossier::where('type', '=', 'dossierPersonnel')->first();


            // Spécifier les types MIME pour les fichiers Word
            if ($fileMimeType === 'application/octet-stream' && in_array($uploadedFile->getClientOriginalExtension(), ['doc', 'docx'])) {
                $fileMimeType = $uploadedFile->getClientOriginalExtension() === 'doc' ? 'application/msword' : 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
            }

            // Spécifier les types MIME pour les fichiers PDF
            if ($fileMimeType === 'application/octet-stream' && in_array($uploadedFile->getClientOriginalExtension(), ['pdf'])) {
                $fileMimeType = 'application/pdf';
            }

            // Spécifier les types MIME pour les images (jpg, jpeg, png)
            if (in_array($fileMimeType, ['image/jpeg', 'image/png']) && in_array($uploadedFile->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {

            }

            $fileName = $nom . '.' . $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('dossiersPersonnels', $fileName, 'public');

            // Modifier le chemin de stockage du fichier
            $fileModel->path = 'dossiersPersonnels/' . $fileName;

            $fileModel->id = Uuid::uuid4()->toString();
            $fileModel->title = 'DossierPersonnel';
            $fileModel->nom = $fileName;
            $fileModel->format = $fileMimeType;
            $date_creation = Carbon::now()->toDate()->format('d-m-Y');
            $fileModel->date_creation = Carbon::createFromFormat('d-m-Y', $date_creation)->toDateString();
            $fileModel->type_dossier_id = $typeDossiers->id;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->entreprise_id = Auth::user()->entreprise_id;
            $fileModel->save();

            return back();
        }
    }


    public function delete_dossierPersonnel($path){

     //   $path = $request->query('path');

      //  dd($path);

      echo 'hello';

    }
}
