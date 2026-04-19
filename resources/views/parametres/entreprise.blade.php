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

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
    integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('css/material.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div class="main-wrapper">

    @include('partials.header')


       @include('partials.parametreSidebar')


        <div class="page-wrapper">

            @if (Auth::user()->roles->contains('nom', 'Administrateur'))

            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Paramètres de l&apos;entreprise</h3>
                                </div>
                            </div>
                        </div>

                        {{--  <form method="post" action="{{route('modifier-parametre', $infoEntreprise->id ?? '')}}">  --}}
<form method="post" action="{{ isset($infoEntreprise) && $infoEntreprise->id ? route('modifier-parametre', ['id' => $infoEntreprise->id]) : route('modifier-parametre') }}">
                                @csrf
                            {{--  @method('PUT')  --}}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de l&apos;entreprise <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom" value="{{$infoEntreprise->nom ?? ''}}">
                                    </div>
                                </div>
                                {{--  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control " value="Daniel Porter" type="text">
                                    </div>
                                </div>  --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Addresse</label>
                                        <input class="form-control " name="adresse"
                                            value="{{$infoEntreprise->adresse ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Pays</label>
                                        <input class="form-control " name="pays" value="{{$infoEntreprise->pays ?? ''}}" type="text">



                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input class="form-control" name="ville" value="{{$infoEntreprise->ville ?? ''}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>État/Province</label>
                                        <input class="form-control" name="etat" value="{{$infoEntreprise->etat ?? ''}}" type="text">

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Code Postal</label>
                                        <input class="form-control" name="codePostal" value="{{$infoEntreprise->codePostal ?? ''}}" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="{{$infoEntreprise->email ?? ''}}" type="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input class="form-control" name="telephone" value="{{$infoEntreprise->telephone ?? ''}}" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input class="form-control" value="818-635-5579" type="text">
                                    </div>
                                </div>  --}}
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input class="form-control" name="fax" value="{{$infoEntreprise->fax ?? ''}}" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Site web</label>
                                        <input class="form-control" name="siteWeb" value="{{$infoEntreprise->siteWeb ?? ''}}" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @else

            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Paramètres de l&apos;entreprise</h3>
                                </div>
                            </div>
                        </div>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de l&apos;entreprise <span class="text-danger">*</span></label>
                                       <p>{{$infoEntreprise->nom ?? ''}}</p>
                                    </div>
                                </div>
                                {{--  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control " value="Daniel Porter" type="text">
                                    </div>
                                </div>  --}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Addresse</label>
                                        <p>{{$infoEntreprise->adresse ?? ''}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Pays</label>
                                       <p>{{$infoEntreprise->pays?? ''}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <p>{{$infoEntreprise->ville ?? ''}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>État/Province</label>
                                        <p>{{$infoEntreprise->etat ?? ''}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Code Postal</label>
                                     <p>{{$infoEntreprise->codePostal ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                       <p>
                                        {{$infoEntreprise->email ?? ''}}
                                       </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                       <p>
                                        {{$infoEntreprise->telephone ?? ''}}
                                       </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input class="form-control" value="818-635-5579" type="text">
                                    </div>
                                </div>  --}}
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Fax</label>
                                       <p>
                                        {{$infoEntreprise->fax ?? ''}}
                                       </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Site web</label>
                                       <p>
                                        {{$infoEntreprise->siteWeb ?? ''}}
                                       </p>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>  --}}
                        </form>
                    </div>
                </div>
            </div>
            @endif

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

    @include('partials.settings-icon')

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('js/select2.min.js')}}"></script>

    <script src="{{asset('js/layout.js')}}"></script>
    <script src="{{asset('js/theme-settings.js')}}"></script>
    <script src="{{asset('js/greedynav.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>


    @if (session('success'))
    <script>
        $(document).ready(function() {
            $('#Success').modal('show');
            $('.success-message').text('{{ session('success') }}');
        });
    </script>
@endif


</body>

</html>
