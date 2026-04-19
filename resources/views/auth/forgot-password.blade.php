{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{--

<!DOCTYPE html>
 <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="description" content="Smarthr - Bootstrap Admin Template">
            <meta name="keywords"
                content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
            <meta name="author" content="Dreamguys - Bootstrap Admin Template">
            <meta name="robots" content="noindex, nofollow">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>Mot de passe Oublié</title>

            <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

            <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

            <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

            <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/material.css') }}">

            <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

            <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

            <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </head>

    <body class="account-page">

        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">

                    <div class="account-logo">
                        <a href="admin-dashboard.html"><img src="{{ asset('assets/img/logo2.png') }}"
                                alt="Dreamguy's Technologies"></a>
                    </div>

                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Mot de passe oublié?</h3>
                            <p class="account-subtitle">Entrez votre e-mail pour obtenir un lien de réinitialisation du mot
                                de passe</p>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <!-- Email Address -->



                                <div class="form-group">
                                    <label for="email" :value="__('Email')">Email Address</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        :value="old('email')" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Réinitialiser le mot de
                                        passe</button>
                                </div>
                                <div class="account-footer">
                                    <p>Rappelez-vous votre mot de passe ? <a href="{{ route('login') }}">Se connecter</a>
                                    </p>
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('js/layout.js') }}"></script>
        <script src="{{ asset('js/theme-settings.js') }}"></script>
        <script src="{{ asset('js/greedynav.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>  --}}

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="robots" content="noindex, nofollow">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>Mot de passe oublié</title>

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
                    <img src="{{ asset('assets/img/forgot_password.png') }}" alt="inscription">
                </div>
                <div class="col-md-6 ">
                    <h3 class="h3">Mot de passe oublié?</h3>
                    <p class="account-subtitle">Entrez votre e-mail pour obtenir un lien de réinitialisation du mot
                        de passe</p>

                    <form  method="POST" action="{{ route('login') }}" class="row needs-validation mt-4" novalidate>
                        @csrf
                        <div class="col-sm-12 mb-2">

                            <label for="email" :value="__('Email')">Email Address</label>
                            <input class="form-control" id="email" type="email" name="email"
                                :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>




                        <div class="col-sm-6 pt-2">
                            {{--  <button class="btn btn-primary d-block w-100" type="submit">S&apos;inscrire</button>  --}}

                            <button class="btn btn-primary d-block w-100" type="submit" id="submit-btn">
                                <span id="btn-loader" class="d-none">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                                <span id="btn-text">Réinitialiser le mot de
                                    passe</span>
                            </button>
                        </div>
                            <div class="row mt-3">
                                <p>Rappelez-vous votre mot de passe ? <a href="{{ route('login') }}" class="ms-2">Se connecter</a>
                                </p>
                            </div>


                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


   </body>

</html>

