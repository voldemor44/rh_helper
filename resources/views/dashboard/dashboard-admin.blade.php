@extends('layout.app')

@section('counterBar_css')
    <style>
        @keyframes anim {
            100% {
                stroke-dashoffset: {{ 472 - 472 * $porcent }};
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Bienvenue Administrateur, {{ Auth::user()->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body dashboard">
                            <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                            <div class="dash-widget-info" id="some-element">
                                <h3> {{ $nbr_projets ?? 0 }} </h3>
                                <span>Projects</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa-solid fa-dollar-sign"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $nbr_contacts ?? 0 }}</h3>
                                <span>Clients</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-gem"></i></span>
                            <div class="dash-widget-info">
                                <h3> {{ $nbr_taches ?? 0 }} </h3>
                                <span>Tâches</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $nbr_employees ?? 0 }}</h3>
                                <span>Employees</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Fluctuation du taux de réalisation</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Taux de réalisation actuel</h3>
                                        <center>
                                            <div class="skill">
                                                <div class="outer">
                                                    <div class="inner">
                                                        <div id="number">
                                                            0%
                                                        </div>
                                                    </div>
                                                </div>


                                                <svg class="progress-bar-svg" xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1" width="160px" height="160px">
                                                    <defs>
                                                        <linearGradient id="GradientColor">
                                                            <stop offset="0%" stop-color="#e91e63" />
                                                            <stop offset="100%" stop-color="#673ab7" />
                                                        </linearGradient>
                                                    </defs>
                                                    <circle cx="80" cy="80" r="70"
                                                        stroke-linecap="round" />
                                                </svg>


                                            </div>
                                        </center>

                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-body mycard">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Pourcentage de tâches accomplies</span>
                                            </div>
                                            <div>
                                                <span class="text-success">+10%</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill dash-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Statistiques globales</h5>
                            <div class="stats-list">
                                <div class="stats-info">
                                    <p>Employés archivés <strong>4 <small>/ 65</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                            aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Contrats à termes <strong>15 <small>/ 92</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 31%"
                                            aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Projets achevés<strong>85 <small>/ 112</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                            aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Permissions validées <strong>190 <small>/ 212</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%"
                                            aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">Statistiques des tâches</h4>
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Total des tâches</p>
                                            <h3>{{ $nbr_taches }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>Tâches accomplies</p>
                                            <h3>{{ $nbr_tasks_completed }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress mb-4">

                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                    aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">30%</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">30%</div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                    aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">40%</div>

                            </div>
                            <div>

                                <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Tâches de priorité minimale <span
                                        class="float-end">{{ $nbr_tasks_min }}</span></p>
                                <p><i class="fa fa-dot-circle-o text-success me-2"></i>Tâches de priorité moyenne <span
                                        class="float-end">{{ $nbr_tasks_moy }}</span></p>
                                <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Tâches de priorité maximale <span
                                        class="float-end">{{ $nbr_tasks_max }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">Evenements récents <span class="badge bg-inverse-danger ms-2"></span>
                            </h4>
                            @forelse ($evenements as $evenement)
                                <div class="leave-info-box">
                                    <div class="media d-flex align-items-center">
                                        <a href="profile.html" class="avatar">
                                            <i class="fa fa-star"></i>

                                        </a>
                                        <div class="media-body flex-grow-1">
                                            <div class="text-sm my-0">{{ $evenement->titre }}</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            @php

                                                $date_debut = \Carbon\Carbon::parse($evenement->date_debut);
                                                $date_fin = \Carbon\Carbon::parse($evenement->date_fin);

                                                $date_debut_fr = $date_debut->isoFormat('dddd D MMMM YYYY HH:mm');
                                                $date_fin_fr = $date_fin->isoFormat('dddd D MMMM YYYY HH:mm');
                                            @endphp

                                            <h6 class="mb-0 d-flex"> <span>{{ $date_debut_fr }} </span>
                                                <span>{{ $date_fin_fr }}</span>
                                            </h6>
                                            <span class="text-sm text-muted">{{ $evenement->description }}</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span
                                                class=" badge bg-inverse-danger">{{ $evenement->typeEvenement->type }}</span>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <p>Aucun évènement récent</p>
                            @endforelse
                            <div class="load-more text-center">
                                <a class="text-dark" href="{{ route('events.index') }}">Consulter le calendrier des
                                    évènemnts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Entreprise</th>
                                            <th>Fonction</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar"><img alt
                                                                src="assets/img/profiles/avatar-19.jpg"></a>
                                                        <a href="client-profile.html">{{ $contact->nom }} </a>
                                                    </h2>
                                                </td>
                                                <td><a>{{ $contact->Entreprise }}</a>
                                                </td>
                                                <td><a>{{ $contact->fonction }}</a>
                                                </td>
                                                <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                        data-cfemail="4b292a393932283e2f2a0b2e332a263b272e65282426">{{ $contact->email }}</a>
                                                </td>
                                                <td><a>{{ $contact->telephone }}</a>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Modifier </a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-trash-o m-r-5"></i> Supprimer </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="cursor: pointer" class="card-footer">
                            <a href="{{ route('contacts.index') }}">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Projets récents</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom du projet </th>
                                            <th>Progression</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                            <tr>
                                                <td>
                                                    <h2><a href="project-view.html">{{ $project->titre }}</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>1</span> <span class="text-muted">open tasks, </span>
                                                        <span>9</span> <span class="text-muted">tasks completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="65%" style="width: 65%">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-expand"></i> Afficher</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <h2 style="text-align: center">Aucun projets récents</h2>
                                                </td>
                                                <td class="text-end">
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr style="color: rgb(143, 184, 212)">
                            </div>
                        </div>
                        <div style="cursor: pointer" class="card-footer">
                            <a href="{{ route('projects-list') }}">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('for_count_bar')
    <script src="{{ asset('js/counterBar.js') }}"></script>
@endsection
