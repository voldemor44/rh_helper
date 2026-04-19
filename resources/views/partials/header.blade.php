<div class="header">

    <div class="header-left">
        {{--  <a href="admin-dashboard.html" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" width="40" height="40" alt>
        </a>
        <a href="admin-dashboard.html" class="logo2">
            <img src="{{ asset('assets/img/logo2.png') }}" width="40" height="40" alt>
        </a>  --}}
    </div>

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <div class="page-title-box">
        <h3> {{ config('app.name') }} </h3>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <ul class="nav user-menu">

        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="search.html">
                    <input class="form-control" type="text" placeholder="Rechercher">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>

{{--
        <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                <img src="{{ asset('assets/img/flags/us.png') }}" alt height="20"> <span>Français</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/us.png') }}" alt height="16"> Français
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/fr.png') }}" alt height="16"> Anglais
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{ asset('assets/img/flags/es.png') }}" alt height="16"> Espanol
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="assets/img/flags/de.png" alt height="16"> German
                </a>
            </div>
        </li>  --}}


        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">

                    {{ auth()->user()->unreadnotifications->count() }}
                </span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Tout effacer </a>
                </div>

                <div class="noti-content">
                    @forelse (auth()->user()->unreadnotifications as $notification)
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="{{ route('notifications.index') }}">
                                    <div class="media d-flex">
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span
                                                    class="noti-title">{{ $notification->data['contenu'] }} </span>
                                                {{--  added
                                                new task <span class="noti-title">jdjdjjdjdjdj</span>  --}}

                                            </p>

                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                            </p>
                                            {{--  <p> {{ $notification->data['contenu'] }} <span><a
                                                        href="{{ route('markasread', $notification->id) }}"> Mark as
                                                        read </a> </span> </p>  --}}

                                        </div>

                                        <a href="{{ route('markasread', $notification->id) }}">
                                            <span class="flex-shrink-0">
                                                {{-- <img alt src="{{ asset('assets/img/profiles/avatar-02.jpg') }}"> --}}
                                                <p style="margin: 0;">Marquer</p>
                                                <p style="margin: 0; line-height: -15px;">comme lu</p>
                                            </span>

                                        </a>


                                    </div>
                                </a>
                            </li>

                        </ul>
                    @empty
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="{{ route('notifications.index') }}">
                                    <div class="media d-flex">
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title"> Aucune notification
                                                </span>
                                                {{--  added
                                                new task <span class="noti-title">jdjdjjdjdjdj</span>  --}}

                                            </p>



                                        </div>




                                    </div>
                                </a>
                            </li>

                        </ul>
                    @endforelse
                </div>

                <div class="topnav-dropdown-footer">
                    <a href="{{ route('notifications.index') }}">Afficher toutes les notifications</a>
                </div>
            </div>
        </li>


        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Messages</span>
                    <a href="javascript:void(0)" class="clear-noti"> Tout effacer </a>
                </div>
                {{--  <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt src="{{ asset('assets/img/profiles/avatar-09.jpg') }}">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>  --}}
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">Voir plus</a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <div class="user-img my-profileImg">
                    @if (Auth::user()->media)
                        <img src="{{ Storage::url(Auth::user()->media->path) }}" alt>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 0 448 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #9a9996
                                }
                            </style>
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                        </svg>
                    @endif

                    <span class="status online"></span>
                </div>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                <a class="dropdown-item" href="settings.html">Paramètres</a>
                <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        style="text-decoration: none; color:black;">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
            <a class="dropdown-item" href="settings.html">Paramètres</a>
            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                    class="dropdown-item">
                    {{ __('Déconnexion') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>

</div>
