<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <form method="POST" action="{{ route('project-create') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nom du projet</label>
                    <input value="{{ $values[0] }}" name="titre" class="form-control" type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Priorité</label>
                    <select name="priorite" class="select">
                        @if ($values[1] === '-')
                            <option>-</option>
                            <option value="Minimale">Minimale</option>
                            <option value="Moyenne">Moyenne</option>
                            <option value="Maximale">Maximale</option>
                        @endif
                        @if ($values[1] === 'Maximale')
                            <option value="Minimale">Minimale</option>
                            <option value="Moyenne">Moyenne</option>
                            <option selected value="Maximale">Maximale</option>
                        @endif
                        @if ($values[1] === 'Moyenne')
                            <option value="Minimale">Minimale</option>
                            <option selected value="Moyenne">Moyenne</option>
                            <option value="Maximale">Maximale</option>
                        @endif
                        @if ($values[1] === 'Minimale')
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
                        <input value="{{ $values[2] }}" name="date_debut" class="form-control datetimepicker"
                            type="text">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Date de fin prévue</label>
                    <div class="cal-icon">
                        <input value="{{ $values[3] }}" name="date_fin_prevue" class="form-control datetimepicker"
                            type="text">
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" class="form-control summernote"
                placeholder="Faites une description du projet">{{ $values[4] }}</textarea>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chef de projet</label>
                    <input name="chef_projet" value="{{ Auth::user()->name }}" readonly class="form-control"
                        type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="project-members">
                        <br>
                        @if (Auth::user()->media)
                            <a href="#" data-bs-toggle="tooltip" title="{{ Auth::user()->name }}" class="avatar">
                                <img src="{{ Storage::url(Auth::user()->media->path) }}">
                            </a>
                        @else
                            <a href="#" data-bs-toggle="tooltip" title="{{ Auth::user()->name }}" class="avatar">
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
                    <label>Choisir les membres de l'équipe</label>
                    <input name="membres_projet" value="{{ $members }}" onclick="ChooseAllMember()" readonly
                        style="cursor: pointer" class="form-control" type="text">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <br>
                    <div class="project-members">

                        @foreach ($usersTable as $user)
                            @if ($user->media)
                                <a href="#" data-bs-toggle="tooltip" title="{{ $user->name }}" class="avatar">
                                    <img src="{{ Storage::url($user->media->path) }}" alt>
                                </a>
                            @else
                                <a href="#" data-bs-toggle="tooltip" title="{{ $user->name }}" class="avatar">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Ajouter des documents</label>
            <input name="documents[]" class="form-control" type="file" multiple>
        </div>

        <div class="submit-section">
            <button class="btn btn-primary submit-btn">Créer</button>
        </div>
    </form>
</body>



</html>
