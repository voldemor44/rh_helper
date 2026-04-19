<?php
use App\Models\User;
use App\Models\ProjetUtilisateur;
use App\Models\Tache;
use App\Models\Projet;
?>

@extends('layout.app')

@if (Auth::user()->roles->contains('nom', 'Administrateur'))
    @section('content')
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Projets</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Tableau de
                                        bord</a>
                                </li>
                                <li class="breadcrumb-item active">Projets</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create_project"><i
                                    class="fa fa-plus"></i> Créer un projet</a>
                            <div class="view-icons">
                                <a href="{{ route('projects-page') }}" class="grid-view btn btn-link active"><i
                                        class="fa fa-th"></i></a>
                                <a href="{{ route('projects-list') }}" class="list-view btn btn-link"><i
                                        class="fa fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @php
                        $nbr_projects = $projects->count();
                    @endphp
                    @forelse ($projects as $project)
                        @php
                            $chef_projet = User::where('name', $project->chef_projet)->first();
                            $users_project = ProjetUtilisateur::where('projet_id', $project->id)->get();
                            
                            $nbr_task = Tache::where('projet_id', $project->id)->count();
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
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown dropdown-action profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if ($project->chef_projet == Auth::user()->name)
                                                <a class="dropdown-item" href="#"
                                                    onclick="forEditProject('{{ $project->id }}')"><i
                                                        class="fa fa-pencil m-r-5"></i>
                                                    Modifier</a>
                                                <a class="dropdown-item" href="#"
                                                    onclick="forArchiverProject('{{ $project->id }}')"><i
                                                        class="fa-regular fa-trash-can m-r-5"></i>
                                                    Archiver</a>
                                            @else
                                                <a class="dropdown-item" href="#"
                                                    onclick="forArchiverProject('{{ $project->id }}')">
                                                    Aucune</a>
                                            @endif
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a
                                            href="{{ route('project-view', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                    </h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">{{ $nbr_taks_run }}</span> <span class="text-muted">tâche(s)
                                            en cours, </span>
                                        <span class="text-xs">{{ $nbr_taks_finish }}</span> <span
                                            class="text-muted">tâche(s) accomplie(s)</span>
                                    </small>
                                    <p class="text-muted">
                                        {{ $project->description }}
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Date de fin prévue:
                                        </div>
                                        <div class="text-muted">
                                            {{ $project->date_fin_prevue }}
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Chef de projet :</div>
                                        <ul class="team-members">
                                            <li>
                                                @if ($chef_projet->media)
                                                    <a href="#" data-bs-toggle="tooltip"
                                                        title="{{ $project->chef_projet }}"><img alt
                                                            src="{{ Storage::url($chef_projet->media->path) }}"></a>
                                                @else
                                                    <a href="#" data-bs-toggle="tooltip"
                                                        title="{{ $project->chef_projet }}">
                                                        <center>
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
                                                        </center>
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Autres membres :</div>
                                        <ul class="team-members">
                                            @foreach ($users_project as $user_project)
                                                @if ($user_project->user_id != $chef_projet->id)
                                                    @php
                                                        $user = User::findOrFail($user_project->user_id);
                                                    @endphp
                                                    <li>
                                                        @if ($user->media)
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $user->name }}"><img alt
                                                                    src="{{ Storage::url($user->media->path) }}"></a>
                                                        @else
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $user->name }}">
                                                                <center>
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
                                                                </center>
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progression <span
                                            class="text-success float-end">{{ $progress_porcent }}%</span></p>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" data-bs-toggle="tooltip"
                                            title="{{ $progress_porcent }}%" style="width: {{ $progress_porcent }}%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5>Aucun projet n'est en cours dans l'entreprise</h5>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    @if ($nbr_projects != 0)
                        {{ $projects->links('pagination::simple-default') }}
                    @endif

                </div>
            </div>

            <div id="create_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Création d'un projet</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nom du projet</label>
                                            <input name="titre" class="form-control projectInput" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priorité</label>
                                            <select name="priorite" class="select projectInput">
                                                <option>-</option>
                                                <option>Minimale</option>
                                                <option>Moyenne</option>
                                                <option>Maximale</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date de début</label>
                                            <div class="cal-icon">
                                                <input name="date_debut" class="form-control datetimepicker projectInput"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date de fin prévue</label>
                                            <div class="cal-icon">
                                                <input name="date_fin_prevue"
                                                    class="form-control datetimepicker projectInput" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" class="form-control summernote projectInput"
                                        placeholder="Faites une description du projet"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Chef de projet</label>
                                            <input value="{{ Auth::user()->name }}" readonly class="form-control"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="project-members">
                                                <br>
                                                @if (Auth::user()->media)
                                                    <a href="#" data-bs-toggle="tooltip"
                                                        title="{{ Auth::user()->name }}" class="avatar">
                                                        <img src="{{ Storage::url(Auth::user()->media->path) }}" alt>
                                                    </a>
                                                @else
                                                    <a href="#" data-bs-toggle="tooltip"
                                                        title="{{ Auth::user()->name }}" class="avatar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="22px"
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
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Choisir les membres de l'équipe</label>
                                            <input onclick="ChooseAllMember()" readonly style="cursor: pointer"
                                                class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <br>
                                            <div class="project-members">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nom du projet</label>
                                            <input class="form-control" value="Project Management" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <select class="select">
                                                <option>Global Technologies</option>
                                                <option>Delta Infotech</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Rate</label>
                                            <input placeholder="$50" class="form-control" value="$5000" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <select class="select">
                                                <option>Hourly</option>
                                                <option selected>Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="select">
                                                <option selected>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Add Project Leader</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Team Leader</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"
                                                    class="avatar">
                                                    <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg"
                                                        alt>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Add Team</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Team Members</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"
                                                    class="avatar">
                                                    <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg"
                                                        alt>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"
                                                    class="avatar">
                                                    <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-09.jpg"
                                                        alt>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"
                                                    class="avatar">
                                                    <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-10.jpg"
                                                        alt>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"
                                                    class="avatar">
                                                    <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-05.jpg"
                                                        alt>
                                                </a>
                                                <span class="all-team">+2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal custom-modal fade" id="delete_project" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Project</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal"
                                            class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Choisir les membres de votre équipe --}}
            <div id="choose_members" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Choix des membres </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>

            <div id="process_create_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Création d'un projet</h5>
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

            <div class="modal custom-modal fade" id="archiver_project" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

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
@else
    @if (Auth::user()->roles->contains('nom', 'Manager'))
        @section('content')
            <div class="page-wrapper">
                <div class="content container-fluid">

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Vos projets</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Tableau
                                            de
                                            bord</a>
                                    </li>
                                    <li class="breadcrumb-item active">Projets</li>
                                </ul>
                            </div>
                            <div class="col-auto float-end ms-auto">
                            </div>
                            <div class="col-auto float-end ms-auto">
                                <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                    data-bs-target="#create_project"><i class="fa fa-plus"></i> Créer un projet</a>
                                <div class="view-icons">
                                    <a href="{{ route('projects-page') }}" class="grid-view btn btn-link active"><i
                                            class="fa fa-th"></i></a>
                                    <a href="{{ route('projects-list') }}" class="list-view btn btn-link"><i
                                            class="fa fa-bars"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- Les projets ou le manager n'est qu'un membre  --}}

                        @if ($nbr_ps != 0)
                            @foreach ($projects_membered as $project)
                                @php
                                    $chef_projet = User::where('name', $project->chef_projet)->first();
                                    $users_project = ProjetUtilisateur::where('projet_id', $project->id)->get();
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
                                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="project-title"><a
                                                    href="{{ route('project-view', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                            </h4>
                                            <small class="block text-ellipsis m-b-15">
                                                <span class="text-xs">{{ $nbr_taks_run }}</span> <span
                                                    class="text-muted">tâche(s)
                                                    en cours, </span>
                                                <span class="text-xs">{{ $nbr_taks_finish }}</span> <span
                                                    class="text-muted">tâche(s) accomplie(s)</span>
                                            </small>
                                            <p class="text-muted">
                                                {{ $project->description }}
                                            </p>
                                            <div class="pro-deadline m-b-15">
                                                <div class="sub-title">
                                                    Date de fin prévue:
                                                </div>
                                                <div class="text-muted">
                                                    {{ $project->date_fin_prevue }}
                                                </div>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Chef de projet :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        @if ($chef_projet->media)
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $project->chef_projet }}"><img alt
                                                                    src="{{ Storage::url($chef_projet->media->path) }}"></a>
                                                        @else
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $project->chef_projet }}">
                                                                <center>
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
                                                                </center>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Autres membres :</div>
                                                <ul class="team-members">
                                                    @foreach ($users_project as $user_project)
                                                        @if ($user_project->user_id != $chef_projet->id)
                                                            @php
                                                                $user = User::findOrFail($user_project->user_id);
                                                            @endphp
                                                            <li>
                                                                @if ($user->media)
                                                                    <a href="#" data-bs-toggle="tooltip"
                                                                        title="{{ $user->name }}"><img alt
                                                                            src="{{ Storage::url($user->media->path) }}"></a>
                                                                @else
                                                                    <a href="#" data-bs-toggle="tooltip"
                                                                        title="{{ $user->name }}">
                                                                        <center>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                height="17px" viewBox="0 0 448 512">
                                                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                <style>
                                                                                    svg {
                                                                                        fill: #9a9996
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                                            </svg>
                                                                        </center>
                                                                    </a>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progression <span
                                                    class="text-success float-end">{{ $progress_porcent }}%</span>
                                            </p>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    data-bs-toggle="tooltip" title="{{ $progress_porcent }}"
                                                    style="width: {{ $progress_porcent }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                        {{-- Les projets ou le manager est le chef  --}}
                        @php
                            $nbr_yp = Projet::where('chef_projet', Auth::user()->name)
                                ->get()
                                ->count();
                            $yps = Projet::where('chef_projet', Auth::user()->name)->get();
                        @endphp
                        @if ($nbr_yp != 0)
                            @foreach ($yps as $project)
                                @php
                                    $chef_projet = User::where('name', $project->chef_projet)->first();
                                    $users_project = ProjetUtilisateur::where('projet_id', $project->id)->get();
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
                                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown dropdown-action profile-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="forEditProject('{{ $project->id }}')"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Modifier</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="forArchiverProject('{{ $project->id }}')"><i
                                                            class="fa-regular fa-trash-can m-r-5"></i>
                                                        Archiver</a>
                                                </div>
                                            </div>
                                            <h4 class="project-title"><a
                                                    href="{{ route('project-view', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                            </h4>
                                            <small class="block text-ellipsis m-b-15">
                                                <span class="text-xs">{{ $nbr_taks_run }}</span> <span
                                                    class="text-muted">tâche(s)
                                                    en cours, </span>
                                                <span class="text-xs">{{ $nbr_taks_finish }}</span> <span
                                                    class="text-muted">tâche(s) accomplie(s)</span>
                                            </small>
                                            <p class="text-muted">
                                                {{ $project->description }}
                                            </p>
                                            <div class="pro-deadline m-b-15">
                                                <div class="sub-title">
                                                    Date de fin prévue:
                                                </div>
                                                <div class="text-muted">
                                                    {{ $project->date_fin_prevue }}
                                                </div>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Chef de projet :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        @if ($chef_projet->media)
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $project->chef_projet }}"><img alt
                                                                    src="{{ Storage::url($chef_projet->media->path) }}"></a>
                                                        @else
                                                            <a href="#" data-bs-toggle="tooltip"
                                                                title="{{ $project->chef_projet }}">
                                                                <center>
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
                                                                </center>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Autres membres :</div>
                                                <ul class="team-members">
                                                    @foreach ($users_project as $user_project)
                                                        @if ($user_project->user_id != $chef_projet->id)
                                                            @php
                                                                $user = User::findOrFail($user_project->user_id);
                                                            @endphp
                                                            <li>
                                                                @if ($user->media)
                                                                    <a href="#" data-bs-toggle="tooltip"
                                                                        title="{{ $user->name }}"><img alt
                                                                            src="{{ Storage::url($user->media->path) }}"></a>
                                                                @else
                                                                    <a href="#" data-bs-toggle="tooltip"
                                                                        title="{{ $user->name }}">
                                                                        <center>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                height="17px" viewBox="0 0 448 512">
                                                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                <style>
                                                                                    svg {
                                                                                        fill: #9a9996
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                                            </svg>
                                                                        </center>
                                                                    </a>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progression <span
                                                    class="text-success float-end">{{ $progress_porcent }}%</span>
                                            </p>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    data-bs-toggle="tooltip" title="{{ $progress_porcent }}"
                                                    style="width: {{ $progress_porcent }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $projects->links('pagination::simple-default') }}
                        @endif

                        {{-- Au cas ou le manager n'est ni membre ni chef d'aucun projet  --}}
                        @if ($nbr_ps == 0 && $nbr_yp == 0)
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <h5>Vous n'êtes ni membre ni chef d'aucun projet.</h5>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div id="create_project" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Création d'un projet</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nom du projet</label>
                                                <input name="titre" class="form-control projectInput" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Priorité</label>
                                                <select name="priorite" class="select projectInput">
                                                    <option>-</option>
                                                    <option>Minimale</option>
                                                    <option>Moyenne</option>
                                                    <option>Maximale</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date de début</label>
                                                <div class="cal-icon">
                                                    <input name="date_debut"
                                                        class="form-control datetimepicker projectInput" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Date de fin prévue</label>
                                                <div class="cal-icon">
                                                    <input name="date_fin_prevue"
                                                        class="form-control datetimepicker projectInput" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="4" class="form-control summernote projectInput"
                                            placeholder="Faites une description du projet"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Chef de projet</label>
                                                <input value="{{ Auth::user()->name }}" readonly class="form-control"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="project-members">
                                                    <br>
                                                    @if (Auth::user()->media)
                                                        <a href="#" data-bs-toggle="tooltip"
                                                            title="{{ Auth::user()->name }}" class="avatar">
                                                            <img src="{{ Storage::url(Auth::user()->media->path) }}" alt>
                                                        </a>
                                                    @else
                                                        <a href="#" data-bs-toggle="tooltip"
                                                            title="{{ Auth::user()->name }}" class="avatar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="22px"
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
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Choisir les membres de l'équipe</label>
                                                <input onclick="ChooseAllMember()" readonly style="cursor: pointer"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <br>
                                                <div class="project-members">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nom du projet</label>
                                                <input class="form-control" value="Project Management" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Client</label>
                                                <select class="select">
                                                    <option>Global Technologies</option>
                                                    <option>Delta Infotech</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Rate</label>
                                                <input placeholder="$50" class="form-control" value="$5000"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <select class="select">
                                                    <option>Hourly</option>
                                                    <option selected>Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Priority</label>
                                                <select class="select">
                                                    <option selected>High</option>
                                                    <option>Medium</option>
                                                    <option>Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Add Project Leader</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Team Leader</label>
                                                <div class="project-members">
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"
                                                        class="avatar">
                                                        <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg"
                                                            alt>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Add Team</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Team Members</label>
                                                <div class="project-members">
                                                    <a href="#" data-bs-toggle="tooltip" title="John Doe"
                                                        class="avatar">
                                                        <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg"
                                                            alt>
                                                    </a>
                                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"
                                                        class="avatar">
                                                        <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-09.jpg"
                                                            alt>
                                                    </a>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Smith"
                                                        class="avatar">
                                                        <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-10.jpg"
                                                            alt>
                                                    </a>
                                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"
                                                        class="avatar">
                                                        <img src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-05.jpg"
                                                            alt>
                                                    </a>
                                                    <span class="all-team">+2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Files</label>
                                        <input class="form-control" type="file">
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Choisir les membres de votre équipe --}}
                <div id="choose_members" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Choix des membres </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

                <div id="process_create_project" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Création d'un projet</h5>
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

                <div class="modal custom-modal fade" id="archiver_project" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    @else
        @section('content')
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Projets</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Tableau
                                            de
                                            bord</a>
                                    </li>
                                    <li class="breadcrumb-item active">(Projets auxquels vous participez)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @php
                        $pros_user = ProjetUtilisateur::where('user_id', Auth::user()->id)->get();
                        $nbr_pros_user = $pros_user->count();
                    @endphp
                    <div class="row">
                        @foreach ($pros_user as $pro_user)
                            @php
                                $prj = Projet::findOrFail($pro_user->projet_id);
                                $chef_projet = User::where('name', $prj->chef_projet)->first();
                                $users_project = ProjetUtilisateur::where('projet_id', $prj->id)->get();
                                $nbr_task = Tache::where('projet_id', $prj->id)->count();
                                $nbr_taks_finish = Tache::where('projet_id', $prj->id)
                                    ->where('statut', 'Accomplie')
                                    ->count();
                                $nbr_taks_run = Tache::where('projet_id', $prj->id)
                                    ->where('statut', 'En cours')
                                    ->count();
                                
                                if ($nbr_task != 0) {
                                    $progress_porcent = round(($nbr_taks_finish / $nbr_task) * 100);
                                } else {
                                    $progress_porcent = 0;
                                }
                            @endphp
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="project-title"><a
                                                href="{{ route('project-view', ['id' => $prj->id]) }}">{{ $prj->titre }}</a>
                                        </h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">{{ $nbr_taks_run }}</span> <span
                                                class="text-muted">tâche(s)
                                                en cours, </span>
                                            <span class="text-xs">{{ $nbr_taks_finish }}</span> <span
                                                class="text-muted">tâche(s) accomplie(s)</span>
                                        </small>
                                        <p class="text-muted">
                                            {{ $prj->description }}
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Date de fin prévue:
                                            </div>
                                            <div class="text-muted">
                                                {{ $prj->date_fin_prevue }}
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Chef de projet :</div>
                                            <ul class="team-members">
                                                <li>

                                                    <a href="#" data-bs-toggle="tooltip"
                                                        title="{{ $prj->chef_projet }}">
                                                        @if ($chef_projet->media)
                                                            <img alt src="{{ Storage::url($chef_projet->media->path) }}">
                                                        @else
                                                            <center>
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
                                                            </center>
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Autres membres :</div>
                                            <ul class="team-members">
                                                @foreach ($users_project as $user_project)
                                                    @if ($user_project->user_id != $chef_projet->id)
                                                        @php
                                                            $user = User::findOrFail($user_project->user_id);
                                                        @endphp
                                                        <li>
                                                            @if ($user->media)
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    title="{{ $user->name }}"><img alt
                                                                        src="{{ Storage::url($user->media->path) }}"></a>
                                                            @else
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    title="{{ $user->name }}">
                                                                    <center>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            height="17px" viewBox="0 0 448 512">
                                                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                            <style>
                                                                                svg {
                                                                                    fill: #9a9996
                                                                                }
                                                                            </style>
                                                                            <path
                                                                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                                        </svg>
                                                                    </center>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progression <span
                                                class="text-success float-end">{{ $progress_porcent }}%</span>
                                        </p>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                data-bs-toggle="tooltip" title="{{ $progress_porcent }}"
                                                style="width: {{ $progress_porcent }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($nbr_pros_user == 0)
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5> Vous n'êtes membre d'aucun projet </h5>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endsection
    @endif
@endif


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

    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#successMessage').modal('show')
                $('.success-message').text('{{ session('success') }}')
            })
        </script>
    @endif
    @if (session('restriction'))
        <script>
            $(document).ready(function() {
                $('#restrictionMessage').modal('show')
                $('.restriction-message').text('{{ session('restriction') }}')
            })
        </script>
    @endif
@endsection
