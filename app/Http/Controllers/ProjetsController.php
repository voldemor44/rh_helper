<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tache;
use Nette\Utils\Json;
use Ramsey\Uuid\Uuid;
use App\Models\Projet;
use App\Models\DailyReport;
use App\Models\DocumentsProjet;
use Illuminate\Http\Request;
use App\Models\ProjetUtilisateur;
use Illuminate\Support\Facades\Auth;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projet::paginate(4);

        $nbr_ps = 0;
        $projects_membered = [];
        foreach ($projects as $project) {
            if ($project->chef_projet != Auth::user()->name) {
                $ps = ProjetUtilisateur::where('projet_id', $project->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
                if ($ps) {
                    array_push($projects_membered, $project);
                    $nbr_ps++;
                }
            }
        }
        if (Auth::user()->roles->contains('nom', 'Manager')) {
            return view('projets.list-projets', compact('projects', 'nbr_ps', 'projects_membered'));
        }
        return view('projets.list-projets', compact('projects'));
    }


    public function list()
    {
        $projects = Projet::all();
        return view('projets.list-projets-table', compact('projects'));
    }

    public function listTask()
    {
        $myNbr_projects = ProjetUtilisateur::where('user_id', Auth::user()->id)->count();
        $projects_user = ProjetUtilisateur::where('user_id', Auth::user()->id)->get();


        if ($myNbr_projects != 0) {

            // les projets ou l'on n'est qu'un membre
            $work_projects = [];
            foreach ($projects_user as $project_user) {
                $project = Projet::where('id', $project_user->projet_id)->first();
                if ($project->chef_projet != Auth::user()->name) {
                    array_push($work_projects, $project);
                }
            }

            if (Auth::user()->roles->contains('nom', 'Manager')) {
                // les projets ou le manager est chef
                $myProjects = Projet::where('chef_projet', Auth::user()->name)->get();
                $count_myProjects = $myProjects->count();

                if ($count_myProjects >= 1) {

                    $first = Projet::where('chef_projet', Auth::user()->name)->first();
                    $tasks = Tache::where('projet_id', $first->id)->get();
                    $count_myProjects = Projet::where('chef_projet', Auth::user()->name)->count();
                    return view('projets.list-task', compact('myNbr_projects', 'work_projects', 'myProjects', 'count_myProjects', 'first'));
                } else {
                    $first = $work_projects[0];

                    return view('projets.list-task', compact('myNbr_projects', 'work_projects', 'myProjects', 'count_myProjects', 'first'));
                }
            } else {
                if (Auth::user()->roles->contains('nom', 'Administrateur')) {

                    $myProjects = Projet::all();
                    $first = Projet::first();
                    $tasks = Tache::where('projet_id', $first->id)->get();
                    $count_myProjects = Projet::count();
                    return view('projets.list-task', compact('myNbr_projects', 'work_projects', 'myProjects', 'count_myProjects', 'first'));
                } else {
                    // Pour un simple employé
                    $work_projects = [];
                    foreach ($projects_user as $project_user) {
                        $project = Projet::where('id', $project_user->projet_id)->first();
                        array_push($work_projects, $project);
                    }
                    $first = $work_projects[0];
                    return view('projets.list-task', compact('myNbr_projects', 'work_projects', 'first'));
                }
            }
        } else {
            return view('errors-page.access-refused');
        }
    }

    public function taskAndChat($id)
    {
        $verify = ProjetUtilisateur::where('projet_id', $id)->where('user_id', Auth::user()->id)->get();

        if ($verify->count() == 1) {

            if (Auth::user()->roles->contains('nom', 'Manager')) {
                $projects_user = ProjetUtilisateur::where('user_id', Auth::user()->id)->get();
                $work_projects = [];
                foreach ($projects_user as $project_user) {
                    $project = Projet::where('id', $project_user->projet_id)->first();
                    if ($project->chef_projet != Auth::user()->name) {
                        array_push($work_projects, $project);
                    }
                }

                $myProjects = Projet::where('chef_projet', Auth::user()->name)->get();

                $first = Projet::findOrFail($id);
                $tasks = Tache::where('projet_id', $first->id)->get();

                $count_myProjects = Projet::where('chef_projet', Auth::user()->name)->count();

                return view('projets.list-task', compact('myProjects', 'work_projects', 'count_myProjects', 'first', 'tasks'));
            } else {
                if (Auth::user()->roles->contains('nom', 'Administrateur')) {

                    $myProjects = Projet::all();
                    $first = Projet::findOrFail($id);
                    $tasks = Tache::where('projet_id', $first->id)->get();
                    $count_myProjects = Projet::count();
                    return view('projets.list-task', compact('myProjects', 'count_myProjects', 'first', 'tasks'));
                } else {
                    // Pour un simple employé
                    $projects_user = ProjetUtilisateur::where('user_id', Auth::user()->id)->get();
                    $work_projects = [];
                    foreach ($projects_user as $project_user) {
                        $project = Projet::where('id', $project_user->projet_id)->first();
                        if ($project->chef_projet != Auth::user()->name) {
                            array_push($work_projects, $project);
                        }
                    }
                    $first = Projet::findOrFail($id);
                    $tasks = Tache::where('projet_id', $first->id)->where('user_id', Auth::user()->id)->get();
                    return view('projets.list-task', compact('work_projects', 'first', 'tasks'));
                }
            }
        } else {
            abort(403);
        }
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
        //Création du projet

        $membersTable = explode(',', $request->membres_projet);

        if ($request->documents) {
            //$filename = time() . '.' . $request->document->extension();
            //$path = $request->document->storeAs('photos', $filename, 'public');

            $documents = $request->documents;

            $uuid = Uuid::uuid4()->toString();
            $project = Projet::create([
                'id' => $uuid,
                'titre' => $request->titre,
                'priorite' => $request->priorite,
                'date_debut' => $request->date_debut,
                'date_fin_prevue' => $request->date_fin_prevue,
                'chef_projet' => $request->chef_projet,
                'description' => $request->description,
                //'path_document' => $path,
                'entreprise_id' => Auth::user()->entreprise_id,
                'created_at' => now(),
                'updated_at' => now(),

            ]);

            foreach ($documents as $document) {
                $documentName = $document->getClientOriginalName();
                $documentExtension = $document->getClientOriginalExtension();
                $documentSize = $document->getSize();

                $filename = $documentName;
                $document->storeAs('photos', $filename, 'public');

                DocumentsProjet::create([
                    'projet_id' => $uuid,
                    'path_document' => $filename,
                    'nom' => $documentName,
                    'extension' => $documentExtension,
                    'taille' => $documentSize,
                ]);
            }
        } else {

            $uuid = Uuid::uuid4()->toString();
            $project = Projet::create([
                'id' => $uuid,
                'titre' => $request->titre,
                'priorite' => $request->priorite,
                'date_debut' => $request->date_debut,
                'date_fin_prevue' => $request->date_fin_prevue,
                'chef_projet' => $request->chef_projet,
                'description' => $request->description,
                'entreprise_id' => Auth::user()->entreprise->id,
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }

        $leader_project = User::where('name', $request->chef_projet)->first();
        //$project->users()->attach($leader_project);

        ProjetUtilisateur::create([
            'user_id' => $leader_project->id,
            'projet_id' => $uuid,
        ]);

        for ($i = 0; $i < count($membersTable); $i++) {
            $userName = $membersTable[$i];
            $user = User::where('name', $userName)->first();
            ProjetUtilisateur::create([
                'user_id' => $user->id,
                'projet_id' => $uuid,
            ]);
        }


        return redirect()->back()->with('success', 'Projet créé avec succès');
    }


    public function addNewMember($tableMember, $projectId)
    {

        $project = Projet::findOrFail($projectId);

        if (Auth::user()->name == $project->chef_projet) {
            $membersTable = explode(',', $tableMember);
            for ($i = 0; $i < count($membersTable); $i++) {
                $userName = $membersTable[$i];
                $user = User::where('name', $userName)->first();
                $ps = ProjetUtilisateur::where('projet_id', $projectId)
                    ->where('user_id', $user->id)
                    ->get();
                $cps = $ps->count();
                if ($cps == 0) {
                    $project->users()->attach($user);
                }
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function forEdit($projectId)
    {
        $project = Projet::findOrFail($projectId);
        $project_leader = $project->chef_projet;

        $leader = User::where('name', $project_leader)->first();
        $project_users = ProjetUtilisateur::where('projet_id', $projectId)->get();

        return view('projets.for-edit-project', compact('project', 'leader', 'project_users'));
    }

    function forArchiverGet($projectId)
    {
        $project = Projet::findOrFail($projectId);
        return view('projets.for-archiver-project', compact('project'));
    }

    function forArchiverPost($projectId)
    {
        $project = Projet::findOrFail($projectId);

        if (Auth::user()->name == $project->chef_projet) {

            $project->update([
                'statut' => 'Archivé'
            ]);

            return redirect()->back()->with('success', 'Projet archivé avec succès');
        } else {

            return redirect()->back()->with('restriction', " Autorisation refusée");
        }
    }

    public function download_document($docName)
    {
        $docPath = storage_path('app/public/photos/' . $docName);

        return response()->download($docPath);
    }


    public function showProject($id)
    {

        $project = Projet::findOrFail($id);
        $chef_projet = User::where('name', $project->chef_projet)->first();
        $allTask = Tache::where('projet_id', $id)
            ->where('statut', "En cours")->get();

        $completedTask = Tache::where('projet_id', $id)
            ->where('statut', "accomplie")->get();

        $avoidTask = Tache::where('projet_id', $id)
            ->where('statut', "suspendue")->get();

        $documents = DocumentsProjet::where('projet_id', $id)->get();

        return view('projets.project-view', compact('project', 'chef_projet', 'allTask', 'completedTask', 'avoidTask', 'documents'));
    }

    public function taskBoard($id)
    {
        $project = Projet::findOrFail($id);
        $allTask = Tache::where('projet_id', $id)
            ->where('statut', "En cours")->get();

        $completedTask = Tache::where('projet_id', $id)
            ->where('statut', "accomplie")->get();

        $avoidTask = Tache::where('projet_id', $id)
            ->where('statut', "suspendue")->get();
        return view('projets.taches', compact('project', 'allTask', 'completedTask', 'avoidTask'));
    }

    public function toAddTask(Request $request, $projectId)
    {

        $memberTask = User::where('name', $request->memberTask)->first();
        $memberId = $memberTask->id;
        Tache::create([
            'id' => Uuid::uuid4()->toString(),
            'titre' => $request->title,
            'contenu' => $request->content,
            'priorite' => $request->priority,
            'statut' => "En cours",
            'date_delai' => $request->date,
            'projet_id' => $projectId,
            'user_id' => $memberId,
            'entreprise_id' => Auth::user()->entreprise_id,

        ]);

        return redirect()->back()->with('success', 'Tâche créée avec succès');
    }

    // For action task
    public function toCompleteTask($taskId)
    {
        $task = Tache::findOrFail($taskId);

        return view('projets.toCompletedTask', compact('task'));
    }

    public function completedTask($taskId)
    {
        $task = Tache::findOrFail($taskId);
        $task->update([
            'statut' => "accomplie"
        ]);

        return redirect()->back();
    }

    public function toEditTask($taskId)
    {
        $task = Tache::findOrFail($taskId);
        $userAssigned = User::findOrFail($task->user_id);

        return view('projets.forEditTask', compact('task', 'userAssigned'));
    }

    public function editedTask($taskId, Request $request)
    {
        $task = Tache::findOrFail($taskId);
        $task->update([
            'titre' => $request->title,
            'contenu' => $request->content,
            'priorite' => $request->priority,
            'date_delai' => $request->date,
        ]);

        return redirect()->back();
    }

    public function toAvoidTask($taskId)
    {
        $task = Tache::findOrFail($taskId);

        return view('projets.toAvoidTask', compact('task'));
    }

    public function avoidedTask($taskId)
    {
        $task = Tache::findOrFail($taskId);
        $task->update([
            'statut' => "suspendue"
        ]);

        return redirect()->back();
    }

    public function changeAssignedMember()
    {
        return view('projets.choose-other-member');
    }


    public function chooseAllmember($valuesInputs)
    {
        $values = $valuesInputs;
        $employees = User::all();
        return view('projets.choose-all-member', compact('employees', 'values'));
    }

    public function chooseAssignedTaskMember($usersId, $inputs, $projectId)
    {
        $inputs_task = $inputs;
        $users_id = explode(',', $usersId);
        $nbr_id = count($users_id);
        $project_id = $projectId;
        return view('projets.choose-assignedTask-member', compact('users_id', 'nbr_id', 'inputs_task', 'project_id'));
    }

    public function forProcessCreate($members, $inputsValues)
    {
        $tableMembers = explode(',', $members);
        $usersTable = [];
        $values = explode("¤,", $inputsValues);

        for ($i = 0; $i < count($tableMembers); $i++) {
            $user = User::where('name', $tableMembers[$i])->first();
            $usersTable = [...$usersTable, $user];
        }

        return view('projets.to-create-project', compact('usersTable', 'members', 'values'));
    }

    public function forTaskAdd($member, $inputs, $projectId)
    {

        $member_assign = $member;
        $values = explode("¤,", $inputs);
        $project_id = $projectId;

        return view('projets.to-add-task', compact('member_assign', 'values', 'project_id'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $project = Projet::findOrFail($id);

        if (Auth::user()->name == $project->chef_projet) {

            $project->update([
                'titre' => $request->titre,
                'priorite' => $request->priorite,
                'date_debut' => $request->date_debut,
                'date_fin_prevue' => $request->date_fin_prevue,
                'description' => $request->description,

            ]);

            if ($request->document) {
                $filename = time() . '.' . $request->document->extension();
                $path = $request->document->storeAs('documents', $filename, 'public');
                $project->update([
                    'path_document' => $path
                ]);
            }

            return redirect()->back()->with('success', 'Projet modifié avec succès');
        } else {
            return redirect()->back()->with('restriction', " Autorisation refusée");
        }
    }

    public function dailyReport()
    {
        $daily_reports = DailyReport::where('entreprise_id', Auth::user()->entreprise->id)
            ->where('user_id', Auth::user()->id)
            ->get();

        $old_daily_reports = [];
        $new_daily_reports = [];
        $the_date = Carbon::now()->isoFormat('dddd DD MMMM YYYY');

        foreach ($daily_reports as $daily_report) {

            if ($daily_report->report_date != $the_date) {
                array_push($old_daily_reports, $daily_report);
            } else {
                array_push($new_daily_reports, $daily_report);
            }
        }

        return view('daily-reports.daily-reports', compact('old_daily_reports', 'new_daily_reports'));
    }

    public function submitReport(Request $request)
    {

        if ($request->content != '') {
            DailyReport::create([
                'report_date' => Carbon::now()->isoFormat('dddd DD MMMM YYYY'),
                'report_content' => $request->content,
                'user_id' => Auth::user()->id,
                'entreprise_id' => Auth::user()->entreprise->id
            ]);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
    }
}
