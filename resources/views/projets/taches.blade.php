<?php
use App\Models\User;
use App\Models\ProjetUtilisateur;
use Carbon\Carbon;

function convectDateFormat($date)
{
    $carbonDate = Carbon::parse($date);
    return $carbonDate->isoFormat('DD MMM');
}
?>

@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div id="my-div-id" data-id="{{ $project->id }}" class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{ $project->titre }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Projet</a>
                            </li>
                            <li class="breadcrumb-item active">Liste des tâches</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row board-view-header">
                <div class="col-4">
                    <div class="pro-teams">
                        <div class="pro-team-lead">
                            <h4>Membre de l'équipe</h4>
                            <div class="avatar-group">
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
                                @foreach ($users_project as $user_project)
                                    @php
                                        $user = User::findOrFail($user_project->user_id);
                                    @endphp
                                    @if ($user->media)
                                        <div data-bs-toggle="tooltip" title="{{ $user->name }}" class="my-profileImg">
                                            <img class="avatar-img rounded-circle border border-white"
                                                src="{{ Storage::url($user->media->path) }}">
                                        </div>
                                    @else
                                        <div data-bs-toggle="tooltip" title="{{ $user->name }}" class="my-profileImg">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 0 448 512">
                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <style>
                                                    svg {
                                                        fill: #9a9996
                                                    }
                                                </style>
                                                <path
                                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                            </svg>
                                        </div>
                                    @endif
                                @endforeach
                                @if (Auth::user()->name == $project->chef_projet)
                                    <div class="avatar">
                                        <a href class="avatar-title rounded-circle border border-white"
                                            data-bs-toggle="modal" data-bs-target="#assign_leader"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end">
                    <a href="#" class="btn btn-white float-end ms-2" data-bs-toggle="modal"
                        data-bs-target="#add_task_modal"><i class="fa fa-plus"></i> Ajouter une tâche</a>
                    <a href="{{ route('project-view', ['id' => $project->id]) }}" class="btn btn-white float-end"
                        title="View Board"><i class="fa fa-link"></i></a>
                </div>
                <div class="col-12">
                    <div class="pro-progress">
                        <div class="pro-progress-bar">
                            <h4>Progression</h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                            </div>
                            <span>20%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-board card mb-0">
                <div class="card-body">
                    <div class="kanban-cont">
                        <div class="kanban-list kanban-danger">
                            <div class="kanban-header">
                                <span class="status-title">Suspendues</span>

                            </div>
                            <div class="kanban-wrap">
                                @forelse ($avoidTask as $task)
                                    <div class="card panel">
                                        <div class="kanban-box">
                                            <div class="task-board-header">
                                                <span class="status-title"><a
                                                        href="task-view">{{ $task->titre }}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href data-bs-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Effacer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                @php
                                                    $userAssigned = User::findOrFail($task->user_id);
                                                @endphp
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa-regular fa-clock"></i>
                                                            {{ convectDateFormat($task->date_delai) }} </span>
                                                        <span
                                                            class="task-priority badge bg-inverse-warning">{{ $task->priorite }}</span>
                                                    </span>
                                                    <span class="task-users">
                                                        @if ($userAssigned->media)
                                                            <div data-bs-toggle="tooltip" title="{{ $userAssigned->name }}"
                                                                class="avatar">
                                                                <img class="avatar-img rounded-circle border border-white"
                                                                    src="{{ Storage::url($userAssigned->media->path) }}">
                                                            </div>
                                                        @else
                                                            <div style="margin-left: 35%" data-bs-toggle="tooltip"
                                                                title="{{ $userAssigned->name }}" class="avatar">
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
                                                            </div>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="task-info-cont">
                                        Aucune tâches suspendues
                                    </span>
                                @endforelse

                            </div>

                        </div>

                        <div class="kanban-list kanban-info">
                            <div class="kanban-header">
                                <span class="status-title">En cours</span>
                            </div>
                            <div class="kanban-wrap">
                                @forelse ($allTask as $task)
                                    <div class="card panel">
                                        <div class="kanban-box">
                                            <div class="task-board-header">
                                                <span class="status-title"><a
                                                        href="task-view">{{ $task->titre }}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href data-bs-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div data-bs-toggle="tooltip" title="{{ $task->contenu }}">
                                                            <a class="dropdown-item" href="#">Contenu</a>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            onclick="forEditTask('{{ $task->id }}')">Modifier</a>
                                                        <a class="dropdown-item"
                                                            onclick="forAvoidTask('{{ $task->id }}')">Suspendre</a>
                                                        <a class="dropdown-item"
                                                            onclick="forCompleteTask('{{ $task->id }}')">Compléter</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                @php
                                                    $userAssigned = User::findOrFail($task->user_id);
                                                @endphp
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa-regular fa-clock"></i> &nbsp;
                                                            {{ convectDateFormat($task->date_delai) }}</span>
                                                        <span
                                                            class="task-priority badge bg-inverse-warning">{{ $task->priorite }}</span>
                                                    </span>
                                                    <span class="task-users">
                                                        @if ($userAssigned->media)
                                                            <div data-bs-toggle="tooltip"
                                                                title="{{ $userAssigned->name }}" class="avatar">
                                                                <img class="avatar-img rounded-circle border border-white"
                                                                    src="{{ Storage::url($userAssigned->media->path) }}">
                                                            </div>
                                                        @else
                                                            <div style="margin-left: 35%" data-bs-toggle="tooltip"
                                                                title="{{ $userAssigned->name }}" class="avatar">
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
                                                            </div>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="task-info-cont">
                                        Aucune tâches en cours
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <div class="kanban-list kanban-success">
                            <div class="kanban-header">
                                <span class="status-title">Achevées</span>
                            </div>
                            <div class="kanban-wrap">
                                @forelse ($completedTask as $task)
                                    <div class="card panel">
                                        <div class="kanban-box">
                                            <div class="task-board-header">
                                                <span class="status-title"><a
                                                        href="task-view">{{ $task->titre }}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href data-bs-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div data-bs-toggle="tooltip" title="{{ $task->contenu }}">
                                                            <a class="dropdown-item" href="#">Contenu</a>
                                                        </div>
                                                        <a class="dropdown-item" href="#">Effacer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                @php
                                                    $userAssigned = User::findOrFail($task->user_id);
                                                @endphp
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i
                                                                class="fa-regular fa-clock"></i>{{ convectDateFormat($task->date_delai) }}</span>
                                                        <span
                                                            class="task-priority badge bg-inverse-warning">{{ $task->priorite }}</span>
                                                    </span>
                                                    <span class="task-users">
                                                        @if ($userAssigned->media)
                                                            <div data-bs-toggle="tooltip"
                                                                title="{{ $userAssigned->name }}" class="avatar">
                                                                <img class="avatar-img rounded-circle border border-white"
                                                                    src="{{ Storage::url($userAssigned->media->path) }}">
                                                            </div>
                                                        @else
                                                            <div style="margin-left: 35%" data-bs-toggle="tooltip"
                                                                title="{{ $userAssigned->name }}" class="avatar">
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
                                                            </div>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <span class="task-info-cont">
                                        Aucune tâches achevées
                                    </span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="assign_leader" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau membre</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input id="my-search-input" placeholder="Nouveau membre" class="form-control search-input"
                                type="text">
                            <button class="btn btn-primary">Rechercher</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                @foreach ($users_without_members as $user)
                                    <div class="my-employee">
                                        <li>
                                            <a href="#">
                                                <div class="media d-flex my-contain-member"
                                                    data-nom="{{ $user->name }}">
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
                            <button onclick="submitnewMembers()" class="btn btn-primary submit-btn">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modifier le membre assigné à une tâche --}}
        <div id="change_member" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choisir un des membres</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <div id="assign_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign the user to this project</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search a user to assign" class="form-control search-input"
                                type="text">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0"><img alt
                                                    src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-09.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Richard Miles</div>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0"><img alt
                                                    src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-10.jpg"></span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">John Smith</div>
                                                <span class="designation">Android Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt
                                                    src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg">
                                            </span>
                                            <div class="media-body align-self-center text-nowrap">
                                                <div class="user-name">Jeffery Lalor</div>
                                                <span class="designation">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajout d'une tâche</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Titre</label>
                                <input class="form-control input-task">
                            </div>
                            <div class="form-group">
                                <label>Contenu</label>
                                <textarea class="form-control input-task" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Priorité</label>
                                <select class="form-control select input-task">
                                    <option>-</option>
                                    <option value="Maximale">Maximale</option>
                                    <option value="Moyenne">Moyenne</option>
                                    <option value="Minimale">Minimale</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de délai</label>
                                <div class="cal-icon"><input class="form-control datetimepicker input-task"
                                        type="text"></div>
                            </div>
                            <div class="form-group">
                                <label>Assigné à</label>
                                <input type="text"
                                    onclick="ChooseAssignedMember({{ $users_project }}, '{{ $project->id }}')"
                                    style="cursor: pointer" readonly class="form-control">
                            </div>
                            {{--
                                 <div class="submit-section text-center">
                                   <button class="btn btn-primary submit-btn">Ajouter</button>
                                 </div>
                                 --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit_task_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modification d'une tâche</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        {{-- Choisir le membre auquel assigné la tâche --}}
        <div id="choose_members" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choix du membre </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        {{-- Ajout d'une tâche --}}
        <div id="process_task_assign" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajout d'une tâche </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="addMemberMessage" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Opération efféctuée</h3>
                        </div>
                        <div class="add-member-message text-center"></div>
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
        <div class="modal custom-modal fade" id="suspend_task" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="completed_task" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('for_js_code')
    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#successMessage').modal('show')
                $('.success-message').text('{{ session('success') }}')
            })
        </script>
    @endif
    <script>
        function forEditTask(taskId) {
            console.log(taskId);
            $.ajax({
                url: "/task/" + taskId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_task_modal .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_task_modal').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });

        }

        function forAvoidTask(taskId) {
            console.log(taskId);
            $.ajax({
                url: "/to-task-avoid/" + taskId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#suspend_task .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#suspend_task').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        function forCompleteTask(taskId) {
            console.log(taskId);
            $.ajax({
                url: "/to-task-completed/" + taskId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#completed_task .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#completed_task').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }
    </script>
@endsection
