@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        @if (Auth::user()->roles->contains('nom', 'Utilisateur') && !Auth::user()->roles->contains('nom', 'Manager'))
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Demande de Permissions</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">(Gestion de vos demandes de permissions, congés, etc ...)
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_ticket"><i
                                    class="fa fa-plus"></i> Effectuer une demande</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">

                            <div class="card">
                                <a id="all" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre total de demandes effectuées</span>
                                            </div>

                                        </div>
                                        <h3 class="mb-3">{{ $totalPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            @if ($totalPermissions != 0)
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            @else
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            @endif

                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="card">
                                <a id="validate" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes validées</span>
                                            </div>
                                            <div>
                                                <span class="text-success">{{ $vp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $validatePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $vp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="card">
                                <a id="instance" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes en instance</span>
                                            </div>
                                            <div>
                                                <span class="text-primary">{{ $ip }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $instancePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $ip }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="card">
                                <a id="refused" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes rejetées</span>
                                            </div>
                                            <div>
                                                <span class="text-danger">{{ $rp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $refusedPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $rp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="complete-list" style="display: block">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste complète de vos demandes</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($permissions as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="EditForPermission({{ $permission->id }})"><i
                                                                    class="fa fa-pencil m-r-5"></i>
                                                                Modifier</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="validate-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste de vos demandes validées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_validatePermissions as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="EditForPermission({{ $permission->id }})"><i
                                                                    class="fa fa-pencil m-r-5"></i>
                                                                Modifier</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="instance-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste de vos demandes en instance</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_instancePermissions as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="EditForPermission({{ $permission->id }})"><i
                                                                    class="fa fa-pencil m-r-5"></i>
                                                                Modifier</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="refused-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste de vos demandes rejetées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_refusedPermissions as $permission)
                                            <tr>
                                                <td><a href="ticket-view">{{ $permission->id }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="EditForPermission({{ $permission->id }})"><i
                                                                    class="fa fa-pencil m-r-5"></i>
                                                                Modifier</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Soumission de la demande</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('permission_add') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Type de demande</label>
                                            <select name="typePermission" class="select">
                                                @foreach ($typePermissions as $typePermission)
                                                    <option value="{{ $typePermission->id }}">{{ $typePermission->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Objet de la demande</label>
                                            <input name="objet" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description de la demande</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fichier">Document justificatif</label>
                                            <input name="file" placeholder="Sélectionner un fichier" id="fichier"
                                                name="fichier" class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Soumettre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_permission" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier votre demande</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal custom-modal fade" id="delete_permission" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->roles->contains('nom', 'Administrateur'))
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Permissions et Congés</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">(Gestion des demandes de permissions, congés, etc
                                    ...)
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">
                            <div class="card">
                                <a id="all" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre total des demandes des employés</span>
                                            </div>

                                        </div>
                                        <h3 class="mb-3">{{ $nbrPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            @if ($nbrPermissions != 0)
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            @else
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 0%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="validate" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes validées</span>
                                            </div>
                                            <div>
                                                <span class="text-success">{{ $nbr_vp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_validatePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_vp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="instance" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes en instance</span>
                                            </div>
                                            <div>
                                                <span class="text-primary">{{ $nbr_ip }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_instancePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_ip }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="refused" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes rejetées</span>
                                            </div>
                                            <div>
                                                <span class="text-danger">{{ $nbr_rp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_refusedPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_rp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="complete-list" style="display: block">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes des employées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($allPermissions as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                            aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        @if ($permission->statut === 'En instance')
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    onclick="EditForPermission({{ $permission->id }})">
                                                                    <span class="text-success">Valider</span></a>
                                                                <a class="dropdown-item"
                                                                    onclick="DeleteForPermission({{ $permission->id }})"><span
                                                                        class="text-danger">Rejeter</span></a>
                                                            </div>
                                                        @else
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item">
                                                                    <span class="text-success">Aucune</span></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="validate-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes validées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_vp as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> <span style="margin-left: 80%">La liste est</span> </td>
                                                <td>vide</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="instance-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes en instances</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_ip as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="EditForPermission({{ $permission->id }})">
                                                                <span class="text-success">Valider</span></a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><span
                                                                    class="text-danger">Rejeter</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="refused-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes rejetées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_rp as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> <span style="margin-left: 80%">La liste est</span> </td>
                                                <td>vide</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Soumission de la demande</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('permission_add') }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Type de demande</label>
                                            <select name="typePermission" class="select">
                                                @foreach ($typePermissions as $typePermission)
                                                    <option value="{{ $typePermission->id }}">{{ $typePermission->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Objet de la demande</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description de la demande</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fichier">Document justificatif</label>
                                            <input placeholder="Sélectionner un fichier" id="fichier" name="fichier"
                                                class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Soumettre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_permission" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal custom-modal fade" id="delete_permission" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->roles->contains('nom', 'Manager'))
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Permissions et Congés</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">(Gestion des demandes de permissions, congés, etc
                                    ...)
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">
                            <div class="card">
                                <a id="all" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre total des demandes des employés du
                                                    departement</span>
                                            </div>

                                        </div>
                                        <h3 class="mb-3">{{ $nbrPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            @if ($nbrPermissions != 0)
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            @else
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 0%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="validate" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes validées</span>
                                            </div>
                                            <div>
                                                <span class="text-success">{{ $nbr_vp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_validatePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_vp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="instance" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes en instance</span>
                                            </div>
                                            <div>
                                                <span class="text-primary">{{ $nbr_ip }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_instancePermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_ip }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <a id="refused" style="color: rgb(35, 33, 33)" href="">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <span class="d-block">Nombre de demandes rejetées</span>
                                            </div>
                                            <div>
                                                <span class="text-danger">{{ $nbr_rp }} &nbsp;</span>
                                            </div>
                                        </div>
                                        <h3 class="mb-3">{{ $nbr_refusedPermissions }}</h3>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: {{ $nbr_rp }};" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="complete-list" style="display: block">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes des employées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($allPermissions as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                            aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        @if ($permission->statut === 'En instance')
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    onclick="EditForPermission({{ $permission->id }})">
                                                                    <span class="text-success">Valider</span></a>
                                                                <a class="dropdown-item"
                                                                    onclick="DeleteForPermission({{ $permission->id }})"><span
                                                                        class="text-danger">Rejeter</span></a>
                                                            </div>
                                                        @else
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item">
                                                                    <span class="text-success">Aucune</span></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="validate-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes validées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_vp as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> <span style="margin-left: 80%">La liste est</span> </td>
                                                <td>vide</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="instance-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes en instances</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_ip as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                onclick="EditForPermission({{ $permission->id }})">
                                                                <span class="text-success">Valider</span></a>
                                                            <a class="dropdown-item"
                                                                onclick="DeleteForPermission({{ $permission->id }})"><span
                                                                    class="text-danger">Rejeter</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Liste vide</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="refused-list" style="display: none">
                    <br><br>
                    <center>
                        <h4 class="breadcrumb-item active"> Liste des demandes rejetées</h4>
                    </center>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Objet</th>
                                            <th>Date de soumission</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th class="text-center">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @forelse ($all_rp as $permission)
                                            @php
                                                $counter++;
                                            @endphp
                                            <tr>
                                                <td><a href="ticket-view">{{ $counter }}</a></td>
                                                <td>{{ $permission->objet }}</td>
                                                <td>{{ $permission->created_at }}</td>
                                                <td>{{ $permission->contenu }}</td>
                                                <td>{{ $permission->typePermission->type }}</td>
                                                <td>{{ $permission->statut }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> <span style="margin-left: 80%">La liste est</span> </td>
                                                <td>vide</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="add_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Soumission de la demande</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('permission_add') }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Type de demande</label>
                                            <select name="typePermission" class="select">
                                                @foreach ($typePermissions as $typePermission)
                                                    <option value="{{ $typePermission->id }}">
                                                        {{ $typePermission->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Objet de la demande</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description de la demande</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fichier">Document justificatif</label>
                                            <input placeholder="Sélectionner un fichier" id="fichier" name="fichier"
                                                class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Soumettre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_permission" class="modal custom-modal fade" role="dialog">
                @if (Auth::user()->roles->contains('nom', 'Manager'))
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <div class="modal custom-modal fade" id="delete_permission" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
