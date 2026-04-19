{{--  <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}



<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>S&apos;inscrire</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.1/dist/css/line-awesome.min.css">  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  --}}



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #737491;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #766df4;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>


</head>

<body>


    <main class="page-wrapper">

        <div class="container-fluid py-5 py-md-7 ">
            <div class="row align-items-center mt-5 ">
                <div class="col-md-5 col-lg-4 mb-5 mb-md-0">
                    <img src="{{ asset('assets/img/inscriptionEntreprise.png') }}" alt="inscription">
                </div>
                <div class="col-md-6 ">
                    <h2 class="h3">Inscription réussie.</h2>
                    <h4> Veuillez enregistrer votre entreprise </h4>
                    <form action="{{ route('inscriptionEntreprise') }}" method="POST"
                        class="row needs-validation mt-4" novalidate>
                        @csrf
                        <input class="form-control" type="hidden" value="{{$type_entreprise_id}}" name="type_entreprise" id="reg-type">

                        <input class="form-control" type="hidden" value="{{$id}}" name="id_user" id="reg-user">

                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-fn">Nom </label>
                            <input class="form-control" type="text" name="name" required id="reg-fn">
                            <div class="invalid-feedback">Veuillez saisir votre prénom!</div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-email">Adresse Email</label>
                            <input class="form-control" type="email" name="email" required id="reg-email">
                            <div class="invalid-feedback">S&apos;il vous plaît, mettez une adresse email valide!</div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label" for="selected-country">Choisir un pays</label>
                            <select class="form-control" name="selected_country" id="selected-country">
                                @foreach ($countries as $code => $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-phone">Téléphone</label>
                            <div class="input-group">
                                <select class="form-control" name="country_code" id="country-code">
                                    @foreach ($countryIndicatives as $countryCode => $indicative)
                                        <option value="{{ $countryCode }}">{{ $indicative }}
                                            ({{ $countryCode }})
                                        </option>
                                    @endforeach
                                </select>
                                <input class="form-control bg-image-0" name="telephone" type="text"
                                    id="reg-phone">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-devise">Devise</label>
                            <select class="form-control" name="devise" id="reg-devise">
                                <option value="">Sélectionnez une devise</option>
                                @foreach ($uniqueCurrencies as $key => $val)
                                    <option value="{{ $key }}">
                                        {{ $val }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-5 pt-2">
                            <button class="btn btn-primary d-block w-100" type="submit" id="submit-btn">
                                <span id="btn-loader" class="d-none">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                                <span id="btn-text">S&apos;inscrire</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();

                var submitButton = $('#submit-btn');
                var btnLoader = $('#btn-loader');
                var btnText = $('#btn-text');

                // Désactiver le bouton et afficher le chargement
                submitButton.prop('disabled', true);
                btnText.addClass('d-none');
                btnLoader.removeClass('d-none');

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        // Réactiver le bouton et masquer le chargement
                        submitButton.prop('disabled', false);
                        btnText.removeClass('d-none');
                        btnLoader.addClass('d-none');

                        if (response.type_entreprise_name !== null) {
                            // Redirection vers le tableau de bord avec les paramètres
                            // Ajout du spinner pendant la redirection
                            btnLoader.removeClass(
                            'd-none'); // Afficher le spinner sur le bouton
                            btnText.addClass('d-none'); // Masquer le texte du bouton

                            setTimeout(function() {
                                window.location.href = '/paidOffer?entreprise_id=' +
                                    response.entreprise_id + '&type_entreprise=' +
                                    response.type_entreprise + '&user=' + response.user;
                            }, 2000);
                        } else {
                            // Redirection vers la page de paiement avec le spinner
                            btnLoader.removeClass(
                            'd-none'); // Afficher le spinner sur le bouton
                            btnText.addClass('d-none'); // Masquer le texte du bouton

                            setTimeout(function() {
                                window.location.href = '/freeOffer?entreprise_id=' +
                                    response.entreprise_id + '&type_entreprise=' +
                                    response.type_entreprise + '&user=' + response.user;
                            }, 2000);
                        }
                    },
                    error: function(error) {
                        console.error("Une erreur s'est produite :", error);
                        // Gérer les erreurs si nécessaire
                    },
                    complete: function() {
                        // Code à exécuter après la requête AJAX (indépendamment du succès ou de l'erreur)
                    }
                });
            });
        });
    </script>



</body>

</html>
