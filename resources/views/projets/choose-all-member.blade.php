<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="div-members" data-values-inputs="{{ $values }}" class="input-group m-b-30">
        <input id="search-input" placeholder="Rechercher un employé..." class="form-control search-input" type="text">
        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div>
        <ul class="chat-user-list">
            @foreach ($employees as $employee)
                @if ($employee->name != Auth::user()->name)
                    <div class="employee">
                        <li>
                            <a href="#">
                                <div class="media d-flex contain-member" data-nom="{{ $employee->name }}">
                                    <span class="avatar flex-shrink-0">
                                        @if ($employee->media)
                                            <img alt src="{{ Storage::url($employee->media->path) }}">
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
                                        <div class="user-name">{{ $employee->name }}</div>
                                        <span class="designation">{{ $employee->fonction->nom }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </div>
                @endif
            @endforeach

        </ul>
    </div>
    <div class="submit-section">
        <button id="submit-member" onclick="submitMembers()" class="btn btn-primary submit-btn">Enregistrer</button>
    </div>

</body>

<script src="{{ asset('js/forChooseMember.js') }}"></script>

</html>
