<!DOCTYPE html>
<html lang="fr" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ config('app.name') }} ">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name') }} </title>


    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-circle.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.1/dist/css/line-awesome.min.css">  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
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
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}" />

    <link href="{{ asset('css/morris.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />

    {{--  <link rel="stylesheet" href="/node_modules/shepherd.js/dist/css/shepherd.css">  --}}

    {{--  <link rel="stylesheet" href="{{asset('css/shepherd.css')}}">  --}}

    {{--  <script src="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/js/shepherd.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/css/shepherd.css"/>  --}}

    @yield('counterBar_css')
    @yield('contrat_css')

</head>

<body>

    <div class="main-wrapper">

        @include('partials.header')

        @include('partials.sidebar')

        @yield('content')

    </div>

    @include('partials.settings-icon')


    <script>
        // Pour Permission

        function EditForPermission(permissionId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire modification d'un département
            console.log(permissionId)
            $.ajax({

                url: "/modif-permissions/" + permissionId,

                method: "GET",

                success: function(response) {

                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_permission .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_permission').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });

        }

        function DeleteForPermission(permissionId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/delete-permission/" + permissionId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#delete_permission .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#delete_permission').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }


        // Pour département
        function EditForDepartement(departementId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire modification d'un département
            console.log('AJAX methode')
            $.ajax({

                url: "/departements/" + departementId,

                method: "GET",

                success: function(response) {
                    console.log('edit departement')
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_department .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_department').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });

        }

        function DeleteForDepartement(departementId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/delete-departement/" + departementId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#delete_department .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#delete_department').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        // Pour fonction
        function EditForFonction(fonctionId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire modification d'une fonction
            $.ajax({

                url: "/fonctions/" + fonctionId,

                method: "GET",

                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_designation .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_designation').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });

        }

        function DeleteForFonction(fonctionId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition d'une fonction
            $.ajax({
                url: "/delete-fonction/" + fonctionId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#delete_designation .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#delete_designation').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }


        // Pour statut
        function EditForStatut(statutId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire modification d'un statut
            $.ajax({

                url: "/status/" + statutId,

                method: "GET",

                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_designation .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_designation').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });


        }

        function DeleteForStatut(statutId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition du statut
            $.ajax({
                url: "/delete-statut/" + statutId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#delete_designation .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#delete_designation').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }


        // Pour employé
        function openEditModal(employeeId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/update-employee/" + employeeId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_employee .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_employee').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        function openArchiverModal(employeeId) {
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/archiver-employee/" + employeeId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#delete_employee .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#delete_employee').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }
    </script>
    <script>
        // Pour les listes des demandes des permissions

        var linkall = document.getElementById("all");
        var linkvalidate = document.getElementById("validate");
        var linkinstance = document.getElementById("instance");
        var linkrefused = document.getElementById("refused");



        var allList = document.getElementById("complete-list");
        var validateList = document.getElementById("validate-list");
        var instanceList = document.getElementById("instance-list");
        var refusedList = document.getElementById("refused-list");

        linkall.addEventListener("click", function(e) {
            e.preventDefault();
            allList.style.display = "block";
            validateList.style.display = "none";
            instanceList.style.display = "none";
            refusedList.style.display = "none";
        })
        linkvalidate.addEventListener("click", function(e) {
            e.preventDefault();
            allList.style.display = "none";
            validateList.style.display = "block";
            instanceList.style.display = "none";
            refusedList.style.display = "none";
        })
        linkinstance.addEventListener("click", function(e) {
            e.preventDefault();
            allList.style.display = "none";
            validateList.style.display = "none";
            instanceList.style.display = "block";
            refusedList.style.display = "none";
        })
        linkrefused.addEventListener("click", function(e) {
            e.preventDefault();
            allList.style.display = "none";
            validateList.style.display = "none";
            instanceList.style.display = "none";
            refusedList.style.display = "block";

        })
    </script>

    <script>
        function ChooseOtherMember() {

            console.log('choose-member')
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/member",

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#change_member .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#change_member').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        function ChooseAllMember() {
            var project_inputs = document.querySelectorAll('.projectInput');
            console.log(project_inputs[0])
            var values_inputs = []
            for (let i = 0; i < project_inputs.length; i++) {
                if (i == (project_inputs.length - 1)) {

                    values_inputs.push(project_inputs[i].value)

                } else {

                    values_inputs.push(project_inputs[i].value + '¤')
                }
            }

            console.log(values_inputs)
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/members/" + values_inputs,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#choose_members .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#choose_members').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        function ChooseAssignedMember(users_project, projectId) {
            var task_inputs = document.querySelectorAll('.input-task');
            console.log(task_inputs[0])
            var values_inputs = []
            for (let i = 0; i < task_inputs.length; i++) {
                if (i == (task_inputs.length - 1)) {

                    values_inputs.push(task_inputs[i].value)

                } else {

                    values_inputs.push(task_inputs[i].value + '¤')
                }
            }
            console.log(values_inputs)


            var usersId = []

            users_project.map((user_project) => {
                usersId.push(user_project.user_id)
            })

            console.log(usersId)
            $.ajax({
                url: "/member-task/" + usersId + "/values/" + values_inputs + "/project/" + projectId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#choose_members .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#choose_members').modal('show');


                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }


        function ChooseListContratUsers(id) {
            console.log('all-members')
            // Envoie une requête AJAX pour récupérer le contenu du formulaire d'édition de l'employé
            $.ajax({
                url: "/users/listContrat",

                method: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#ChooseListContratUsers .modal-body').html(response);

                    $('#ChooseListContratUsers').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }

        function forEditProject(projectId) {
            console.log(projectId)
            $.ajax({
                url: "/edit-project/" + projectId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#edit_project .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#edit_project').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });

        }

        function forArchiverProject(projectId) {
            console.log(projectId)
            $.ajax({
                url: "/archiver-project/" + projectId,

                method: "GET",
                success: function(response) {
                    // Insérez le contenu du formulaire dans la boîte de dialogue modale
                    $('#archiver_project .modal-body').html(response);

                    // Ouvrez la boîte de dialogue modale
                    $('#archiver_project').modal('show');

                },

                error: function(xhr, status, error) {
                    // Gérez les erreurs ici
                }
            });
        }
    </script>



    <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

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

    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fullcalendar.js') }}"></script>


    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

    <script src="{{ asset('js/task.js') }}"></script>

    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/theme-settings.js') }}"></script>
    <script src="{{ asset('js/greedynav.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{--  <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>  --}}


    <script>
        $(document).ready(function() {
            $('#votre-tableau').DataTable();
        });
    </script>

    @yield('js_calendar')

    @yield('input_file')

    @yield('js_employee')

    @yield('for_js_code')

    @yield('js_success_projet_create')

    @yield('contrat_js')

    @yield('reeiveName_js')

    @yield('for_count_bar')

    {{--  Import du package driver  --}}

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/chooseMemberforTask.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>


    {{--  <script src="/node_modules/shepherd.js/dist/js/shepherd.min.js"></script>
   <script src="/node_modules/popper.js"></script>
   <script src="{{asset('js/shepherd.js')}}"></script>  --}}

    {{--  <script>

    import Shepherd from 'shepherd.js';
    const tour = new Shepherd.Tour({
        useModalOverlay: true,
        defaultStepOptions: {
          classes: 'shepherd.css',
          scrollTo: true
        }
      });

      tour.addStep({
        id: 'example-step',
        text: 'This step is attached to the bottom of the <code>.example-css-selector</code> element.',
        attachTo: {
          element: '.dashboard',
          on: 'bottom'
        },
        {{--  classes: 'example-step-extra-class',
        buttons: [
          {
            text: 'Next',
            action: tour.next
          }
        ]
      });

      tour.start();
   </script>  --}}


    {{--
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')  --}}

    @auth
        <script src="{{ asset('js/enable-push.js') }}" defer></script>
    @endauth

</body>

</html>
