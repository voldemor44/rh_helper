@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">



            <div class="page-header">
                <div class="row align-items-center">

                    @if (Auth::user()->roles->contains('nom', 'Manager'))
                        <div class="col">
                            <h3 class="page-title">Membres du département</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Membres</li>
                            </ul>
                        </div>
                    @else
                        <div class="col">
                            <h3 class="page-title">Employés</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Employés</li>
                            </ul>
                        </div>
                    @endif

                    <div class="col-auto float-end ms-auto">
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i
                                class="fa fa-plus"></i> Ajouter un employé</a>
                        <div class="view-icons">
                            <a href="{{ route('employees') }}" class="grid-view btn btn-link "><i class="fa fa-th"></i></a>
                            <a href="{{ route('table-employees') }}" class="list-view btn btn-link active"><i
                                    class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="employees-table" class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>Nom & Prénoms</th>
                                    <th>Fonction</th>
                                    <th>Statut</th>
                                    <th>Département</th>
                                    <th>Date de début</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                    @forelse ($employees as $employee)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
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

                                                    </a>
                                                    <a
                                                        href="https://smarthr.dreamguystech.com/laravel/template/public/profile">{{ $employee->name }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>{{ $employee->fonction->nom }}</td>
                                            <td><a>{{ $employee->statutUtilisateur->statut }}</a>
                                            </td>
                                            <td>{{ $employee->departement->nom }}</td>
                                            <td>{{ $employee->date_naissance }}</td>
                                            <td> {{ $employee->email }} </td>
                                            <td>{{ $employee->telephone }}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="openEditModal('{{ $employee->id }}')"><i
                                                                class="fa fa-pencil"></i>Modifier</a>

                                                        <a class="dropdown-item" href="#"
                                                            onclick="openArchiverModal('{{ $employee->id }}')"><i
                                                                class="fa-regular fa-trash-can"></i> Archiver</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Liste des employés vide</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforelse
                                @endif

                                @if (Auth::user()->roles->contains('nom', 'Manager'))
                                    @forelse ($members_departements as $employee)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="https://smarthr.dreamguystech.com/laravel/template/public/profile"
                                                        class="avatar">
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

                                                    </a>
                                                    <a
                                                        href="https://smarthr.dreamguystech.com/laravel/template/public/profile">{{ $employee->name }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>{{ $employee->fonction->nom }}</td>
                                            <td><a>{{ $employee->statutUtilisateur->statut }}</a>
                                            </td>
                                            <td>{{ $employee->departement->nom }}</td>
                                            <td>{{ $employee->date_naissance }}</td>
                                            <td> {{ $employee->email }} </td>
                                            <td>{{ $employee->telephone }}</td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="openEditModal({{ $employee->id }})"><i
                                                                class="fa fa-pencil"></i>Modifier</a>

                                                        <a class="dropdown-item" href="#"
                                                            onclick="openArchiverModal({{ $employee->id }})"><i
                                                                class="fa-regular fa-trash-can"></i> Archiver</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Liste des employés vide</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforelse
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajout d&apos;un employé</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="col-form-label">{{ $error }}</div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('create-employee') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Nom </label>
                                            <input required name="nom" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Prénoms</label>
                                            <input required name="prenom" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Téléphone </label>
                                            <input required name="tel" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email </label>
                                            <input required name="email" class="form-control" type="email">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Mot de passe</label>
                                            <input required name="password" class="form-control" type="password">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date de début </label>
                                            <div class="cal-icon"><input required name="date"
                                                    class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Statut</label>
                                            <select name="statut" class="select">
                                                @foreach ($statut_users as $statut_user)
                                                    <option value="{{ $statut_user->id }}">{{ $statut_user->statut }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Department </label>
                                            <select required name="departement" class="select">
                                                @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                    @foreach ($departements as $departement)
                                                        <option value="{{ $departement->id }}">{{ $departement->nom }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="{{ Auth::user()->departement->id }}">
                                                        {{ Auth::user()->departement->nom }}
                                                    </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Fonction</label>
                                            <select required name="fonction" class="select">
                                                @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                    @foreach ($fonctions as $fonction)
                                                        <option value="{{ $fonction->id }}">{{ $fonction->nom }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($my_departement_functions as $fonction)
                                                        <option value="{{ $fonction->id }}">{{ $fonction->nom }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Rôles</label>
                                            <select required name="role" class="select">
                                                @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->nom }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $role_acces = Role::where('nom', 'Utilisateur')->first();
                                                    @endphp
                                                    <option value="{{ $role_acces->id }}">{{ $role_acces->nom }}
                                                    </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="edit_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editer un employé</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal custom-modal fade" id="errorEmail" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Erreur</h3>
                            </div>
                            <div class="error-email-message text-center"></div>
                            <!-- Ajout de l&apos;élément pour afficher le message d&apos;erreur -->
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

            <div class="modal custom-modal fade" id="errorPassword" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Erreur</h3>
                            </div>
                            <div class="error-password-message text-center"></div>
                            <!-- Ajout de l&apos;élément pour afficher le message d&apos;erreur -->
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
                            <!-- Ajout de l&apos;élément pour afficher le message d&apos;erreur -->
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

            <div class="modal custom-modal fade" id="errorManager" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Action impossible</h3>
                            </div>
                            <div class="error-manager text-center"></div>
                            <!-- Ajout de l&apos;élément pour afficher le message d&apos;erreur -->
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

            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            @endsection


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

                @if (session('errorEmail'))
                    <script>
                        $(document).ready(function() {
                            $('#errorEmail').modal('show')
                            $('.error-email-message').text('{{ session('errorEmail') }}')
                        })
                        console.log('mail error')
                    </script>
                @endif

                @if (session('errorPassword'))
                    <script>
                        $(document).ready(function() {
                            $('#errorPassword').modal('show')
                            $('.error-password-message').text('{{ session('errorPassword') }}')
                        })
                    </script>
                @endif

                @if (session('success'))
                    <script>
                        $(document).ready(function() {
                            $('#successMessage').modal('show')
                            $('.success-message').text('{{ session('success') }}')
                        })
                    </script>
                @endif

                @if (session('errorAdded'))
                    <script>
                        $(document).ready(function() {
                            $('#errorManager').modal('show')
                            $('.error-manager').text('{{ session('errorAdded') }}')
                        })
                    </script>
                @endif
            @endsection
