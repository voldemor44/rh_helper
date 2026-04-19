<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RH-Helper</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


    <header id="header">
        <div style="margin-top: 2%" class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.html">RH-Helper<span>.</span></a></h1>

                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul class="my-menu">
                    <li class="active"><a href="#"> <span>Accueil</span> </a></li>
                    <li><a href="#fonctionnalite"> <span>Fonctionnalités</span> </a></li>
                    <li><a href="#contact"> <span>Offres</span> </a></li>
                    <li class="get-started"><a href="{{ route('login') }}"> <span>Se connecter</span> </a></li>
                    <li class="get-started"><a href="#pricing"> <span>S&apos;inscrire</span> </a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div style="margin-bottom: 4%" class="container">
            <div class="row d-flex align-items-center">
                <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
                    <h1>Digitalisez la gestion de votre entreprise</h1>
                    <h2>Un outil de gestion des ressources humaines et des contrats mis à votre disposition</h2>
                    <a href="#about" class="btn-get-started scrollto">Démarrer</a>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="assets/img/n1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">



        {{--
          <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-1.png" class="img-fluid" alt=""
                                data-aos="flip-right">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-2.png" class="img-fluid" alt=""
                                data-aos="flip-right" data-aos-delay="100">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-3.png" class="img-fluid" alt=""
                                data-aos="flip-right" data-aos-delay="200">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-4.png" class="img-fluid" alt=""
                                data-aos="flip-right" data-aos-delay="300">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-5.png" class="img-fluid" alt=""
                                data-aos="flip-right" data-aos-delay="400">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="assets/img/clients/client-6.png" class="img-fluid" alt=""
                                data-aos="flip-right" data-aos-delay="500">
                        </div>
                    </div>

                </div>

            </div>
        </section>
          --}}


        <!-- End Clients Section -->


        {{--  <section id="about" class="about section-bg">
            <div class="container">

                <div class="row">
                    <div
                        class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    </div>
                    <div class="col-xl-7 pl-0 pl-lg-5 pr-lg-1 d-flex align-items-stretch">
                        <div class="content d-flex flex-column justify-content-center">
                            <h3 data-aos="fade-in" data-aos-delay="100">Notre objectif</h3>
                            <div style="width: 90%">
                                <p style="text-justify:auto " data-aos="fade-in">

                                    RH-Helper vise à répondre aux besoins pressants des entreprises en leurs fournissant
                                    une plateforme centralisée, automatisée et conviviale pour la gestion de leurs
                                    ressources humaines et de leurs contrats.
                                    Ses avantages sont les suivants :
                                </p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="bx bx-receipt"></i>
                                    <h4><a href="#">Centralisation des Données </a></h4>
                                    <p>RH-Helper permet de centraliser toutes les informations liées aux ressources
                                        humaines et aux contrats au sein d&apos;une seule plateforme. Cela facilite
                                        l&apos;accès rapide aux données et réduit les erreurs liées à la dispersion des
                                        informations.</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4><a href="#">Automatisation des Processus </a></h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-images"></i>
                                    <h4><a href="#">Sécurité des Données</a></h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bx bx-shield"></i>
                                    <h4><a href="#">Accessibilité à Distance</a></h4>
                                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>  --}}

        <!-- End About Section -->

        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-in">Nos objectifs</h2>
                    <p data-aos="fade-in">
                        RH-Helper vise à répondre aux besoins pressants des entreprises en leurs fournissant
                        une plateforme centralisée, automatisée et conviviale pour la gestion de leurs
                        ressources humaines et de leurs contrats.
                        Ses avantages sont les suivants :</p>
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-right">
                        <div class="card">
                            <div style="margin-bottom: 5%" class="card-img">
                                <img src="{{ asset('assets/img/centraldata.png') }}" alt="..." width="100%">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Centralisation de données </a></h5>
                                <p class="card-text">RH-Helper permet de centraliser toutes les informations liées aux
                                    ressources
                                    humaines et aux contrats au sein d&apos;une seule plateforme. Cela facilite
                                    l&apos;accès rapide aux données et réduit les erreurs liées à la dispersion des
                                    informations.</p>
                                {{--  <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read
                                        More</a></div>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-left">
                        <div class="card">
                            <div style="margin-top: 5%" class="card-img">
                                <img src="{{ asset('assets/img/auto1-removebg-preview.png') }}" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Automatisation des Processus</a></h5>
                                <p class="card-text">La plateforme automatise de nombreux processus RH tels que la
                                    gestion des congés, la génération de contrats, la gestion des horaires, etc. Cela
                                    permet de gagner du temps et de réduire les tâches manuelles.</p>
                                {{--  <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read
                                        More</a></div>  --}}
                            </div>
                        </div>

                    </div>
                    <div style="margin-top: -10%" class="col-md-6 d-flex align-items-stretch" data-aos="fade-right">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/security1.png" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Sécurité des Données</a></h5>
                                <p class="card-text">RH-Helper garantit la protection et la confidentialité des
                                    informations
                                    sensibles, renforçant ainsi la confiance des utilisateurs et minimisant les risques
                                    de
                                    fuite ou de perte de données.</p>
                                {{--  <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read
                                        More</a></div>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-left">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/access1.png" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">Accessibilité à Distance </a></h5>
                                <p class="card-text">Les utilisateurs auront la liberté de se connecter et d&apos;utiliser
                                    l&apos;application de n&apos;importe où, favorisant ainsi la flexibilité du travail, la
                                    collaboration à distance et la prise de décisions en temps réel.</p>
                                {{--  <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read
                                        More</a></div>  --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="features" class="features section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-in" id="fonctionnalite">Fonctionnalités</h2>
                </div>

                <div class="row content">
                    <div class="col-md-5" data-aos="fade-right">
                        <img src="{{ asset('assets/img/im1-removebg-preview.png') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div style="margin-top: 9%" class="col-md-7 pt-4" data-aos="fade-left">
                        <h3>Recrutement et gestion des contrats</h3>
                        <ul>
                            <li><i class="icofont-check"></i> Poster des avis de recrutement
                            </li>
                            <li><i class="icofont-check"></i> Accéder à la liste triée des candidatures</li>
                            <li><i class="icofont-check"></i> Editer, stocker et suivre un contrat</li>
                        </ul>
                    </div>
                </div>

                <div style="margin-top: -1%" class="row content">
                    <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{ asset('assets/img/employee.png') }}" class="img-fluid" alt="">
                    </div>
                    <div style="margin-top: 4%" class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                        <h3>Gestion des employés</h3>
                        <p style="text-align: justify">
                            Cette fonctionnalité centralise et organise les données personnelles, les compétences et les
                            performances de
                            chaque employé, offrant une vue d&apos;ensemble simplifiée pour une gestion plus efficace.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div style="margin-top: 2%" class="col-md-5" data-aos="fade-right">
                        <img src="assets/img/im02-removebg-preview.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5" data-aos="fade-left">
                        <h3>Gestion des projets</h3>
                        <p style="text-align: justify">Cette fonctionnalité assure une organisation transparente et
                            coordonnée, optimisant ainsi la planification et la réalisation de chaque projet. Elle offre
                            les modules suivants :</p>
                        <ul>
                            <li><i class="icofont-check"></i> Création de projet
                            </li>
                            <li><i class="icofont-check"></i> Suivi de la progression
                            </li>
                            <li><i class="icofont-check"></i> Gestion des tâches
                            </li>
                            <li><i class="icofont-check"></i> Discussion en membre de l&apos;équipe
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row content">
                    <div style="margin-top: -2%" class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{ asset('assets/img/im2-removebg-preview.png') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div style="margin-top: 4%" class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                        <h3>Organisation des événements</h3>
                        <p style="text-align: justify">
                            La fonctionnalité vise à simplifie la planification,
                            la coordination et la gestion des événements internes et externes, en facilitant la
                            création, la communication et le suivi des détails clés de chaque événement.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <section id="pricing" class="pricing section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-in">Offres d&apos;abonnement</h2>
                    <p data-aos="fade-in">Nos formules d&apos;abonnement sont annuelles et sont principalement adressées aux
                        startup, aux petites et moyennes entreprises (PME) et au grandes entreprises (GE) </p>
                </div>

                <div class="row no-gutters">

                    <div style="margin-top: 5%" class="col-lg-3 box" data-aos="zoom-in">
                        <h3>Gratuit</h3>
                        <h4>{{$tarifGratuite->prix}}<span>15 jours</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifGratuite->limitemployes}} employés. </li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifGratuite->limitprojets}} projets. </li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifGratuite->limitdossiers}} dossiers. </li>
                            <li class="na"><i class="bx bx-x"></i> <span>Organisation des </span><span
                                    style="margin-left: 12%">évènements</span>
                            </li>
                            <li class="na"><i class="bx bx-x"></i> <span>Notifications et alertes</span>
                            </li>
                        </ul>
                        <a href="{{route('register', ['tarif' => $tarifGratuite->id])}}" class="get-started-btn">Démarrer</a>
                    </div>

                    <div class="col-lg-3 box" data-aos="zoom-in">
                        <h3>Startup</h3>
                        <h4>{{$tarifStartup->prix}} <span style="font-size: 33%; color: #fdc134;"> 9.842 FCFA</span><span>par an</span>
                        </h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifStartup->limitemployes}} employés.</li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifStartup->limitprojets}} projets.</li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifStartup->limitdossiers}} dossiers.</li>
                            <li class="na"><i class="bx bx-x"></i> <span>Organisation des </span><span
                                    style="margin-left: 12%">évènements</span>
                            </li>
                            <li><i class="bx bx-check"></i> <span>Notifications et alertes</span>
                            </li>
                        </ul>
                        <a href="{{route('register', ['tarif' => $tarifStartup->id])}}" class="get-started-btn">Démarrer</a>
                    </div>


                    <div style="margin-bottom: 1%" class="col-lg-3 box featured" data-aos="zoom-in">
                        <span style="justify-content: center" class="featured-badge">Standard</span>
                        <h3>PME</h3>
                        <h4>{{$tarifPME->prix}}<span style="font-size: 33%; color: #fdc134;"> 16.404 FCFA</span><span>par an</span>
                        </h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifPME->limitemployes}} employés</li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifPME->limitprojets}} projets</li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifPME->limitdossiers}} dossiers</li>
                            <li><i class="bx bx-check"></i> <span>Organisation des </span><span
                                    style="margin-left: 12%">évènements</span>
                            </li>
                            <li><i class="bx bx-check"></i> <span>Notifications et alertes</span>
                            </li>
                        </ul>
                        <a href="{{route('register', ['tarif'=> $tarifPME->id])}}" class="get-started-btn">Démarrer</a>
                    </div>

                    <div class="col-lg-3 box" data-aos="zoom-in">
                        <h3>GE</h3>
                        <h4>{{$tarifGE->prix}}<span style="font-size: 33%; color: #fdc134;"> 29.527 FCFA</span><span>par an</span>
                        </h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifGE->limitemployes}} employés.</li>
                            <li><i class="bx bx-check"></i> Projets illimités</li>
                            <li><i class="bx bx-check"></i> Jusqu&apos;à {{$tarifGE->limitdossiers}} dossiers</li>
                            <li><i class="bx bx-check"></i> <span>Organisation des </span><span
                                    style="margin-left: 12%">évènements</span>
                            </li>
                            <li><i class="bx bx-check"></i> <span>Notifications et alertes</span>
                            </li>
                        </ul>
                        <a href="{{route('register', ['tarif' => $tarifGE->id])}}" class="get-started-btn">Démarrer</a>
                    </div>

                </div>

            </div>
        </section>


    </main>

    <footer id="footer">

        <div class="footer-top">

            <div class="container" data-aos="fade-up">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h4>Contacts</h4>
                        <span style="margin-top: -1%">
                            email : rhelperapp@gmail.com
                        </span>
                        <br>
                        <span>
                            tel : +229 54 72 68 83
                        </span>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
