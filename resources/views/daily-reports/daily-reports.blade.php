<?php
use Carbon\Carbon;

$actual_date = Carbon::now()->isoFormat('dddd DD MMMM YYYY');

?>

@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="chat-main-row">

            <div class="chat-main-wrapper">
                <div class="col-lg-7 message-view task-view task-left-sidebar">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-start me-auto">
                                    <div class="add-task-btn-wrapper">
                                        <span class="add-task-btn btn btn-white btn-sm">
                                            Ajouter une note
                                        </span>
                                    </div>
                                </div>
                                <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i
                                        class="fa fa fa-comment"></i></a>
                                <ul class="nav float-end custom-menu">
                                    <li class="nav-item dropdown dropdown-action">
                                        <a href class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-cog"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="{{ route('list-daily-task-employee', ['id' => Auth::user()->id]) }}">Liste
                                                de vos tâches</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Notez les difficultés
                                                rencontrées</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        @foreach ($old_daily_reports as $daily_report)
                                            <div class="task-wrapper">
                                                <div class="task-list-container">
                                                    <div class="task-list-body">
                                                        <span
                                                            style="margin-left: 5%; color: #777">{{ $daily_report->report_date }}</span>
                                                        <ul id="task-list">
                                                            <li class="completed task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn"
                                                                            title="Mark Complete">
                                                                            <i class="material-icons">check</i>
                                                                        </span>
                                                                    </span>
                                                                    <span
                                                                        class="task-label">{{ $daily_report->report_content }}</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="task-wrapper">
                                            <div class="task-list-container">
                                                <div class="task-list-body">
                                                    <span
                                                        style="margin-left: 5%">{{ Carbon::now()->isoFormat('dddd DD MMMM YYYY') }}</span>
                                                    <ul id="task-list">
                                                        @forelse ($new_daily_reports as $daily_report)
                                                            <li class="task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn"
                                                                            title="Mark Complete">
                                                                            <i class="material-icons">check</i>
                                                                        </span>
                                                                    </span>
                                                                    <span
                                                                        class="task-label">{{ $daily_report->report_content }}</span>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <li class="completed task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large ">
                                                                        </span>
                                                                    </span>
                                                                    <span class="task-label">Aucune notes
                                                                        enregistrées</span>
                                                                </div>
                                                            </li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                                <div class="task-list-footer">
                                                    <form action="{{ route('submit-daily-report') }}" method="POST">
                                                        @csrf
                                                        <div class="new-task-wrapper">
                                                            <textarea required name="content" id="new-task" placeholder="Entrer votre note ici. . ."></textarea>
                                                            <span class="error-message hidden">Souhaitez-vous ajouter une
                                                                note
                                                                par rapport à vos tâches ?</span>

                                                            <button type="submit" class="add-new-task-btn btn"
                                                                id="add-task">Ajouter</button>
                                                            <span class="btn" id="close-task-panel">Fermer</span>
                                                        </div>
                                                    </form>

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
            </div>
        </div>
    </div>
@endsection
