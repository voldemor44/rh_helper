<?php
use App\Models\User;
use App\Models\ProjetUtilisateur;
use App\Models\Projet;
use App\Models\Tache;
?>


@extends('layout.app-project')

@section('content-projects')
    <div class="page-wrapper">

        <div class="chat-main-row">

            <div class="chat-main-wrapper">
                <div class="col-lg-7 message-view task-view task-left-sidebar">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-start me-auto">
                                    <div class="add-task-btn-wrapper">
                                        <span class="btn btn-white btn-sm">
                                            Ajouter une tâche
                                        </span>
                                    </div>
                                </div>
                                <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i
                                        class="fa fa fa-comment"></i></a>

                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="task-wrapper">
                                            <div class="task-list-container">
                                                <div class="task-list-body">
                                                    <ul id="task-list">
                                                        @php
                                                            $tasks = Tache::where('projet_id', $first->id)->get();
                                                            if (!Auth::user()->roles->contains('nom', 'Administrateur') && !Auth::user()->roles->contains('nom', 'Manager')) {
                                                                $tasks = Tache::where('projet_id', $first->id)
                                                                    ->where('user_id', Auth::user()->id)
                                                                    ->get();
                                                            }
                                                        @endphp
                                                        @forelse ($tasks as $task)
                                                            @if ($task->statut === 'accomplie')
                                                                <li class="completed task">
                                                                    <div class="task-container">
                                                                        <span class="task-action-btn task-check">
                                                                            <span class="action-circle large complete-btn">
                                                                                <i class="material-icons">check</i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="task-label">{{ $task->titre }}</span>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <li class="task">
                                                                    <div class="task-container">
                                                                        <span class="task-action-btn task-check">
                                                                            <span class="action-circle large complete-btn">
                                                                                <i class="material-icons">check</i>
                                                                            </span>
                                                                        </span>
                                                                        <span class="task-label">{{ $task->titre }}</span>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @empty
                                                            <li class="task">
                                                                <div class="task-container">
                                                                    <span class="task-label">Aucune tâches</span>
                                                                </div>
                                                            </li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                                <div class="task-list-footer">
                                                    <div class="new-task-wrapper">
                                                        <textarea id="new-task" placeholder="Entrer la tâche ici. . ."></textarea>
                                                        <span class="error-message hidden">Voulez-vous ajoutez cette tâche
                                                            ?
                                                        </span>
                                                        <span class="add-new-task-btn btn" id="add-task">Ajouter</span>
                                                        <span class="btn" id="close-task-panel">Fermer</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-popup hide">
                                            <p>
                                                <span class="task"></span>
                                                <span class="notification-text"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div style="margin-left: 25%" class="navbar">
                                <div class="task-assign">
                                    <a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
                                        <i class="material-icons">check</i> Marquer le projet comme achevé
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-contents task-chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="chats">
                                            <h4>Discussion sur le projet </h4>
                                            <div class="task-header">
                                                <div class="assignee-info">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#assignee">
                                                        <div style="margin-right: 3%" class="my-profileImg">
                                                            @php
                                                                $chef = User::where('name', $first->chef_projet)->first();
                                                            @endphp
                                                            @if ($chef->media)
                                                                <img alt src="{{ Storage::url($chef->media->path) }}">
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

                                                        </div>
                                                        <div class="assigned-info">
                                                            <div class="task-head-title">{{ $first->chef_projet }}</div>
                                                            <div class="task-assignee">Chef de projet</div>
                                                        </div>
                                                    </a>
                                                    <span class="remove-icon">
                                                        <i class="fa fa-close"></i>
                                                    </span>
                                                </div>
                                                <div class="task-due-date">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#assignee">
                                                        <div class="due-icon">
                                                            <span>
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                        </div>
                                                        <div class="due-info">
                                                            <div class="task-head-title">Crée le</div>
                                                            <div class="due-date">Mar 26, 2019</div>
                                                        </div>
                                                    </a>
                                                    <span class="remove-icon">
                                                        <i class="fa fa-close"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-desc">
                                                <div class="task-desc-icon">
                                                    <i class="material-icons">subject</i>
                                                </div>
                                                <div class="task-textarea">
                                                    <textarea class="form-control" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a>
                                                    <span class="task-info-subject">created task</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a>
                                                    <span class="task-info-subject">added to Hospital
                                                        Administration</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">Lesley
                                                        Grauer</a>
                                                    <span class="task-info-subject">assigned to John
                                                        Doe</span></span>
                                                <div class="task-time">Jan 20, 2019</div>
                                            </div>
                                            <hr class="task-line">
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">John
                                                        Doe</a> <span class="task-info-subject">changed the due date
                                                        to Sep 28</span> </span>
                                                <div class="task-time">9:09pm</div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line"><a class="task-user" href="#">John
                                                        Doe</a> <span class="task-info-subject">assigned to
                                                        you</span></span>
                                                <div class="task-time">9:10pm</div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
                                                        <img alt
                                                            src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-02.jpg">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">John Doe</span> <span
                                                                class="chat-time">8:35
                                                                am</span>
                                                            <p>I'm just looking around.</p>
                                                            <p>Will you tell me something about yourself? </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="completed-task-msg"><span class="task-success"><a
                                                        href="#">John
                                                        Doe</a> completed this task.</span> <span class="task-time">Today
                                                    at
                                                    9:27am</span></div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
                                                        <img alt
                                                            src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-02.jpg">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">John Doe</span> <span
                                                                class="file-attached">attached 3 files <i
                                                                    class="fa fa-paperclip"></i></span> <span
                                                                class="chat-time">Feb
                                                                17, 2019 at 4:32am</span>
                                                            <ul class="attach-list">
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">project_document.avi</a></li>
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">video_conferencing.psd</a></li>
                                                                <li><i class="fa fa-file"></i> <a
                                                                        href="#">landing_page.psd</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
                                                        <img alt
                                                            src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span> <span
                                                                class="file-attached">attached file <i
                                                                    class="fa fa-paperclip"></i></span> <span
                                                                class="chat-time">Yesterday at 9:16pm</span>
                                                            <ul class="attach-list">
                                                                <li class="pdf-file"><i
                                                                        class="fa-regular fa-file-pdf"></i> <a
                                                                        href="#">Document_2016.pdf</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
                                                        <img alt
                                                            src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span> <span
                                                                class="file-attached">attached file <i
                                                                    class="fa fa-paperclip"></i></span> <span
                                                                class="chat-time">Today
                                                                at 12:42pm</span>
                                                            <ul class="attach-list">
                                                                <li class="img-file">
                                                                    <div class="attach-img-download"><a
                                                                            href="#">avatar-1.jpg</a></div>
                                                                    <div class="task-attach-img"><img
                                                                            src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/user.jpg"
                                                                            alt></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line">
                                                    <a class="task-user" href="#">John Doe</a>
                                                    <span class="task-info-subject">marked task as incomplete</span>
                                                </span>
                                                <div class="task-time">1:16pm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <div class="message-bar">
                                <div class="message-inner">
                                    <a class="link attach-icon" href="#"><img src="assets/img/attachment.png"
                                            alt></a>
                                    <div class="message-area">
                                        <div class="input-group">
                                            <textarea class="form-control" placeholder="Entrer votre message..."></textarea>
                                            <button class="btn btn-primary" type="button"><i
                                                    class="fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-members task-followers">
                                <span class="followers-title">Membres</span>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" title="Jeffery Lalor">
                                    <img alt
                                        src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-16.jpg">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" title="Richard Miles">
                                    <img alt
                                        src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-09.jpg">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" title="John Smith">
                                    <img alt
                                        src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-10.jpg">
                                </a>
                                <a class="avatar" href="#" data-bs-toggle="tooltip" title="Mike Litorus">
                                    <img alt
                                        src="https://smarthr.dreamguystech.com/laravel/template/public/assets/img/profiles/avatar-05.jpg">
                                </a>
                                <a href="#" class="followers-add" data-bs-toggle="modal"
                                    data-bs-target="#task_followers"><i class="material-icons">add</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
