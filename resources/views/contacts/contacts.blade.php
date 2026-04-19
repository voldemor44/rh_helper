@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">


            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Contacts professionels</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-tableau de bord.html">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Contacts professionels</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_client"><i
                                class="fa fa-plus"></i> Ajouter un contact</a>
                        {{--  <div class="view-icons">
                            <a href="{{ route('contacts.index') }}" class="grid-view btn btn-link active"><i
                                    class="fa fa-th"></i></a>
                            <a href="{{ route('contacts_list') }}" class="list-view btn btn-link"><i
                                    class="fa fa-bars"></i></a>
                        </div>  --}}
                    </div>
                </div>
            </div>
            {{--  <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Id</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Nom</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating">
                                <option>Sélectionner une entreprise</option>
                                <option>Global Technologies</option>
                                <option>Delta Infotech</option>
                            </select>
                            <label class="focus-label">Entreprise</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="d-grid">
                            <a href="#" class="btn btn-success"> Rechercher </a>
                        </div>
                    </div>
                </div>  --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th colspan="2">Entreprise</th>
                                    {{--  <th>Type</th>  --}}
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Fonction</th>


                                    <th>Téléphone</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="client-profile.html" class="avatar">

                                                    <a href="client-profile.html" class="avatar"> <svg id="current-image"
                                                            xmlns="http://www.w3.org/2000/svg" height="2em"
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
                                                    </a>
                                                    <a href="client-profile.html">{{ $contact->Entreprise }}</a>
                                            </h2>
                                        </td>
                                        <td>
                                            {{ $contact->typeContact->type }}

                                        </td>

                                        <td> {{ $contact->nom }}</td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                        <td>
                                            {{ $contact->fonction }}
                                        </td>
                                        <td>
                                            {{ $contact->telephone }}
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_client"
                                                        data-contact-id="{{ $contact->id }}"><i
                                                            class="fa fa-pencil m-r-5"></i>
                                                        Modifier</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i>
                                                        Supprimer</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        Aucun contact enregistré
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                        @if ($contacts->count() != 0)
                        {{ $contacts->links('pagination::simple-default') }}
                    @endif
                    </div>
                </div>
            </div>



        </div>


        <div id="add_client" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un contact </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Entreprise</label>
                                        <input class="form-control" type="text" id="entreprise" name="entreprise">
                                    </div>
                                    @error('entreprise')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{--  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Type</label>

                                        {{--  <input class="form-control" type="text">
                                        <select class="select" id="typeContact" name="typeContact">
                                            @foreach ($Type_contacts as $type_contact)
                                                <option value="{{ $type_contact->id }}">{{ $type_contact->type }}</option>
                                            @endforeach
                                        </select>



                                    </div>
                                    @error('typeContact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>  --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Statut</label>
                                        <select name="typeContact" class="select">
                                            @foreach ($Type_contacts as $type_contact)
                                                <option value="{{ $type_contact->id }}">{{ $type_contact->type }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @error('typeContact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Nom & Prénoms</label>
                                        <input class="form-control" type="text" id="nom" name="nom">
                                    </div>
                                    @error('nom')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" type="email" id="email" name="email">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Fonction</label>
                                        <input class="form-control floating" type="text" id="fonction"
                                            name="fonction">
                                    </div>
                                    @error('fonction')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="text" id="telephone" name="telephone">
                                    </div>
                                    @error('telephone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{--  <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Client ID <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control floating" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Company Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>  --}}
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn " type="submit" name="sauvegarder"
                                    id="sauvegarder">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="edit_client" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier Client</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Entreprise</label>
                                        <input class="form-control" type="text" id="entreprise" name="entreprise">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Type</label>

                                        <select class="select" id="typeContact" name="typeContact">
                                            <option value="">Sélectionner un type</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Nom</label>
                                        <input class="form-control" type="text" id="nom" name="nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" type="email" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Fonction</label>
                                        <input class="form-control floating" type="text" id="fonction"
                                            name="fonction">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Téléphone</label>
                                        <input class="form-control" type="text" id="telephone" name="telephone">
                                    </div>
                                </div>

                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn " type="submit" name="editer"
                                    id="editer">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_client" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Supprimer Client</h3>
                            <p>Voulez-vous vraiment supprimer ?

                            </p>
                        </div>
                        <div class="modal-btn Supprimer-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Supprimer</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal custom-modal fade" id="Success" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Bon travail</h3>
                        {{--  <p>Le contact à été enregistré! Succès</p>  --}}
                        <div class="success-message text-center"></div>

                    </div>
                    <div class="modal-btn Supprimer-action mt-3">
                        <div class="row">

                            <div class="col-6 m-auto justify-content-center">
                                <a href="javascript:void(0);" data-bs-dismiss="modal"
                                    class="btn btn-primary cancel-btn ">Quitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="errorMessage" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Erreur</h3>
                    </div>
                    <div class="error-message text-center"></div>
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
@endsection



@section('js_calendar')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            {{--  var editButton = document.querySelector('a[data-bs-target="#edit_client"]');
            var editModal = document.getElementById('edit_client');
            var entrepriseInput = editModal.querySelector('#entreprise');
            var typeContactInput = editModal.querySelector('#type_contact');
            var nomInput = editModal.querySelector('#nom');
            var emailInput = editModal.querySelector('#email');
            var fonctionInput = editModal.querySelector('#fonction');
            var telephoneInput = editModal.querySelector('#telephone');  --}}

            editButton.addEventListener('click', function(event) {
                event.preventDefault();
                var contactId = this.getAttribute('data-contact-id');

                // Effectuer une requête AJAX pour récupérer les détails duEweb contact par son ID
                // et mettre à jour les valeurs des champs du formulaire
                $.ajax({
                    url: '/contact/edit/' + contactId,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        var contact = response.contact;
                        entrepriseInput.value = contact.Entreprise;
                        typeContactInput.value = contact.type_contact.type;
                        nomInput.value = contact.nom;
                        emailInput.value = contact.email;
                        fonctionInput.value = contact.fonction;
                        telephoneInput.value = contact.telephone;

                        var typeContactInput = editModal.querySelector('#typeContact');

                        // Supprimez toutes les options actuellement présentes dans le select
                        typeContactInput.innerHTML = '';

                        // Ajoutez la nouvelle option pour chaque type de contact récupéré
                        response.typesContact.forEach(function(type) {
                            var option = document.createElement('option');
                            option.value = type.id;
                            option.text = type.type;
                            typeContactInput.appendChild(option);
                        });


                        // Ouvrir la boîte modale d'édition du contact
                        const modal = document.getElementById('edit_client');
                        modal.show();
                    },
                    error: function(error) {
                        console.log(error);
                        // Gérer les erreurs de la requête AJAX
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }



            });

        });
    </script>


    @if (session('success'))
        <script>
            $(document).ready(function() {
                console.log('hello');
                $('#Success').modal('show');
                $('.success-message').text('{{ session('success') }}');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                $('#errorMessage').modal('show');
                $('.error-message').text('{{ session('error') }}');
            });
        </script>
    @endif
@endsection
