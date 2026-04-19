<?php

use App\Http\Controllers\AbonnementsController;
use App\Models\User;
use App\Models\Projet;
use App\Models\Contact;
use App\Models\Permission;
use App\Models\Departement;
use App\Models\Notification;
use  Illuminate\Http\Request;
use function Pest\Laravel\post;
use App\Http\Controllers\FileUpload;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DossiersController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\FonctionsController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\ListEmployeeController;
use App\Http\Controllers\VerifyRoutesController;

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;

#use App\Http\Controllers\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/inscription-entreprise', [WelcomeController::class, 'inscription_entreprise']);
Route::post('/inscriptionEntreprise', [WelcomeController::class, 'inscriptionEntreprise'])->name('inscriptionEntreprise');

Route::get('/paidOffer', [AbonnementsController::class, 'paidOffer'])->name('paidOffer');
Route::post('/subscription', [AbonnementsController::class, 'subscription'])->name('subscription');

Route::get('/freeOffer', [AbonnementsController::class, 'freeOffer'])->name('freeOffer');

Route::get('/layout', function () {
    return view('layout.app');
});
Route::get('/dashboard', [VerifyRoutesController::class, 'verifyDashboard'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/employees', [ListEmployeeController::class, 'index'])->name('employees');

Route::get('/list-employees', [ListEmployeeController::class, 'list'])->name('table-employees');

Route::post('/create-employee', [ListEmployeeController::class, 'store'])->name('create-employee');

Route::get('/update-employee/{id}', [ListEmployeeController::class, 'show'])->name('modif-employee');
Route::post('/update-employee/{id}', [ListEmployeeController::class, 'update'])->name('update-employee');

Route::get('/archiver-employee/{id}', [ListEmployeeController::class, 'destroyPage'])->name('page_archive');
Route::post('/archiver-employee/{id}', [ListEmployeeController::class, 'destroy'])->name('archivage');


Route::get('/gestion-dossiers', function () {
    return view('gestion-dossier');
})->name('gestion-dossier');

// Route::resource('contacts', ContactController::class); //Emmanuel
Route::get('/contacts', [ContactController::class, 'contact'])->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
// Route::get('/contacts/list', [ContactController::class, 'contactslist'])->name('contacts_list');

Route::resource('notifications', NotificationsController::class); // CRUD Notifications:Emmanuel

Route::resource('departements', DepartementsController::class); // CRUD departements:Emmanuel


Route::resource('fonctions', FonctionsController::class); // CRUD fonctions:Emmanuel



Route::middleware(['auth', 'admin'])->group(function () {
    // Voir le profile de l'utilisateur
    Route::get('/user-profil/{id}', [ProfileController::class, 'viewUserProfil'])->name('profile-user');
    // Pour départements
    Route::get('/departements/{id}', [DepartementsController::class, 'show']);
    Route::post('/update-departement/{id}', [DepartementsController::class, 'update'])->name('up-departement');
    Route::get('/delete-departement/{id}', [DepartementsController::class, 'destroyPage'])->name('page-delete-departement');
    Route::post('/delete-departement/{id}', [DepartementsController::class, 'destroy'])->name('deleted-departement');

    // Pour Statuts
    Route::post('/update-statut/{id}', [StatusController::class, 'update'])->name('up-statut');
    Route::get('/delete-statut/{id}', [StatusController::class, 'destroyPage'])->name('page-delete-statut');
    Route::post('/delete-statut/{id}', [StatusController::class, 'destroy'])->name('deleted-statut');

    // Pour Fonctions
    Route::post('/update-fonction/{id}', [FonctionsController::class, 'update'])->name('up-fonction');
    Route::get('/delete-fonction/{id}', [FonctionsController::class, 'destroyPage'])->name('page-delete-fonction');
    Route::post('/delete-fonction/{id}', [FonctionsController::class, 'destroy'])->name('deleted-fonction');

    //Paramètres
    Route::get('/entreprise', [ParametreController::class, 'entreprise'])->name('entreprise');
    Route::post('/modifier-parametre/{id?}', [ParametreController::class, 'modifierParametre'])->name('modifier-parametre');

    Route::get('/theme',  [ParametreController::class, 'theme'])->name('theme');
    Route::post('/modifier-theme/{id?}', [ParametreController::class, 'modifierTheme'])->name('modifier-theme');
});
// for task and chat
Route::get('/project-tasks-chat/{id}', [ProjetsController::class, 'taskAndChat'])->name('task-and-chat');

//for daily-task
Route::get('/list-daily-tasks/{id}', [DailyTaskController::class, 'listDailyTask'])->name('list-daily-task-employee');
Route::post('/add-daily-task/employee/{id}', [DailyTaskController::class, 'addDailyTask'])->name('add-daily-task');
//Modiifier mot de passe
Route::get('/modifierMotDePasse',  [ParametreController::class, 'modifierMotDePasse'])->middleware(['auth', 'verified'])->name('modifierMotDePasse');
Route::post('/modifier/motDePasse', [ParametreController::class, 'modifier_motDePasse'])->middleware(['auth', 'verified'])->name('modifier_motDePasse');

// For Daily Report
Route::get('/daily-report', [ProjetsController::class, 'dailyReport'])->name('daily-reports');
Route::post('/daily-report', [ProjetsController::class, 'submitReport'])->name('submit-daily-report');

// Pour Permisssions
Route::get('/permissions', [PermissionsController::class, 'index'])->name('permission-page');
Route::post('/permissions', [PermissionsController::class, 'store'])->name('permission_add');
Route::get('/modif-permissions/{id}', [PermissionsController::class, 'show'])->name('permission-modif');
Route::post('/update-permission/{id}', [PermissionsController::class, 'update'])->name('up-permission');
Route::get('/delete-permission/{id}', [PermissionsController::class, 'destroyPage'])->name('page-delete-permission');
Route::post('/delete-permission/{id}', [PermissionsController::class, 'destroy'])->name('deleted-permission');

Route::post('/validate-permission/{id}', [PermissionsController::class, 'validatePermission'])->name('validate-permission');
Route::post('/reject-permission/{id}', [PermissionsController::class, 'rejectPermission'])->name('reject-permission');

// Pour projets
Route::get('/liste-projets', [ProjetsController::class, 'index'])->name('projects-page');
Route::get('/liste-projets-table', [ProjetsController::class, 'list'])->name('projects-list');
Route::post('/create-project', [ProjetsController::class, 'store'])->name('project-create');

Route::get('/projet-infos/{id}', [ProjetsController::class, 'showProject'])->name('project-view');
Route::get('/edit-project/{id}', [ProjetsController::class, 'forEdit']);
Route::post('/edit-project/{id}', [ProjetsController::class, 'update'])->name('edit-project');

Route::get('/archiver-project/{id}', [ProjetsController::class, 'forArchiverGet']);
Route::post('/archiver-project/{id}', [ProjetsController::class, 'forArchiverPost'])->name('archiver-project');

// Pour tâches et projets
Route::get('/listes-taches', [ProjetsController::class, 'listTask'])->name('tasks-list');
Route::get('/tache-bord/{id}', [ProjetsController::class, 'taskBoard'])->name('task-board');
Route::get('/member', [ProjetsController::class, 'changeAssignedMember']);
Route::get('/members/{valuesInputs}', [ProjetsController::class, 'chooseAllmember']);
Route::get('/member-task/{usersId}/values/{inputs}/project/{projectId}', [ProjetsController::class, 'chooseAssignedTaskMember']);
Route::get('/task-assign/{member}/values/{inputs}/project/{projectId}', [ProjetsController::class, 'forTaskAdd']);
Route::post('/add-task/{projectId}', [ProjetsController::class, 'toAddTask'])->name('add-task');
Route::get('/process-create/{members}/values/{inputs}', [ProjetsController::class, 'forProcessCreate']);
Route::get('/download-doc/{filename}', [ProjetsController::class, 'download_document'])->name('document.project.download');

Route::get('/task/{taskId}', [ProjetsController::class, 'toEditTask']);
Route::post('/editedTask/{taskId}', [ProjetsController::class, 'editedTask'])->name('editedTask');

Route::get('/to-task-avoid/{taskId}', [ProjetsController::class, 'toAvoidTask']);
Route::post('/avoidedTask/{taskId}', [ProjetsController::class, 'avoidedTask'])->name('avoidedTask');

Route::get('/to-task-completed/{taskId}', [ProjetsController::class, 'toCompleteTask']);
Route::post('/completedTask/{taskId}', [ProjetsController::class, 'completedTask'])->name('completedTask');

Route::post('/add-other-members/{tableMember}/project/{projectId}', [ProjetsController::class, 'addNewMember'])->name('add-new-members');
//Fin

Route::view('/guide', 'guides.guide')->name('guide'); // Page de guide d'utilisation: Emmanuel


Route::resource('status', StatusController::class); // CRUD status : Emmanuel

//Calendriers

//  Route::get('/evenements', function () {
//     return view('evenements');
// })->name('evenements');


Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
Route::resource('events', EventController::class);

//Calendars routes: Emmanuel

// Route::resource('calendrier', CalendrierController::class);

//Dashboard

Route::get('/admin/dashboard', [WelcomeController::class, 'adminDashboard'])->middleware(['auth', 'verified'])->name('dashboard-admin');

Route::get('/user/dashboard', [WelcomeController::class, 'employeeDashboard'])->middleware(['auth', 'verified'])->name('dashboard-employee');

Route::get('/superAdmin/dashboard', [WelcomeController::class, 'superAdminDashboard'])->middleware(['auth', 'verified'])->name('dashboard-superAdmin');

// Route::get('/manager/dashboard', [WelcomeController::class, 'managerDashboard'])->middleware(['auth', 'verified'])->name('dashboard-manager');
//FIn dashboard

//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// For JS Data
// To graph data
Route::get('/table-donnees', function () {
    $data = [
        'employes' => User::all()->count(),
        'permissions' => Permission::all()->count()
    ];

    return response()->json($data);
});

// To counter bar data
Route::get('/counterBar', [DataController::class, 'counterBar']);


//Messagerie

// Route::group(['prefix' => 'messages'], function () {
//     Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
//     Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
//     Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
//     Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
//     Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
// });


//Notifications

// Route::get('/notify', [NotificationsController::class, 'notify']);
Route::get('/markasread/{id}', [NotificationsController::class, 'markasread'])->name('markasread');
Route::get('/mark-all-as-read', [NotificationsController::class, 'markAllAsRead'])->name('mark-all-as-read');


//Vérification Email

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


//store a push subscriber.
Route::post('/push', [PushController::class, 'store']);

//make a push notification.
Route::get('/push', [PushController::class, 'push'])->name('push');


//dossiers personnels
Route::get('/dossier_personnel/index', [DossiersController::class, 'dossier_personnel_index'])->name('dossier_personnel_index');
Route::get('/delete_dossierPersonnel/{path}', [FileUpload::class, 'delete_dossierPersonnel'])->name('delete_dossierPersonnel');
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

//Contrats
Route::get('/contrat/index', [DossiersController::class, 'contrat_index'])->name('contrat_index');

Route::get('/typeContrats', [DossiersController::class, 'typeContrats'])->name('typeContrats');

Route::get('/contratCDD', [DossiersController::class, 'contratCDD'])->name('contratCDD');

Route::get('/contratCDI', [DossiersController::class, 'contratCDI'])->name('contratCDI');

Route::get('/contratPrestataire', [DossiersController::class, 'contratPrestataire'])->name('contratPrestataire');

Route::get('/users/listContrat', [DossiersController::class, 'users_listContrat'])->name('users_listContrat');

//Rapports
Route::get('/contrat/rapport', [DossiersController::class, 'rapport_index'])->name('rapport_index');
#Route::post('/delete_dossierPersonnel/{path}', [FileUpload::class, 'delete_dossierPersonnel']);


//File Manager


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     Lfm::routes();
// });


//Messages

Route::get('/message/index', [MessagesController::class, 'index'])->name('message.index');


//pdf

//Contrat CDD
Route::post('/update-form', function (Request $request) {
    $formData = $request->all();

    // Enregistrez les données dans la session ou la base de données, par exemple
    session()->put('form-data', $formData);

    return response()->json(['success' => true]);
})->name('update-form');

Route::get('/pdf-view', function () {
    $formData = session()->get('form-data', []);

    return view('dossiers.contrats.pdf-CDD-view', compact('formData'));
})->name('pdf-CDD-view');

Route::any('/submit-form-pdf-CDD', [DossiersController::class, 'submitFormPDF'])->name('submit-form-pdf-CDD');
Route::any('/submit-form-word-CDD', [DossiersController::class, 'submitFormWord'])->name('submit-form-word-CDD');

//Contrat CDI

Route::any('/submit-form-pdf-CDI', [DossiersController::class, 'submitFormPDF'])->name('submit-form-pdf-CDI');
Route::any('/submit-form-word-CDI', [DossiersController::class, 'submitFormWord'])->name('submit-form-word-CDI');

Route::post('/updateform', function (Request $request) {
    $formData = $request->all();

    // Enregistrez les données dans la session ou la base de données, par exemple
    session()->put('form-data', $formData);

    return response()->json(['success' => true]);
})->name('updateform');

Route::get('/pdf-view-CDI', function () {
    $formData = session()->get('form-data', []);

    return view('dossiers.contrats.pdf-CDI-view', compact('formData'));
})->name('pdf-CDI-view');
//Contrat Prestataire

Route::post('/submit-form-CDD', [DossiersController::class, 'submitForm'])->name('submit-form-CDD');
Route::post('/submit-form-CDI', [DossiersController::class, 'submitForm'])->name('submit-form-CDI');
Route::post('/submit-form-CP', [DossiersController::class, 'submitForm'])->name('submit-form-CP');

//Upload files : Dossier personnels

// Route::get('/upload-file', [DossiersController::class, 'createForm']);
// Route::post('/upload-file', [DossiersController::class, 'fileUpload'])->name('fileUpload');

//Route::get('/upload-file', [FileUpload::class, 'createForm']);

require __DIR__ . '/auth.php';
