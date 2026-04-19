<?php
use App\Models\User;
use App\Models\ProjetUtilisateur;
use App\Models\Projet;
use App\Models\Tache;
?>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="la la-home"></i> <span>Retour</span></a>
                </li>
                <li class="menu-title">Liste des projets </li>
                @if (Auth::user()->roles->contains('nom', 'Administrateur'))
                    @foreach ($myProjects as $project)
                        @php
                            $tasks = Tache::where('projet_id', $project->id)->get();
                        @endphp
                        @if ($project->id == $first->id)
                            <li class="active">
                                <a href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                            </li>
                        @endif
                    @endforeach
                @else
                    @if (Auth::user()->roles->contains('nom', 'Manager'))
                        @foreach ($work_projects as $project)
                            @php
                                $tasks = Tache::where('projet_id', $project->id)->get();
                            @endphp
                            @if ($project->id == $first->id)
                                <li class="active">
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @else
                                <li>
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @endif
                        @endforeach
                        @foreach ($myProjects as $project)
                            @php
                                $tasks = Tache::where('projet_id', $project->id)->get();
                            @endphp
                            @if ($project->id == $first->id)
                                <li class="active">
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @else
                                <li>
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @endif
                        @endforeach
                    @else
                        @foreach ($work_projects as $project)
                            @php
                                $tasks = Tache::where('projet_id', $project->id)->get();
                            @endphp
                            @if ($project->id == $first->id)
                                <li class="active">
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @else
                                <li>
                                    <a
                                        href="{{ route('task-and-chat', ['id' => $project->id]) }}">{{ $project->titre }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>


<div class="two-col-bar" id="two-col-bar">
    <div class="sidebar sidebar-twocol" id="navbar-nav">
        <div class="sidebar-left slimscroll">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-dashboard-tab" title="Dashboard" data-bs-toggle="pill"
                    href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                    <span class="material-icons-outlined">
                        home
                    </span>
                </a>

                <a class="nav-link" id="v-pills-employees-tab" title="Employees" data-bs-toggle="pill"
                    href="#v-pills-employees" role="tab" aria-controls="v-pills-employees" aria-selected="false">
                    <span class="material-icons-outlined">
                        people
                    </span>
                </a>
                <a class="nav-link" id="v-pills-clients-tab" title="Clients" data-bs-toggle="pill"
                    href="#v-pills-clients" role="tab" aria-controls="v-pills-clients" aria-selected="false">
                    <span class="material-icons-outlined">
                        person
                    </span>
                </a>
                <a class="nav-link" id="v-pills-projects-tab" title="Projects" data-bs-toggle="pill"
                    href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">
                    <span class="material-icons-outlined">
                        topic
                    </span>
                </a>
                <a class="nav-link" id="v-pills-leads-tab" title="Leads" data-bs-toggle="pill" href="#v-pills-leads"
                    role="tab" aria-controls="v-pills-leads" aria-selected="false">
                    <span class="material-icons-outlined">
                        leaderboard
                    </span>
                </a>
                <a class="nav-link" id="v-pills-tickets-tab" title="Tickets" data-bs-toggle="pill"
                    href="#v-pills-tickets" role="tab" aria-controls="v-pills-tickets" aria-selected="false">
                    <span class="material-icons-outlined">
                        confirmation_number
                    </span>
                </a>
                <a class="nav-link" id="v-pills-sales-tab" title="Sales" data-bs-toggle="pill" href="#v-pills-sales"
                    role="tab" aria-controls="v-pills-sales" aria-selected="false">
                    <span class="material-icons-outlined">
                        shopping_bag
                    </span>
                </a>


                <a class="nav-link" id="v-pills-settings-tab" title="Settings" data-bs-toggle="pill"
                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <span class="material-icons-outlined">
                        settings
                    </span>
                </a>

            </div>
        </div>
        <div class="sidebar-right">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                    aria-labelledby="v-pills-dashboard-tab">
                    <p>Dashboard</p>
                    <ul>
                        <li><a class href="https://smarthr.dreamguystech.com/laravel/template/public/dashboard">Tableau
                                de bord</a></li>

                    </ul>
                </div>


                <div class="tab-pane fade" id="v-pills-employees" role="tabpanel"
                    aria-labelledby="v-pills-employees-tab">
                    <p>Utilisateurs</p>
                    <ul>
                        <li><a class href="https://smarthr.dreamguystech.com/laravel/template/public/employees">
                                Employés</a></li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/leaves">Départements
                            </a></li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/leaves-employee">Fonctions</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/leave-settings">Statuts</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/attendance">Permissions
                                et congés</a></li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/attendance-employee">Messages</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-clients" role="tabpanel"
                    aria-labelledby="v-pills-clients-tab">
                    <p>Clients</p>
                    <ul>
                        <li class>
                            <a href="https://smarthr.dreamguystech.com/laravel/template/public/clients"><i
                                    class="la la-users"></i> <span>Clients</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-projects" role="tabpanel"
                    aria-labelledby="v-pills-projects-tab">
                    <p>Projects</p>
                    <ul>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/projects">Projects</a>
                        </li>
                        <li><a class="active"
                                href="https://smarthr.dreamguystech.com/laravel/template/public/tasks">Tasks</a>
                        </li>
                        <li><a class href="https://smarthr.dreamguystech.com/laravel/template/public/task-board">Task
                                Board</a></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-leads" role="tabpanel" aria-labelledby="v-pills-leads-tab">
                    <p>Leads</p>
                    <ul>
                        <li class>
                            <a href="https://smarthr.dreamguystech.com/laravel/template/public/leads"><i
                                    class="la la-user-secret"></i> <span>Leads</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-tickets" role="tabpanel"
                    aria-labelledby="v-pills-tickets-tab">
                    <p>Tickets</p>
                    <ul>
                        <li class>
                            <a href="https://smarthr.dreamguystech.com/laravel/template/public/tickets"><i
                                    class="la la-ticket"></i> <span>Tickets</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
                    <p>Sales</p>
                    <ul>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/estimates">Estimates</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/invoices">Invoices</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/payments">Payments</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/expenses">Expenses</a>
                        </li>
                        <li><a class
                                href="https://smarthr.dreamguystech.com/laravel/template/public/provident-fund">Provident
                                Fund</a></li>
                        <li><a class href="https://smarthr.dreamguystech.com/laravel/template/public/taxes"
                                href="taxes">Taxes</a></li>
                    </ul>
                </div>



                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                    aria-labelledby="v-pills-settings-tab">
                    <p>Settings</p>
                    <ul>
                        <li class>
                            <a href="https://smarthr.dreamguystech.com/laravel/template/public/settings"><i
                                    class="la la-cog"></i> <span>Settings</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
