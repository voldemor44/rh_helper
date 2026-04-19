@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="chat-main-row">

            <div class="chat-main-wrapper">
                <div class="col-lg-7 message-view task-view task-left-sidebar">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar row">
                                <div class="col-9">
                                    @if (Auth::user()->roles->contains('nom', 'Administrateur') || Auth::user()->roles->contains('nom', 'Manager'))
                                        Liste des tâches assignées à {{ $user_tasked->name }}
                                    @else
                                        Liste de vos tâches personnelles
                                    @endif

                                </div>
                                @if (Auth::user()->roles->contains('nom', 'Administrateur') || Auth::user()->roles->contains('nom', 'Manager'))
                                    <div class="col-3" class="float-start me-auto">
                                        <div class="add-task-btn-wrapper">
                                            <span class="btn btn-white btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#add_task_modal">
                                                Assigner lui une nouvelle tâche
                                            </span>
                                        </div>
                                    </div>
                                @endif
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

                                                        @forelse ($daily_tasks as $task)
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->roles->contains('nom', 'Administrateur') || Auth::user()->roles->contains('nom', 'Manager'))
                            <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ajout d'une tâche</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                action="{{ route('add-daily-task', ['id' => $user_tasked->id]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Titre</label>
                                                    <input name="title" class="form-control input-task">
                                                </div>
                                                <div class="form-group">
                                                    <label>Contenu</label>
                                                    <textarea name="content" class="form-control input-task" cols="30" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date de délai</label>
                                                    <div class="cal-icon"><input name="date"
                                                            class="form-control datetimepicker input-task" type="text">
                                                    </div>
                                                </div>
                                                <div class="submit-section text-center">
                                                    <button class="btn btn-primary submit-btn">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
