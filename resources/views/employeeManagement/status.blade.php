@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Statuts</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-Tableau de bord.html">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Statuts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_designation"><i
                                class="fa fa-plus"></i> Ajouter un statut</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th>Statuts </th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuts as $statut)
                                    <tr>
                                        <td>{{ $statut->id }}</td>
                                        <td>{{ $statut->statut }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="EditForStatut({{ $statut->id }})"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Modifier</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="DeleteForStatut({{ $statut->id }})"><i
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


        <div id="add_designation" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un statut</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('status.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nom du statut </label>
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


        <div id="edit_designation" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modification</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_designation" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
