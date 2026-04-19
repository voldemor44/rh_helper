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
                                    <span>Contrats</span>
                                    <a href="javascript:void(0);" class="file-side-close"><i class="fa fa-times"></i></a>
                                </div>
                                <form class="file-search">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        {{--  <input type="text" class="form-control rounded-pill" placeholder="Rechercher">  --}}
                                    </div>
                                </form>
                                <div class="file-pro-list">
                                    <div class="file-scroll">
                                        <ul class="file-menu">
                                            <li>
                                                <a href="{{ route('dossier_personnel_index') }}">Dossiers personnels</a>
                                            </li>
                                            <li class="active">
                                                <a href="{{ route('contrat_index') }}">Contrats</a>
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
                                        <span>Contrats</span>
                                        @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                            <div class="file-options">

                                                <a href="{{ route('typeContrats') }}"
                                                    class="btn btn-outline-primary btn-block"><span class="me-1">Editer un
                                                        contrat</span> <i class="fa fa-pencil"></i></a>


                                            </div>
                                        @else
                                            <div class="file-options">

                                                <a href="{{ route('message.index') }}"
                                                    class="btn btn-outline-primary btn-block"><span class="me-1">Lancer
                                                        une négociation
                                                    </span> </a>


                                            </div>
                                        @endif




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
                                                        @forelse($contrats_recents as $contrat_recent)
                                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                <div class="card card-file">
                                                                    <div class="dropdown-file">
                                                                        <a href class="dropdown-link"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="{{ asset('storage/' . $contrat_recent->path) }}"
                                                                                class="dropdown-item">Ouvrir
                                                                            </a>
                                                                            <a href="#"
                                                                                class="dropdown-item">Partager</a>
                                                                            {{--  <a href="#"
                                                                                class="dropdown-item">Télécharger</a>  --}}
                                                                            @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                                                {{--  <a href="#"
                                                                                    class="dropdown-item">Editer</a>  --}}
                                                                                <form method="POST"
                                                                                    action="{{ route('submit-form-CDD') }}">
                                                                                    @csrf
                                                                                    <input type="hidden" name="path"
                                                                                        id=""
                                                                                        value="storage/{{ $contrat_recent->path }}">
                                                                                    {{--  <a href="{{ route('submit-form-CDD') }}" name="submitType"
                                                                                    onclick="event.preventDefault();
                                                                                                    this.closest('form').submit();"
                                                                                        class="dropdown-item">Générer en
                                                                                        format Word</a>  --}}
                                                                                    {{--  <button type="submit" name="submitType"
                                                                                        value="word">Enregistrer en format
                                                                                        Word</button>  --}}

                                                                                </form>
                                                                                <a href="#"
                                                                                    class="dropdown-item">Supprimer</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-file-thumb">
                                                                        @if ($contrat_recent->format == 'pdf')
                                                                            <i class="fa fa-file-pdf-o"></i>
                                                                        @else
                                                                            <i class="fa fa-file-word-o"></i>
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h6><a href>{{ $contrat_recent->nom }}</a></h6>
                                                                        @php
                                                                            if (Storage::exists($contrat_recent->path)) {
                                                                                $cheminFichier = 'public/' . $contrat_recent->path;
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

                                                                        $created_at = $contrat_recent->created_at;
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
                                                        @forelse($contrats as $contrat)
                                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                                <div class="card card-file">
                                                                    <div class="dropdown-file">
                                                                        <a href class="dropdown-link"
                                                                            data-bs-toggle="dropdown"><i
                                                                                class="fa fa-ellipsis-v"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="{{ asset('storage/' . $contrat->path) }}"
                                                                                class="dropdown-item">Ouvrir
                                                                            </a>
                                                                            <a href="#"
                                                                                class="dropdown-item">Partager</a>
                                                                            {{--  <a href="#"
                                                                            class="dropdown-item">Télécharger</a>  --}}
                                                                            @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                                                                                {{--  <a href="#"
                                                                                class="dropdown-item">Editer</a>  --}}
                                                                                <a href="#"
                                                                                    class="dropdown-item">Générer en format
                                                                                    Word</a>
                                                                                <a href="#"
                                                                                    class="dropdown-item">Supprimer</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-file-thumb">
                                                                        @if ($contrat->format == 'pdf')
                                                                            <i class="fa fa-file-pdf-o"></i>
                                                                        @else
                                                                            <i class="fa fa-file-word-o"></i>
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <h6><a href>{{ $contrat->nom }}</a></h6>
                                                                        @php
                                                                            if (Storage::exists($contrat->path)) {
                                                                                $cheminFichier = 'public/' . $contrat->path;
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

                                                                        $created_at = $contrat->created_at;
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
