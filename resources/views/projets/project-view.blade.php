<?php
use App\Models\User;
use App\Models\ProjetUtilisateur;
use App\Models\Tache;
use Carbon\Carbon;

function convectDateFormat($date)
{
    $carbonDate = Carbon::parse($date);
    return $carbonDate->isoFormat('DD MMM H:mm');
}
?>
@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div id="div-id" data-id="{{ $project->id }}" class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Présentation du projet</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Tableau de
                                    bord</a>
                            </li>
                            <li class="breadcrumb-item active">Projet</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                    </div>
                    @if ($project->chef_projet == Auth::user()->name)
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" onclick="forEditProject('{{ $project->id }}')"><i
                                    class="fa fa-plus"></i> Editer le projet</a>
                            <div class="view-icons">
                                <a href="{{ route('task-board', ['id' => $project->id]) }}"
                                    class="btn btn-white float-end m-r-10" data-bs-toggle="tooltip"
                                    title="Table des tâches"><i class="fa fa-bars"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @php
                $nbr_task = Tache::where('projet_id', $project->id)->count();
                $nbr_taks_finish = Tache::where('projet_id', $project->id)
                    ->where('statut', 'Accomplie')
                    ->count();
                $nbr_taks_run = Tache::where('projet_id', $project->id)
                    ->where('statut', 'En cours')
                    ->count();
                
                if ($nbr_task != 0) {
                    $progress_porcent = round(($nbr_taks_finish / $nbr_task) * 100);
                } else {
                    $progress_porcent = 0;
                }
            @endphp
            <div id="conected-user" data-user="{{ Auth::user()->name }}" class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="project-title">
                                <h5 class="card-title">{{ $project->titre }}</h5>
                                <small class="block text-ellipsis m-b-15"><span class="text-xs">{{ $nbr_taks_run }}</span>
                                    <span class="text-muted">tâches en cours, </span><span
                                        class="text-xs">{{ $nbr_taks_finish }}</span> <span class="text-muted">tâches
                                        accomplies</span></small>
                            </div>
                            <p> {{ $project->description }} </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">Documents associés</h5>
                            <ul class="files-list">
                                @forelse ($documents as $document)
                                    <li>
                                        <div class="files-cont">
                                            <div class="file-type">
                                                <span class="files-icon"><i class="fa-regular fa-file-word"></i></span>
                                            </div>
                                            <div class="files-info">
                                                <span class="file-name text-ellipsis"><a
                                                        href="{{ route('document.project.download', ['filename' => $document->path_document]) }}">{{ $document->nom }}</a></span>
                                                <span class="file-author"><a href="#">Chef de projet</a></span> <span
                                                    class="file-date">
                                                    {{ ' ' . convectDateFormat($document->created_at) }}</span>
                                                <div class="file-size">Taille:
                                                    {{ number_format($document->taille / 1048576, 2) }} Mo
                                                </div>
                                            </div>
                                            <ul class="files-action">
                                                <li class="dropdown dropdown-action">
                                                    <a href class="dropdown-toggle btn btn-link" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">Télécharger</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#share_files">Partager</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Supprimer</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="files-cont">
                                            Aucun documents associés
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="project-task">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                            <li class="nav-item"><a class="nav-link active" href="#all_tasks" data-bs-toggle="tab"
                                    aria-expanded="true">Tâches en cours</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pending_tasks" data-bs-toggle="tab"
                                    aria-expanded="false">Tâches accomplies</a></li>
                            <li class="nav-item"><a class="nav-link" href="#completed_tasks" data-bs-toggle="tab"
                                    aria-expanded="false">Tâches suspendues</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="all_tasks">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @forelse ($allTask as $task)
                                                    @php
                                                        $taksAssigned = User::findOrFail($task->user_id);
                                                    @endphp
                                                    <li class="task">
                                                        <div data-bs-toggle="tooltip"
                                                            title=" Assigné à {{ $taksAssigned->name }}"
                                                            class="task-container">
                                                            <span class="task-action-btn task-check">
                                                                <span class="action-circle large complete-btn"
                                                                    title="Mark Complete">
                                                                    <i class="material-icons">check</i>
                                                                </span>
                                                            </span>
                                                            <span class="task-label"
                                                                contenteditable="true">{{ $task->titre }}</span>
                                                            <span class="task-action-btn task-btn-right">
                                                                <span class="action-circle large" title="Voir le contenu">
                                                                    <i class="material-icons">task</i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="task">Aucune tâches en cours</li>
                                                @endforelse
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pending_tasks">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @forelse ($completedTask as $task)
                                                    @php
                                                        $taksAssigned = User::findOrFail($task->user_id);
                                                    @endphp
                                                    <li class="task">
                                                        <div data-bs-toggle="tooltip"
                                                            title=" Assigné à {{ $taksAssigned->name }}"
                                                            class="task-container">
                                                            <span class="task-action-btn task-check">
                                                                <span class="action-circle large complete-btn"
                                                                    title="Mark Complete">
                                                                    <i class="material-icons">check</i>
                                                                </span>
                                                            </span>
                                                            <span class="task-label"
                                                                contenteditable="true">{{ $task->titre }}</span>
                                                            <span class="task-action-btn task-btn-right">
                                                                <span class="action-circle large" title="Voir le contenu">
                                                                    <i class="material-icons">task</i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="task">Aucune tâches accomplies</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="completed_tasks">
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @forelse ($avoidTask as $task)
                                                    @php
                                                        $taksAssigned = User::findOrFail($task->user_id);
                                                    @endphp
                                                    <li class="task">
                                                        <div data-bs-toggle="tooltip"
                                                            title=" Assigné à {{ $taksAssigned->name }}"
                                                            class="task-container">
                                                            <span class="task-action-btn task-check">
                                                                <span class="action-circle large complete-btn"
                                                                    title="Mark Complete">
                                                                    <i class="material-icons">check</i>
                                                                </span>
                                                            </span>
                                                            <span class="task-label"
                                                                contenteditable="true">{{ $task->titre }}</span>
                                                            <span class="task-action-btn task-btn-right">
                                                                <span class="action-circle large" title="Voir le contenu">
                                                                    <i class="material-icons">task</i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="task">Aucune tâches suspendues</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title m-b-15">Détails du projet</h6>
                            <table class="table table-striped table-border">
                                <tbody>

                                    <tr>
                                        <td>Créé le :</td>
                                        <td class="text-end">25 Feb, 2019</td>
                                    </tr>
                                    <tr>
                                        <td>Date de début:</td>
                                        <td class="text-end">12 Jun, 2019</td>
                                    </tr>
                                    <tr>
                                        <td>Date de fin prévue:</td>
                                        <td class="text-end">12 December, 2019</td>
                                    </tr>
                                    <tr>
                                        <td>Priorité:</td>
                                        <td style="color: #699834" class="text-end">
                                            {{ $project->priorite }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Statut:</td>
                                        <td class="text-end">{{ $project->statut }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="m-b-5">Progression <span
                                    class="text-success float-end">{{ $progress_porcent }}%</span></p>
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                    title="{{ $progress_porcent }}%" style="width: {{ $progress_porcent }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div id="chef-projet" data-leader="{{ $chef_projet->name }}" class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">Chef de projet </h6>
                            <ul class="list-box">
                                <li>
                                    @if ($chef_projet->media)
                                        <a href="#">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="my-profileImg"><img alt
                                                            src="{{ Storage::url($chef_projet->media->path) }}"></span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{ $chef_projet->name }}</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">{{ $chef_projet->fonction->nom }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="#">
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="my-profileImg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                                            viewBox="0 0 448 512">
                                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <style>
                                                                svg {
                                                                    fill: #9a9996
                                                                }
                                                            </style>
                                                            <path
                                                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author">{{ $chef_projet->name }}</span>
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">{{ $chef_projet->fonction->nom }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                    @php
                        $users_project = ProjetUtilisateur::where('projet_id', $project->id)->get();
                    @endphp
                    <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">
                                Membres de l'équipe
                                @if ($project->chef_projet == Auth::user()->name)
                                    <button type="button" class="float-end btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#assign_user"><i class="fa fa-plus"></i>
                                        Ajouter</button>
                                @endif
                            </h6>
                            <ul class="list-box">
                                @foreach ($users_project as $user_project)
                                    @if ($user_project->user_id != $chef_projet->id)
                                        @php
                                            $user = User::findOrFail($user_project->user_id);
                                        @endphp
                                        <li style="margin-bottom: 5%">
                                            <a href="#">
                                                <div class="list-item">
                                                    <div class="list-left">
                                                        <span class="my-profileImg">
                                                            @if ($user->media)
                                                                <img alt src="{{ Storage::url($user->media->path) }}">
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="17px"
                                                                    viewBox="0 0 448 512">
                                                                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                    <style>
                                                                        svg {
                                                                            fill: #9a9996
                                                                        }
                                                                    </style>
                                                                    <path
                                                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                                </svg>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="list-body">
                                                        <span class="message-author">{{ $user->name }}</span>
                                                        <div class="clearfix"></div>
                                                        <span class="message-content">{{ $user->fonction->nom }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="assign_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                @php
                    $users_project = ProjetUtilisateur::where('projet_id', $project->id)->get();
                    $members = [];
                    foreach ($users_project as $user_project) {
                        $user = User::findOrFail($user_project->user_id);
                        array_push($members, $user);
                    }
                    $users = User::all();
                    $users_without_members = [];
                    foreach ($users as $user) {
                        $isMember = false;
                        foreach ($members as $member) {
                            if ($user->id === $member->id) {
                                $isMember = true;
                                break;
                            }
                        }
                        if (!$isMember) {
                            array_push($users_without_members, $user);
                        }
                    }
                @endphp
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau membre</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input id="search-input" placeholder="Nouveau membre" class="form-control search-input"
                                type="text">
                            <button class="btn btn-primary">Rechercher</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                @foreach ($users_without_members as $user)
                                    <div class="employee">
                                        <li>
                                            <a href="#">
                                                <div class="media d-flex contain-member" data-nom="{{ $user->name }}">
                                                    <span class="avatar flex-shrink-0">
                                                        @if ($user->media)
                                                            <img alt src="{{ Storage::url($user->media->path) }}">
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                                viewBox="0 0 448 512">
                                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                <style>
                                                                    svg {
                                                                        fill: #9a9996
                                                                    }
                                                                </style>
                                                                <path
                                                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                            </svg>
                                                        @endif
                                                    </span>
                                                    <div class="media-body align-self-center text-nowrap div-name">
                                                        <div class="user-name">{{ $user->name }}</div>
                                                        <span class="designation">{{ $user->fonction->nom }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button onclick="submitNewMembers()" class="btn btn-primary submit-btn">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="edit_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modification du projet</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="successMessage" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Opération efféctuée</h3>
                        </div>
                        <div class="success-message text-center"></div>
                        <!-- Ajout de l'élément pour afficher le message d'erreur -->
                        <div class="modal-btn Supprimer-action mt-3">
                            <div class="row">
                                <div class="col-6 m-auto justify-content-center">
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Quitter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="restrictionMessage" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Erreur</h3>
                        </div>
                        <div class="restriction-message text-center"></div>
                        <!-- Ajout de l'élément pour afficher le message d'erreur -->
                        <div class="modal-btn Supprimer-action mt-3">
                            <div class="row">
                                <div class="col-6 m-auto justify-content-center">
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Quitter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js_employee')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            })
        })
    </script>
@endsection

@section('for_js_code')
    <script>
        // for search
        document.getElementById('search-input').addEventListener('input', function() {
            console.log('search')
            searchEmployee(this.value);
        })

        function searchEmployee(keyword) {
            let employees = document.getElementsByClassName('employee');

            for (let i = 0; i < employees.length; i++) {
                let employee = employees[i];
                let employeeName = employee.getElementsByClassName('user-name')[0].textContent;

                if (employeeName.toLowerCase().includes(keyword.toLowerCase())) {
                    employee.style.display = 'block';
                } else {
                    employee.style.display = 'none';
                }
            }

        }


        let tableMember = []
        const divsEmployes = document.querySelectorAll('.contain-member')

        const divProject = document.getElementById('div-id')
        const projectId = divProject.dataset.id

        const divLeader = document.getElementById('chef-projet')
        const leaderName = divLeader.dataset.leader

        const divUserConnected = document.getElementById('conected-user')
        const userConnectedName = divUserConnected.dataset.user

        divsEmployes.forEach((divEmploye) => {
            let s = false
            let counter = 0
            divEmploye.addEventListener('click', function(event) {
                console.log('click')

                if (!s) {
                    const nomEmploye = this.dataset.nom;
                    this.style.background = "#ff9b44"
                    this.querySelector('.div-name').querySelector('.user-name').style.color = "white"
                    tableMember.push(nomEmploye)
                    console.log(tableMember);
                    s = true
                } else {
                    this.style.background = "transparent"
                    this.querySelector('.div-name').querySelector('.user-name').style.color = "#333333"
                    let member = tableMember.indexOf(this.dataset.nom)
                    if (tableMember.length === 1) {
                        tableMember.pop()
                    } else {
                        tableMember = tableMember.slice(0, member).concat(tableMember.slice(member + 1));
                    }

                    s = false
                    console.log(tableMember);
                }

            });
        });

        function submitNewMembers() {
            console.log('new-members')
            $.ajax({
                url: "/add-other-members/" + tableMember + "/project/" + projectId,

                method: "POST",
                success: function() {

                    if (leaderName === userConnectedName) {
                        $(document).ready(function() {
                            $('#successMessage').modal('show')
                            $('.success-message').text('Ajout de membres réussi')
                        })
                        location.reload()
                    } else {
                        $(document).ready(function() {
                            $('#restrictionMessage').modal('show')
                            $('.restriction-message').text('Action non autorisée')
                        })
                    }

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }


            })
        }
    </script>
@endsection
