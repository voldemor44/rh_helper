<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('editedTask', ['taskId' => $task->id]) }}">
        @csrf
        <div class="form-group">
            <label>Titre</label>
            <input name="title" type="text" class="form-control" value="{{ $task->titre }}">
        </div>
        <div class="form-group">
            <label>Contenu</label>
            <textarea name="content" class="form-control input-task" cols="30" rows="3">{{ $task->contenu }}</textarea>
        </div>
        <div class="form-group">
            <label>Priorité</label>
            <select name="priority" class="form-control select">
                @if ($task->priorite === '-')
                    <option>-</option>
                    <option value="Minimale">Minimale</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Maximale">Maximale</option>
                @endif
                @if ($task->priorite === 'Maximale')
                    <option value="Minimale">Minimale</option>
                    <option value="Moyenne">Moyenne</option>
                    <option selected value="Maximale">Maximale</option>
                @endif
                @if ($task->priorite === 'Moyenne')
                    <option value="Minimale">Minimale</option>
                    <option selected value="Moyenne">Moyenne</option>
                    <option value="Maximale">Maximale</option>
                @endif
                @if ($task->priorite === 'Minimale')
                    <option selected value="Minimale">Minimale</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Maximale">Maximale</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Date de délai</label>
            <div class="cal-icon">
                <input name="date" class="form-control datetimepicker" type="text"
                    value="{{ $task->date_delai }}">
            </div>
        </div>
        <div class="form-group">
            <label>Assigné à</label>
            <input name="assigned" class="form-control" type="text" onclick="ChooseOtherMember()"
                style="cursor: pointer" readonly value="{{ $userAssigned->name }}">
            <div class="task-follower-list">
                <span data-bs-toggle="tooltip" title="{{ $userAssigned->name }}">
                    <i class="fa fa-times"></i>
                    @if ($userAssigned->media)
                        <img class="avatar-img rounded-circle border border-white"
                            src="{{ Storage::url($userAssigned->media->path) }}">
                    @else
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
                    @endif
                </span>
            </div>
        </div>
        <div class="submit-section text-center">
            <button class="btn btn-primary submit-btn">Modifier</button>
        </div>
    </form>
</body>

</html>
