@extends('layout.app')

@section('content')
    <div class="page-wrapper">

        <div class="content">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Notifications</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Notifications</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="activity">
                        <div class="activity-box">
                            <ul class="activity-list">
                                <li>
                                    {{--  <div class="activity-user">
                                            <a href="profile.html" title="Lesley Grauer" data-bs-toggle="tooltip"
                                                class="avatar">
                                                <img src="assets/img/profiles/avatar-01.jpg" alt>
                                            </a>
                                        </div>  --}}
                                    @foreach (auth()->user()->unreadnotifications as $notification)
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name">{{ $notification->data['contenu'] }}</a>

                                                <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
