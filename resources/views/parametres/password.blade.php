<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.1/dist/css/line-awesome.min.css">  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="main-wrapper">

        @include('partials.header')


        @include('partials.parametreSidebar')


        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-6 offset-md-3">

                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Changer votre mot de passe</h3>
                                </div>
                            </div>
                        </div>

                        <form id="passwordForm" action="{{ route('modifier_motDePasse') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Ancien mot de passe </label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                            </div>
                            <div class="form-group">
                                <label>Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label>Confirmer mot de passe </label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Modifier</button>

                                {{--  <button type="submit"> Modifier </button>  --}}
                            </div>
                        </form>
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
                    <!-- Ajout de l'élément pour afficher le message d'erreur -->
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

    @include('partials.settings-icon')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/theme-settings.js') }}"></script>
    <script src="{{ asset('js/greedynav.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>



    @if (session('success'))
        <script>
            $(document).ready(function() {
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


    <!-- JavaScript pour la validation -->
    {{--  <script>
    document.getElementById('passwordForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var newPassword = document.getElementById('new_password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (newPassword !== confirmPassword) {
            var errorMessage = "Les deux nouveaux mots de passe ne correspondent pas.";

            $('.error-message').text(errorMessage);
            $('#errorMessage').modal('show');

           // return;
        }

        // Validation réussie, envoyer la requête au serveur
        this.submit();
    });
</script>  --}}

    <script>
        $(document).ready(function() {
            // Votre code pour afficher le message d'erreur s'il existe
            @if (session('error'))
                $('#errorMessage').modal('show');
                $('.error-message').text('{{ session('error') }}');
            @endif
        });

        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                var errorMessage = "Les deux nouveaux mots de passe ne correspondent pas.";

                $('.error-message').text(errorMessage);
                $('#errorMessage').modal('show');
            } else {
                // Validation réussie, envoyer la requête au serveur
                this.submit();
            }
        });
    </script>


</body>

</html>
