@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Département</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Departement</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_department"><i
                                class="fa fa-plus"></i> Ajouter un département</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div>
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Nom</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ($departements as $departement)
                                    @php
                                        $counter++;
                                    @endphp
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $departement->nom }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        onclick="EditForDepartement('{{ $departement->id }}')"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Modifier</a>
                                                    <a class="dropdown-item"
                                                        onclick="DeleteForDepartement('{{ $departement->id }}')"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Supprimer</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="add_department" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un département</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('departements.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nom du département</label>
                                <input name="nom" class="form-control" type="text">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="edit_department" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier un département</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_department" role="dialog">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
