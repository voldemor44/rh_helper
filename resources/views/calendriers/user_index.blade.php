<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - Calendriers</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    {{--  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    {{--  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  --}}

    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}" />

    <link href="{{ asset('css/morris.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">




    <link rel="stylesheet" href="{{ asset('css/style.css') }}">




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <style>
        .fc-event {
            height: 70px;
        }
    </style>



</head>

<body>

    <div class="main-wrapper">

        @include('partials.header')

        @include('partials.sidebar')

        <div class="page-wrapper">

            {{--  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="evenementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>  --}}

            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Calendrier</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Tableau de bord</a></li>
                                <li class="breadcrumb-item active">Calendrier</li>
                            </ul>
                        </div>
                        {{--  <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#add_event"><i class="fa fa-plus"></i> Ajouter un évènement</a>
                        </div>  --}}
                        {{--  <a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a>  --}}

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div id="calendar"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_event" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un évènement</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Titre</label>
                                    <input class="form-control" type="text" id="titres" value="Titre">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label> Description </label>
                                    <input class="form-control" type="text" id="descriptions"
                                        value="description">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label>Date de début <span class="text-danger"></span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" id="date-debut">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date de fin <span class="text-danger"></span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" id="date-fin">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="select form-control" id="type-evenement">
                                        @foreach ($type_evenements as $type_evenement)
                                            <option value="  {{ $type_evenement->id }}">

                                                {{ $type_evenement->type }}

                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" id="save">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add-event" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un évènement</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Titre </label>
                                <input class="form-control" type="text" name="titre" id="titre"
                                    value="titre">
                                <span class="text-danger" id="titreError"></span>
                            </div>
                            <div class="form-group">
                                <label>Description </label>
                                <input class="form-control" type="text" name="description" id="description"
                                    value="description">
                                <span class="text-danger" id="descriptionError"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <select class="select form-control" id="type_evenement" name="type_evenement">
                                    @foreach ($type_evenements as $type_evenement)
                                        <option value="{{ $type_evenement->id }}">
                                            {{ $type_evenement->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" id="save_evenement">Sauvegarder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal custom-modal fade" id="event-modal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Event</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-success submit-btn save-event">Create
                                event</button>
                            <button type="button" class="btn btn-danger submit-btn delete-event"
                                data-bs-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal custom-modal fade" id="updatedSuccess" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Bon travail</h3>
                                <p>L&apos;évènement a été mis à jour! Succès</p>

                            </div>
                            <div class="modal-btn Supprimer-action">
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

            <div class="modal custom-modal fade" id="errorMessage" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Erreur</h3>
                            </div>
                            <div class="error-message"></div> <!-- Ajout de l'élément pour afficher le message d'erreur -->
                            <div class="modal-btn Supprimer-action">
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




            <div class="modal custom-modal fade" id="deleteSuccess" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Bon travail</h3>
                                <p>L&apos;évènement a été supprimé! Succès</p>

                            </div>
                            <div class="modal-btn Supprimer-action">
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



            <div class="modal custom-modal fade" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add a category</h4>
                        </div>
                        <div class="modal-body p-20">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Category Name</label>
                                        <input class="form-control" placeholder="Enter name" type="text"
                                            name="category-name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Choose Category Color</label>
                                        <select class="form-control form-select" data-placeholder="Choose a color..."
                                            name="category-color">
                                            <option value="success">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="pink">Pink</option>
                                            <option value="primary">Primary</option>
                                            <option value="warning">Warning</option>
                                            <option value="orange">Orange</option>
                                            <option value="brown">Brown</option>
                                            <option value="teal">Teal</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger save-category"
                                data-bs-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('partials.settings-icon')

    <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>

    <script src="{{ asset('js/sticky-kit.min.js') }}"></script>

    <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>



    <script src="{{ asset('js/task.js') }}"></script>

    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/theme-settings.js') }}"></script>
    <script src="{{ asset('js/greedynav.js') }}"></script>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/fr.js"></script>



    <script>
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
            });

            var evenement = @json($events);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                dataType: "json",
                events: evenement,
                selectable: true,
                selectHelper: true,
                defaultView: 'agendaDay', // Set default view to agendaDay
                select: function(start, end, allDays) {
                    $('#add-event').modal('toggle');
                    $('#save_evenement').click(function() {

                        var titre = $('#titre').val();
                        var description = $('#description').val();
                        //   var user_id = ;
                        var type_evenement = $('#type_evenement').val();
                        var date_debut = moment(start).format('YYYY-MM-DD');
                        var date_fin = moment(end).format('YYYY-MM-DD');
                        //console.log(titre);
                        $.ajax({
                            url: "{{ route('calendrier.store') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                titre,
                                description,
                                type_evenement,
                                date_debut,
                                date_fin
                            },
                            success: function(response) {
                                $('#add-event').modal('hide')
                                $('#calendar').fullCalendar('renderEvents', {
                                    'titre': response.titre,
                                    'description': response.description,
                                    'type_evenement': response
                                        .type_evenement,
                                    'date_debut': response.date_debut,
                                    'date_fin': response.date_fin,
                                    'color': response.color
                                })
                                // Actualiser le calendrier pour afficher les nouveaux événements
                                $('#calendar').fullCalendar('render');
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    var errors = error.responseJSON.errors;
                                    for (var key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            $('#' + key + 'Error').html(errors[
                                            key]);
                                        }
                                    }
                                }

                            },
                        });
                    });
                },
                locale: 'fr', // Spécifie la langue française
              //  editable: true,


                {{--  selectAllow: function(event){
             return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                }  --}}
            });
            $("#add-event").on("hidden.bs.modal", function() {
                $('#save_evenement').unbind();

            });

            {{--  $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('width', '20px');
            $('.fc-event').css('border-radius', '50%');  --}}

            $('.fc').css('background-color', 'white');

        });
    </script>

    {{--  <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>  --}}


    {{--  <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>  --}}
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    {{--  <script src="{{ asset('js/chart.js') }}"></script>  --}}

    <script src="{{ asset('js/task.js') }}"></script>
</body>

</html>
