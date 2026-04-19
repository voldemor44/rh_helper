<?php

use App\Models\User;
use App\Models\ProjetUtilisateur;
use App\Models\Tache;

?>

@extends('layout.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-box">
                        <div class="welcome-img">
                            <img alt src="assets/img/profiles/avatar-02.jpg">
                        </div>
                        <div class="welcome-det">
                            <h3>Bienvenu
                                @if (Auth::user()->roles->contains('nom', 'Manager'))
                                Manager, 
                                @endif
                                {{ Auth::user()->name }}
                            </h3>

                            <p>{{ \Carbon\Carbon::now()->isoFormat('dddd DD MMMM YYYY') }} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <section class="dash-section">
                        <h1 class="dash-sec-title"> Tâches urgentes</h1>
                        @php
                            $tasks = Tache::where('user_id', Auth::user()->id);
                            $nbr_tasks = $tasks->count();
                            if ($nbr_tasks >= 3) {
                                $mytasks = Tache::where('user_id', Auth::user()->id)
                                    ->take(3)
                                    ->get();
                            } else {
                                $mytasks = Tache::where('user_id', Auth::user()->id)->get();
                            }
                            
                        @endphp
                        <div class="dash-sec-content">
                            @forelse ($mytasks as $mytask)
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa-regular fa-hourglass"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>{{ $mytask->titre }}</p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="assets/img/profiles/avatar-09.jpg" alt>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa-regular fa-hourglass"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>Aucune tâche en cours</p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="assets/img/profiles/avatar-09.jpg" alt>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforelse

                        </div>
                    </section>
                    {{--  <section class="dash-section">
                        <h1 class="dash-sec-title">Notifications</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>2 people will be away tomorrow</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"><img src="assets/img/profiles/avatar-04.jpg"
                                                    alt></a>
                                            <a href="#" class="e-avatar"><img src="assets/img/profiles/avatar-08.jpg"
                                                    alt></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>  --}}
                    <section class="dash-section">
                        <h1 class="dash-sec-title">Evenements du jour</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>{{ $evenements->titre ?? 'Aucun évènement' }}</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"></a>
                                            <a href="#" class="e-avatar"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="dash-sidebar">
                        <section>
                            <h5 class="dash-title">Projets ({{ $mypro_users_count }} En cours)</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4> {{ $taches_total ?? 0 }} </h4>
                                            <p>Tâches au total</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4> {{ $taches_instances ?? 0 }} </h4>
                                            <p>Tâches en instance</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Permissions</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4> {{ $permissions_enInstance ?? 0 }} </h4>
                                            <p>En instance</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4> {{ $permissions_validees ?? 0 }} </h4>
                                            <p>Validées</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4> {{ $permissions_rejetees ?? 0 }} </h4>
                                            <p>Rejetées</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a class="btn btn-primary" href="{{ route('permission-page') }}">Voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{--  <section>
                            <h5 class="dash-title">Rapports</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>5.0 Hours</h4>
                                            <p>Approved</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>15 Hours</h4>
                                            <p>Remaining</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a class="btn btn-primary" href="#">Afficher</a>
                                    </div>
                                </div>
                            </div>
                        </section>  --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
