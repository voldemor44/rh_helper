<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .employee.active {
            background-color: #333333;
        }

        .employee {
            /* Autres styles */
        }

        .selected {
            background-color: #333333;
        }

    </style>
</head>

<body>
    <div class="input-group m-b-30" >
        <input id="search-input" placeholder="Rechercher un employé" class="form-control search-input" type="text">
        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div>
        <ul class="chat-user-list">
            @foreach ($employees as $employee)
                <li class="employee">
                    <a href="#" data-id="{{ $employee->id }}">
                        <div class="media d-flex contain-member">
                            <span class="avatar flex-shrink-0">
                                @if ($employee->media)
                                    <img alt src="{{ Storage::url($employee->media->path) }}">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 448 512">
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
                            </span>
                            <div class="media-body align-self-center text-nowrap div-name">
                                <div class="user-name">{{ $employee->name }}</div>
                                <span class="designation">{{ $employee->fonction->nom }}</span>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="submit-section">
        <button id="submit-member" class="btn btn-primary submit-btn"  data-type-contrat="{{ $typeContrat }}">Enregistrer</button>
    </div>

</body>

{{--  <script>

    var employees = document.querySelectorAll('.employee');

    employees.forEach(function(employee) {
        employee.addEventListener('click', function() {
            employees.forEach(function(emp) {
                emp.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
    var submitButton = document.getElementById('submit-member');

    submitButton.addEventListener('click', function() {
        var selectedUser = document.querySelector('.employee.active');

        if (selectedUser) {
            var userId = selectedUser.querySelector('a').getAttribute('data-id');

            // Créez un formulaire dynamique
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('contratCDD') }}";

            // Ajoutez un champ d'entrée pour l'ID de l'utilisateur
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'userId';
            input.value = userId;

            // Ajoutez le champ d'entrée au formulaire
            form.appendChild(input);

            // Ajoutez le formulaire à la page et soumettez-le
            document.body.appendChild(form);
            form.submit();
        }
    });
</script>  --}}

<script>
    var searchInput = document.getElementById('search-input');
    var employees = document.querySelectorAll('.employee');
    var selectedUser = null;

    // Fonction de filtrage des employés
    function filterEmployees() {
        var searchTerm = searchInput.value.toLowerCase();

        employees.forEach(function(employee) {
            var name = employee.querySelector('.user-name').textContent.toLowerCase();

            if (name.includes(searchTerm)) {
                employee.style.display = 'block';
            } else {
                employee.style.display = 'none';
            }
        });
    }

    // Gestionnaire d'événements pour la recherche
    searchInput.addEventListener('input', filterEmployees);

    // Gestionnaire d'événements pour la sélection d'un employé
    employees.forEach(function(employee) {
        employee.addEventListener('click', function() {
            if (selectedUser) {
                selectedUser.classList.remove('selected');
            }

            this.classList.add('selected');
            selectedUser = this;
        });
    });

    var submitButton = document.getElementById('submit-member');

    submitButton.addEventListener('click', function() {
        if (selectedUser) {
            var selectedUserId = selectedUser.querySelector('a').getAttribute('data-id');
            var contratType = this.getAttribute('data-type-contrat');

            // Rediriger vers une autre page avec l'ID de l'utilisateur sélectionné
            if (contratType === 'cdd') {
                // Rediriger vers la route pour le contrat CDD avec l'ID de l'utilisateur sélectionné
                window.location.href = '/contratCDD?id=' + selectedUserId;
            } else if (contratType === 'cdi') {
                // Rediriger vers la route pour le contrat CDI avec l'ID de l'utilisateur sélectionné
                window.location.href = '/contratCDI?id=' + selectedUserId;
            }else if (contratType === 'cp') {
                // Rediriger vers la route pour le contrat CDI avec l'ID de l'utilisateur sélectionné
                window.location.href = '/contratPrestataire?id=' + selectedUserId;
            }

            else {
                // Si aucun type de contrat spécifié, afficher un message d'erreur ou effectuer une autre action
                console.error('Type de contrat non spécifié.');
            }

        }
    });
</script>




</html>
