@extends('layout.app')

@section('content')

    @php

        function convertirTailleFichier($tailleFichierEnOctets, $precision = 2)
        {
            $unites = ['o', 'Ko', 'Mo', 'Go', 'To', 'Po', 'Eo', 'Zo', 'Yo'];
            $index = 0;

            while ($tailleFichierEnOctets >= 1024 && $index < count($unites) - 1) {
                $tailleFichierEnOctets /= 1024;
                $index++;
            }

            return round($tailleFichierEnOctets, $precision) . ' ' . $unites[$index];
        }
    @endphp

    <div class="main-wrapper">


        <div class="page-wrapper">

            <div class="content container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="file-wrap">
                            <div class="file-sidebar">
                                <div class="file-header justify-content-center">
                                    <span>Dossiers</span>
                                    <a href="javascript:void(0);" class="file-side-close"><i class="fa fa-times"></i></a>
                                </div>
                                <form class="file-search">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control rounded-pill" placeholder="Rechercher">
                                    </div>
                                </form>
                                <div class="file-pro-list">
                                    <div class="file-scroll">
                                        <ul class="file-menu">
                                            <li class="active">
                                                <a href="{{ route('dossier_personnel_index') }}">Dossiers personnels</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('contrat_index') }}">Contrat</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('rapport_index') }}">Rapports</a>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="file-cont-wrap col-9">
                                <div class="file-cont-inner">
                                    <div class="file-cont-header">
                                        <div class="file-options">
                                            <a href="javascript:void(0)" id="file_sidebar_toggle"
                                                class="file-sidebar-toggle">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                        <span>Dossiers personnels</span>

                                        <div class="file-options">
                                            @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                <span class="btn-file">

                                                    {{--  <input id="file" class="upload"><i
                                                    class="fa fa-upload"></i>  --}}

                                                    <a href="#" class="" data-bs-toggle="modal"
                                                        data-bs-target="#file"> <i class="fa fa-upload"></i></a>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="file-content">
                                        <form class="file-search">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                                <input type="text" class="form-control rounded-pill "
                                                    placeholder="Rechercher">
                                            </div>
                                        </form>
                                        <div class="file-body">
                                            <div class="file-scroll">
                                                <div class="file-content-inner">
                                                    <h4>Fichers récents</h4>
                                                    <div class="row row-sm">
                                                        @forelse($recent_files as $recent_file)
                                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                <div class="card card-file">
                                                                    <div class="dropdown-file">
                                                                        <a href class="dropdown-link"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="{{ asset('storage/' . $recent_file->path) }}"
                                                                                class="dropdown-item">Ouvrir
                                                                            </a>
                                                                            <a href="#"
                                                                                class="dropdown-item">Partager</a>
                                                                            {{--  <a href="#"
                                                                                class="dropdown-item">Télécharger</a>  --}}
                                                                            @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                                                {{--  <a href="#"
                                                                                    class="dropdown-item">Editer</a>  --}}
                                                                                {{--  <form method="POST"
                                                                                    action="{{ route('submit-form-CDD') }}">
                                                                                    @csrf
                                                                                    <input type="hidden" name="path"
                                                                                        id=""
                                                                                        value="storage/{{ $recent_file->path }}">
                                                                                    {{--  <a href="{{ route('submit-form-CDD') }}" name="submitType"
                                                                                    onclick="event.preventDefault();
                                                                                                    this.closest('form').submit();"
                                                                                        class="dropdown-item">Générer en
                                                                                        format Word</a>  --}}
                                                                                    {{--  <button type="submit" name="submitType"
                                                                                        value="word">Enregistrer en format
                                                                                        Word</button>

                                                                                </form>  --}}
                                                                                <a href="{{route('delete_dossierPersonnel',$recent_file->path )  }}"
                                                                                    class="dropdown-item">Supprimer</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-file-thumb">
                                                                        @if ($recent_file->format == 'image/jpeg')
                                                                        <i class="fa fa-file-image-o"></i>
                                                                        @elseif($recent_file->format == 'application/pdf')
                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                        @elseif($recent_file->format == 'text/plain')
                                                                        <i class="fa fa-file-text-o"></i>
                                                                        @else
                                                                            <i class="fa fa-file-word-o"></i>
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h6><a href>{{ $recent_file->nom }}</a></h6>
                                                                        @php
                                                                        $cheminFichier = $recent_file->path;

                                                                        if (!Str::startsWith($cheminFichier, 'public/')) {
                                                                            $cheminFichier = 'public/' . $cheminFichier;
                                                                        }

                                                                        if (Storage::exists($cheminFichier)) {
                                                                            $tailleFichierEnOctets = Storage::size($cheminFichier);
                                                                            $tailleFichier = convertirTailleFichier($tailleFichierEnOctets);
                                                                        } else {
                                                                            $tailleFichierEnOctets = 0;
                                                                            $tailleFichier = convertirTailleFichier($tailleFichierEnOctets);
                                                                        }
                                                                    @endphp


                                                                        <span> {{ $tailleFichier }} </span>
                                                                    </div>
                                                                    @php

                                                                        $created_at = $recent_file->created_at;
                                                                        $date = new DateTime($created_at);
                                                                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                                        $format = '%e %B %Y %H:%M:%S';
                                                                        $dateFormatee = strftime($format, $date->getTimestamp());

                                                                    @endphp

                                                                    <div class="card-footer">
                                                                        {{ $dateFormatee }}</div>
                                                                </div>
                                                            </div>
                                                        @empty

                                                            <p>Aucun fichier récent</p>
                                                        @endforelse

                                                    </div>
                                                    <h4>Fichers</h4>
                                                    <div class="row row-sm">
                                                        @forelse($files as $file)
                                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                <div class="card card-file">
                                                                    <div class="dropdown-file">
                                                                        <a href class="dropdown-link"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="{{ asset('storage/' . $file->path) }}"
                                                                                class="dropdown-item">Ouvrir
                                                                            </a>
                                                                            <a href="#"
                                                                                class="dropdown-item">Partager</a>
                                                                            {{--  <a href="#"
                                                                            class="dropdown-item">Télécharger</a>  --}}
                                                                            @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                                                {{--  <a href="#"
                                                                                class="dropdown-item">Editer</a>  --}}
                                                                                {{--  <a href="#"
                                                                                    class="dropdown-item">Générer en format
                                                                                    Word</a>  --}}
                                                                                <a href="#"
                                                                                    class="dropdown-item">Supprimer</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-file-thumb">
                                                                        @if ($file->format == 'pdf')
                                                                            <i class="fa fa-file-pdf-o"></i>
                                                                        @else
                                                                            <i class="fa fa-file-word-o"></i>
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h6><a href>{{ $file->nom }}</a></h6>
                                                                        @php
                                                                        $cheminFichier = $recent_file->path;

                                                                        if (!Str::startsWith($cheminFichier, 'public/')) {
                                                                            $cheminFichier = 'public/' . $cheminFichier;
                                                                        }

                                                                        if (Storage::exists($cheminFichier)) {
                                                                            $tailleFichierEnOctets = Storage::size($cheminFichier);
                                                                            $tailleFichier = convertirTailleFichier($tailleFichierEnOctets);
                                                                        } else {
                                                                            $tailleFichierEnOctets = 0;
                                                                            $tailleFichier = convertirTailleFichier($tailleFichierEnOctets);
                                                                        }
                                                                    @endphp

                                                                        <span> {{ $tailleFichier }} </span>
                                                                    </div>
                                                                    @php

                                                                        $created_at = $file->created_at;
                                                                        $date = new DateTime($created_at);
                                                                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                                        $format = '%e %B %Y %H:%M:%S';
                                                                        $dateFormatee = strftime($format, $date->getTimestamp());

                                                                    @endphp

                                                                    <div class="card-footer">
                                                                        {{ $dateFormatee }}</div>
                                                                </div>
                                                            </div>
                                                        @empty

                                                            <p>Aucun fichier </p>
                                                        @endforelse



                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="file" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Uploader un fichier</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('fileUpload') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @if ($message = Session::get('success'))
                                                            <div class="alert alert-success">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @endif
                                                        @if (count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <img src="{{ asset('assets/img/dossier_personnel.jpg') }}"
                                                                    alt="">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nom</label>
                                                                <input class="form-control" type="text" name="nom"
                                                                    id="nom" value="">
                                                                <span class="text-danger" id="nomError"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                {{--  <label>Choisir un fichier </label>  --}}
                                                                <input class="form-control" type="file" name="file"
                                                                    id="file" value="">
                                                                <span class="text-danger" id="fileError"></span>
                                                            </div>

                                                            <div class="submit-section">
                                                                <button class="btn btn-primary submit-btn mb-5"
                                                                    type="submit"
                                                                    id="save_evenement">Enregistrer</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
