@extends('layout.app')

@section('content')

<div class="main-wrapper">


    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="file-wrap">
                        <div class="file-sidebar">
                            <div class="file-header justify-content-center">
                                <span>Rapports</span>
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
                                        <li >
                                            <a href="{{route('dossier_personnel_index')}}">Dossiers personnels</a>
                                        </li>
                                        <li >
                                            <a href="{{route('contrat_index')}}">Contrats</a>
                                        </li>
                                        <li class="active">
                                            <a href="{{route('rapport_index')}}">Rapports</a>
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
                                    <span>Rapports</span>
                                    <div class="file-options">
                                        <a href="{{route('push')}}" class="btn btn-outline-primary btn-block"><span class="me-1">Editer un rapport</span> <i
                                            class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                                <div class="file-content">
                                    <form class="file-search">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fa fa-search"></i>
                                            </div>
                                            <input type="text" class="form-control rounded-pill"
                                                placeholder="Rechercher">
                                        </div>
                                    </form>

                                    <div class="file-body">
                                        <div class="file-scroll">
                                            <div class="file-content-inner">
                                                <h4>Fichers récents</h4>
                                                <div class="row row-sm">
                                                    <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="card card-file">
                                                            <div class="dropdown-file">
                                                                <a href class="dropdown-link"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">Voir détails</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Partager</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Télécharger</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Renommer</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Supprimer</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-file-thumb">
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            </div>
                                                            <div class="card-body">
                                                                <h6><a href>Sample.pdf</a></h6>
                                                                <span>10.45kb</span>
                                                            </div>
                                                            <div class="card-footer">
                                                                <span class="d-none d-sm-inline">Dernière modification:
                                                                </span>il y a 1 minute
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <h4>Fichers</h4>
                                                <div class="row row-sm">
                                                    <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                        <div class="card card-file">
                                                            <div class="dropdown-file">
                                                                <a href class="dropdown-link"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">Voir détails
                                                                        </a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Partager</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Télécharger</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Renommer</a>
                                                                    <a href="#"
                                                                        class="dropdown-item">Supprimer</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-file-thumb">
                                                                <i class="fa fa-file-word-o"></i>
                                                            </div>
                                                            <div class="card-body">
                                                                <h6><a href>Updates.docx</a></h6>
                                                                <span>12mb</span>
                                                            </div>
                                                            <div class="card-footer">9 Aug 1:17 PM</div>
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

    </div>

</div>



@endsection
