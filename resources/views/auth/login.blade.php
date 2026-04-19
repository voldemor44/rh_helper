{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="robots" content="noindex, nofollow">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>Se connecter</title>

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
                    <img src="{{ asset('assets/img/login.png') }}" alt="inscription">
                </div>
                <div class="col-md-6 ">
                    <h2 class="h3">Connexion</h2>
                    <form  method="POST" action="{{ route('login') }}" class="row needs-validation mt-4" novalidate>
                        @csrf



                        <div class="col-sm-6 mb-3">
                            {{--  <label class="form-label" for="reg-fn">Nom & Prénoms</label>
                            <input class="form-control" type="text" name="name" required id="reg-name">
                            <div class="invalid-feedback">Veuillez saisir votre prénom!</div>  --}}
                            <label for="email" :value="__('Email')">Adresse Email</label>
                            <input class="form-control" id="email" class="block mt-1 w-full" type="email"
                                name="email" :value="old('email')" required autofocus autocomplete="username"
                                placeholder="admin@dreamguys.in">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label for="password" :value="__('Password')">Mot de passe</label>
                            <input class="form-control" type="password" value="password" id="password"
                            name="password" required autocomplete="current-password">
                        {{--  <span class="fa fa-eye-slash" id="toggle-password"></span>  --}}
                        </div>
                        {{--  <div class="col-sm-6 mb-3">
                            <label class="form-label" for="reg-phone">Téléphone</label>
                            <input class="form-control bg-image-0" name="telephone" type="text" id="reg-phone">
                        </div>  --}}

                        <div class="row">

                            <div class="col">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span
                                        class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
                                </label>
                            </div>

                            <div class="col-auto">
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        Mot de passe oublié?
                                    </a>
                                @endif
                            </div>

                        </div>

                        <div class="col-sm-5 pt-2">
                            {{--  <button class="btn btn-primary d-block w-100" type="submit">S&apos;inscrire</button>  --}}

                            <button class="btn btn-primary d-block w-100" type="submit" id="submit-btn">
                                <span id="btn-loader" class="d-none">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                                <span id="btn-text">Se connecter</span>
                            </button>


                        </div>
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




