{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  --}}


@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profil</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <br><br>
                            <div class="profile-view">
                                <div class="profile-img-wrap">


                                    <div class="profile-img">
                                        @if (Auth::user()->media)
                                            <img src="{{ Storage::url(Auth::user()->media->path) }}" alt="">
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" height="9,1em" viewBox="0 0 448 512">
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

                                </div>


                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ Auth::user()->name }}</h3>
                                                <h6 class="text-muted">Département : {{ Auth::user()->departement->nom }}
                                                </h6>
                                                <small class="text-muted">Fonction :
                                                    {{ Auth::user()->fonction->nom }}</small>

                                                <div class="small doj text-muted">Date de début :
                                                    {{ Auth::user()->date_naissance }}
                                                </div>

                                                <div style="margin-top: 3%" class="small doj text-muted">Statut :
                                                    {{ Auth::user()->statutUtilisateur->statut }}
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Téléphone:</div>
                                                    <div class="text"><a href> {{ Auth::user()->telephone }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"> <a href> {{ Auth::user()->email }}</a> </div>
                                                </li>
                                                <li>
                                                    <div class="title">Date de naissance :</div>
                                                    @if (Auth::user()->infospersonnelle)
                                                        @if (Auth::user()->infospersonnelle->date_de_naissance)
                                                            <div class="text">
                                                                {{ Auth::user()->infospersonnelle->date_de_naissance }}
                                                            </div>
                                                        @else
                                                            <div class="text">à éditer</div>
                                                        @endif
                                                    @else
                                                        <div class="text">à éditer</div>
                                                    @endif

                                                </li>
                                                <li>
                                                    <div class="title">Adresse:</div>
                                                    @if (Auth::user()->infospersonnelle)
                                                        @if (Auth::user()->infospersonnelle->adresse)
                                                            <div class="text">
                                                                {{ Auth::user()->infospersonnelle->adresse }}</div>
                                                        @else
                                                            <div class="text">à éditer</div>
                                                        @endif
                                                    @else
                                                        <div class="text">à éditer</div>
                                                    @endif
                                                </li>
                                                <li>
                                                    <div class="title">Genre:</div>
                                                    @if (Auth::user()->infospersonnelle)
                                                        @if (Auth::user()->infospersonnelle->genre)
                                                            <div class="text">
                                                                {{ Auth::user()->infospersonnelle->genre }}</div>
                                                        @else
                                                            <div class="text">à éditer</div>
                                                        @endif
                                                    @else
                                                        <div class="text">à éditer</div>
                                                    @endif
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal"
                                        class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Informations personnelles <a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Numero IFU</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->numero_ifu)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->numero_ifu }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>

                                        <li>
                                            <div class="title">Nationalité</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->nationalite)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->nationalite }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Réligion</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->religion)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->religion }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">État civil</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->etat_civil)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->etat_civil }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Âge actuel</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->age_actuel)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->age_actuel }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>

                                        <li>
                                            <div class="title">N° compte bancaire</div>
                                            @if (Auth::user()->infospersonnelle)
                                                @if (Auth::user()->infospersonnelle->n_compte_bancaire)
                                                    <div class="text">
                                                        {{ Auth::user()->infospersonnelle->n_compte_bancaire }}</div>
                                                @else
                                                    <div class="text">à éditer</div>
                                                @endif
                                            @else
                                                <div class="text">à éditer</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Contacts d'urgence <a href="#" class="edit-icon"
                                            data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Premier contact</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Nom</div>
                                            <div class="text">à éditer</div>
                                        </li>
                                        <li>
                                            <div class="title">Relation</div>
                                            <div class="text">à éditer</div>
                                        </li>
                                        <li>
                                            <div class="title">Téléphone </div>
                                            <div class="text">à éditer</div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h5 class="section-title">Deuxième contact</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Nom</div>
                                            <div class="text">à éditer</div>
                                        </li>
                                        <li>
                                            <div class="title">Relation</div>
                                            <div class="text">à éditer</div>
                                        </li>
                                        <li>
                                            <div class="title">Téléphone </div>
                                            <div class="text">à éditer</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="emp_projects">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office Management</a>
                                    </h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt
                                                        src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt
                                                        src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt
                                                        src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt
                                                        src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span>
                                    </p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project Management</a>
                                    </h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt
                                                        src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt
                                                        src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt
                                                        src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt
                                                        src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span>
                                    </p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling App</a>
                                    </h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt
                                                        src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt
                                                        src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt
                                                        src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt
                                                        src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span>
                                    </p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown profile-action">
                                        <a aria-expanded="false" data-bs-toggle="dropdown"
                                            class="action-icon dropdown-toggle" href="#"><i
                                                class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#"
                                                class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital
                                            Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks,
                                        </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks
                                            completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. When an unknown printer took a galley of type and
                                        scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            17 Apr 2019
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt
                                                        src="assets/img/profiles/avatar-16.jpg"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt
                                                        src="assets/img/profiles/avatar-02.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt
                                                        src="assets/img/profiles/avatar-09.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt
                                                        src="assets/img/profiles/avatar-10.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt
                                                        src="assets/img/profiles/avatar-05.jpg"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success float-end">40%</span>
                                    </p>
                                    <div class="progress progress-xs mb-0">
                                        <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar"
                                            class="progress-bar bg-success" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <div id="image-preview">
                                            @if (Auth::user()->media)
                                                <img id="current-image"
                                                    src="{{ Storage::url(Auth::user()->media->path) }}" alt="">
                                            @else
                                                <svg id="current-image" xmlns="http://www.w3.org/2000/svg" height="9,1em"
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
                                        <div class="fileupload btn">
                                            <span class="btn-text">Photo</span>
                                            <input name="file" id="input-file" class="upload" type="file">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom & Prénoms</label>
                                                <input readonly name="name" type="text" class="form-control"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date de naissance</label>
                                                <div class="cal-icon">
                                                    @if (Auth::user()->infospersonnelle)
                                                        @if (Auth::user()->infospersonnelle->date_de_naissance)
                                                            <input name="date_naissance"
                                                                class="form-control datetimepicker" type="text"
                                                                value="{{ Auth::user()->infospersonnelle->date_de_naissance }}">
                                                        @else
                                                            <input name="date_naissance"
                                                                class="form-control datetimepicker" type="text">
                                                        @endif
                                                    @else
                                                        <input name="date_naissance" class="form-control datetimepicker"
                                                            type="text">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                <input type="text" name="tel" class="form-control"
                                                    value="{{ Auth::user()->telephone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                @if (Auth::user()->infospersonnelle)
                                                    @if (Auth::user()->infospersonnelle->adresse)
                                                        <input value="{{ Auth::user()->infospersonnelle->adresse }}"
                                                            name="adresse" type="text" class="form-control">
                                                    @else
                                                        <input name="adresse" type="text" class="form-control">
                                                    @endif
                                                @else
                                                    <input name="adresse" type="text" class="form-control">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Genre </label>
                                                <select name="genre" class="select form-control">
                                                    @if (Auth::user()->infospersonnelle)
                                                        @if (Auth::user()->infospersonnelle->genre === 'masculin')
                                                            <option value="masculin">Masculin</option>
                                                            <option value="féminin">Féminin</option>
                                                        @else
                                                            <option value="féminin">Féminin</option>
                                                            <option value="masculin">Masculin</option>
                                                        @endif
                                                    @else
                                                        <option value="masculin">Masculin</option>
                                                        <option value="féminin">Féminin</option>
                                                    @endif


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Modifier</button>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informations personnelles</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numéro IFU</label>
                                    @if (Auth::user()->infospersonnelle)
                                        @if (Auth::user()->infospersonnelle->numero_ifu)
                                            <input name="ifu" type="text"
                                                value="{{ Auth::user()->infospersonnelle->numero_ifu }}"
                                                class="form-control">
                                        @else
                                            <input name="ifu" type="text" class="form-control">
                                        @endif
                                    @else
                                        <input name="ifu" type="text" class="form-control">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationalité </label>
                                    <select name="nationalite" class="select form-control">
                                        <option>Béninoise</option>
                                        <option>Ivoirienne</option>
                                        <option>Gabonnaise</option>
                                        <option>Togolaise</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Réligion</label>
                                    @if (Auth::user()->infospersonnelle)
                                        @if (Auth::user()->infospersonnelle->religion)
                                            <input name="religion" value="{{ Auth::user()->infospersonnelle->religion }}"
                                                class="form-control" type="text">
                                        @else
                                            <input name="religion" class="form-control" type="text">
                                        @endif
                                    @else
                                        <input name="religion" class="form-control" type="text">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>État civil </label>
                                    <select name="civil" class="select form-control">
                                        <option>Célibataire</option>
                                        <option>Marié(e)</option>
                                        <option>Divorcé(e)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Âge actuel</label>
                                    @if (Auth::user()->infospersonnelle)
                                        @if (Auth::user()->infospersonnelle->age_actuel)
                                            <input name="age"
                                                value="{{ Auth::user()->infospersonnelle->age_actuel }}"
                                                class="form-control" type="number">
                                        @else
                                            <input name="age" class="form-control" type="number">
                                        @endif
                                    @else
                                        <input name="age" class="form-control" type="number">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numéro de compte bancaire</label>
                                    @if (Auth::user()->infospersonnelle)
                                        @if (Auth::user()->infospersonnelle->n_compte_bancaire)
                                            <input name="numBank"
                                                value="{{ Auth::user()->infospersonnelle->n_compte_bancaire }}"
                                                type="text" class="form-control">
                                        @else
                                            <input name="numBank" type="text" class="form-control">
                                        @endif
                                    @else
                                        <input name="numBank" type="text" class="form-control">
                                    @endif
                                </div>
                            </div>



                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contacts d'urgences</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Premier contact</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input name="nom1" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relation </label>
                                            <select name="relation1" class="select form-control">
                                                <option>Parents</option>
                                                <option>Amis</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Numéro</label>
                                            <input name="num1" class="form-control" type="text">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Deuxième contact</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input name="nom2" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relation </label>
                                            <select name="relation2" class="select form-control">
                                                <option>Parents</option>
                                                <option>Amis</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Numéro</label>
                                            <input name="num2" class="form-control" type="text">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('input_file')
    <script>
        document.getElementById('input-file').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;

                var previewDiv = document.getElementById('image-preview');
                var currentImage = document.getElementById('current-image');
                previewDiv.replaceChild(img, currentImage);
            }

            reader.readAsDataURL(file);
        });
    </script>
@endsection
