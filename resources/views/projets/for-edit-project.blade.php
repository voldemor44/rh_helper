<?php
use App\Models\User;
?>
<form method="POST" action="{{ route('edit-project', ['id' => $project->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nom du projet</label>
                <input name="titre" value="{{ $project->titre }}" class="form-control projectInput" type="text">
            </div>

        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Priorité</label>
                <select name="priorite" class="select projectInput">
                    @if ($project->priorite === 'Maximale')
                        <option value="Minimale">Minimale</option>
                        <option value="Moyenne">Moyenne</option>
                        <option selected value="Maximale">Maximale</option>
                    @endif
                    @if ($project->priorite === 'Moyenne')
                        <option value="Minimale">Minimale</option>
                        <option selected value="Moyenne">Moyenne</option>
                        <option value="Maximale">Maximale</option>
                    @endif
                    @if ($project->priorite === 'Minimale')
                        <option selected value="Minimale">Minimale</option>
                        <option value="Moyenne">Moyenne</option>
                        <option value="Maximale">Maximale</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Date de début</label>
                <div class="cal-icon">
                    <input value="{{ $project->date_debut }}" name="date_debut"
                        class="form-control datetimepicker projectInput" type="text">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Date de fin prévue</label>
                <div class="cal-icon">
                    <input value="{{ $project->date_fin_prevue }}" name="date_fin_prevue"
                        class="form-control datetimepicker projectInput" type="text">
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="4" class="form-control summernote projectInput">{{ $project->description }}</textarea>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Chef de projet</label>
                <input value="{{ $project->chef_projet }}" readonly class="form-control" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="project-members">
                    <br>
                    @if ($leader->media)
                        <a href="#" data-bs-toggle="tooltip" title="{{ $leader->name }}" class="avatar">
                            <img src="{{ Storage::url($leader->media->path) }}" alt>
                        </a>
                    @else
                        <a href="#" data-bs-toggle="tooltip" title="{{ $leader->name }}" class="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 448 512">
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
                <label>Ajouter de nouveaux membres </label>
                <input onclick="ChooseAllMember()" readonly style="cursor: pointer" class="form-control" type="text">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <br>
                <div class="project-members">
                    @foreach ($project_users as $project_user)
                        @if ($project_user->user_id != $leader->id)
                            @php
                                $member = User::findOrFail($project_user->user_id);
                            @endphp
                            @if ($member->media)
                                <a href="#" data-bs-toggle="tooltip" title="{{ $member->name }}" class="avatar">
                                    <img src="{{ Storage::url($member->media->path) }}" alt>
                                </a>
                            @else
                                <a href="#" data-bs-toggle="tooltip" title="{{ $member->name }}" class="avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 448 512">
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Ajouter des documents</label>
        <input name="document" class="form-control" type="file">
    </div>

    <div class="submit-section">
        <button class="btn btn-primary submit-btn">Modifier</button>
    </div>
</form>
