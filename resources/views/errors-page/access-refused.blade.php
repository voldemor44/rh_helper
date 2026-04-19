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
    <title>Dashboard - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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


</head>

<body>

    <div class="main-wrapper">

        <body class="error-page">

            <div class="main-wrapper">
                <div class="error-box">
                    <h1>403</h1>
                    <h3><i class="fa fa-warning"></i> Oops! Accès non autorisé</h3>
                    <p>Vous ne faites parti d&apos;aucun projets</p>
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-custom">Retour</a>
                </div>
            </div>


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

        </body>

</html>
