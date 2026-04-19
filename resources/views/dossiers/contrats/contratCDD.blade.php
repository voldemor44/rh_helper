@extends('layout.app')

@section('contrat_css')
    <style>
        .container-fluid {
            display: flex;
        }

        .form-container {
            flex: 1.5;
            /* Augmentez la valeur de flex pour augmenter la taille de la partie du formulaire */
            margin: 0 150px 100px 150px;
        }

        .pdf-container {
            flex: 1.5;
            padding: 5px;
        }

        .pdf-frame {
            border: 1px solid #000;
        }

        .default-text {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .default-text button {
            margin-left: 10px;
        }

        .dynamic-field {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .dynamic-field input {
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="mt-2"></div>
                <div class="form-container ">
                    <form id="myForm"  method="POST" action="{{ route('submit-form-CDD') }}">
                        @csrf
                        <div id="section1">
                            <h3>Information de l&apos;employeur</h3>
                            <label for="nomEmployeur">Nom</label> <br>
                            <input class="form-control" type="text" name="nomEmployeur" id="nomEmployeur" placeholder=""
                                oninput="updateForm()"><br>
                            <label for="adresseEmployeur">Adresse</label> <br>
                            <input class="form-control" type="text" name="adresseEmployeur" id="adresseEmployeur"
                                placeholder="" oninput="updateForm()"><br>
                        </div> <br>
                        {{--  <button type="button" onclick="addFields('section1')">Ajouter un champ</button>  --}}
                        <br>
                        <div id="section2">
                            <h3>Information de l&apos;employé</h3>
                            <label for="nom_prenom_Employe">Nom & Prénoms </label> <br>
                            <input class="form-control" type="text" name="nom_prenom_Employe" id="nom_prenom_Employe"
                                value="{{ $userData->name ?? '' }}" oninput="updateForm()"><br>
                            <label for="sexeEmploye">Sexe</label> <br>
                            <input class="form-control" type="text" name="sexeEmploye" id="sexeEmploye"
                                value="{{ $userData->infospersonnelle->sexe ?? '' }}" oninput="updateForm()"><br>
                            @if ($userData && $userData->date_naissance)
                                @php
                                    $dateString = $userData->date_naissance;
                                    $date = \Carbon\Carbon::parse($dateString);
                                    $dateStringOnly = $date->format('d F Y');
                                @endphp
                            @endif
                            <label for="dateNaissanceEmploye">Date de naissance</label> <br>
                            <input class="form-control" type="text" name="dateNaissanceEmploye" id="dateNaissanceEmploye"
                                value="{{ $dateStringOnly ?? '' }}" oninput="updateForm()"><br>
                            <label for="departementEmploye">Département</label> <br>
                            <input class="form-control" type="text" name="departementEmploye" id="departementEmploye"
                                value="{{ $userData->departement->nom ?? '' }}" oninput="updateForm()"><br>
                            <label for="nationaliteEmploye">Nationalité</label> <br>
                            <input class="form-control" type="text" name="nationaliteEmploye" id="nationaliteEmploye"
                                value="{{ $userData->infospersonnelle->nationalite ?? '' }}" oninput="updateForm()"><br>

                            <label for="qualificationEmploye">Qualification</label> <br>
                            <input class="form-control" type="text" name="qualificationEmploye" id="qualificationEmploye"
                                value="{{ $userData->fonction->nom ?? '' }}" oninput="updateForm()"><br>

                            <label for="situationMatrimonialeEmploye">Situation matrimoniale </label> <br>
                            <input class="form-control" type="text" name="situationMatrimonialeEmploye"
                                id="situationMatrimonialeEmploye" value="{{ $userData->fonction->etat_civil ?? '' }}"
                                oninput="updateForm()"><br>

                            <label for="nbEnfantsEmploye"> Nombre d&apos;enfants </label> <br>
                            <input class="form-control" type="text" name="nbEnfantsEmploye" id="nbEnfantsEmploye"
                                value="" oninput="updateForm()"><br>

                            <label for="adresseEmploye"> Adresse actuelle </label> <br>
                            <input class="form-control" type="text" name="adresseEmploye" id="adresseEmploye"
                                value="{{ $userData->infospersonnelle->adresse ?? '' }}" oninput="updateForm()"><br>

                            <label for="emailEmploye"> Email </label> <br>
                            <input class="form-control" type="text" name="emailEmploye" id="emailEmploye"
                                value="{{ $userData->email ?? '' }}" oninput="updateForm()" readonly><br>

                            <label for="phoneEmploye"> Téléphones </label> <br>
                            <input class="form-control" type="text" name="phoneEmploye" id="phoneEmploye"
                                value="{{ $userData->telephone ?? '' }}" oninput="updateForm()"><br>

                        </div>

                        <div id="section3">
                            <h3>Textes</h3>
                            <label for="nomStructure">Nom de la structure</label> <br>
                            <input class="form-control" type="text" name="nomStructure" id="nomStructure"
                                placeholder="" value="{{ $entreprise->nom }}" oninput="updateForm()">

                            <div id="inputContainer" class="mt-3">
                                <!-- Default text elements -->
                                <h4>Articles</h6>
                                    <div class="default-text">
                                        <input class="form-control default-input" type="text" name="defaultTexts[]"
                                            value="Conformément à la loi n° 98-004 du 27 Janvier 1998 portant Code du Travail de la République du Bénin;">
                                        <button type="button" onclick="removeText(this)">Supprimer</button>
                                    </div> <br>
                                    <div class="default-text">
                                        <input class="form-control default-input" type="text" name="defaultTexts[]"
                                            value="Conformément à la loi n°2017-05 du 29 Août 2017 fixant les conditions et la procédure d’embauche, de placement de la main-d’œuvre et de résiliation du contrat de travail en République du Bénin ;">
                                        <button type="button" onclick="removeText(this)">Supprimer</button>
                                    </div> <br>

                                    <div class="default-text">
                                        <input class="form-control default-input" type="text" name="defaultTexts[]"
                                            value="Conformément à la loi n°2017-05 du 29 Août 2017 fixant les conditions et la procédure d’embauche, de placement de la main-d’œuvre et de résiliation du contrat de travail en République du Bénin ;">
                                        <button type="button" onclick="removeText(this)">Supprimer</button>
                                    </div>



                            </div> <br>

                            <button type="button" onclick="addInput()">Ajouter un champ</button>
                        </div> <br>

                        <div class="section4">
                            <h3>ENGAGEMENT ET DURÉE DU CONTRAT</h3>

                            <label for="poste_occupe">Poste à occupe </label> <br>
                            <input class="form-control" type="text" name="poste_occupe" id="poste_occupe"
                                value="" oninput="updateForm()"><br>
                            <label for="periode_contrat">Période du contrat </label> <br>
                            <input class="form-control" type="text" name="periode_contrat" id="periode_contrat"
                                value="" oninput="updateForm()"><br>
                            <label for="nbMois">Nombre de mois</label> <br>
                            <input class="form-control" type="number" name="nbMois" id="nbMois"
                                value="{{ $userData->infospersonnelle->sexe ?? '' }}" oninput="updateForm()"><br> <br>

                        </div>
                        <div class="section5">
                            <h3>
                                EMPLOI ET ATTRIBUTIONS

                            </h3>


                            <label for="poste">Poste</label> <br>
                            <input class="form-control" type="text" name="poste" id="poste" value=""
                                oninput="updateForm()"><br>
                            <label for="superieur_hierachique">Supérieur Hiérachique </label> <br>
                            <input class="form-control" type="text" name="superieur_hierachique"
                                id="superieur_hierachique" value="" oninput="updateForm()"><br>


                        </div>

                        <div class="section6">
                            <h3>
                                HORAIRES DE TRAVAIL </h3>

                            <label for="matinee">Matinée</label> <br>
                            <input class="form-control" type="text" name="matinee" id="matinee" value=""
                                oninput="updateForm()"><br>
                            <label for="soir">Soir </label> <br>
                            <input class="form-control" type="text" name="soir" id="soir" value=""
                                oninput="updateForm()"><br>


                        </div>
                        <div class="section7">
                            <h3>
                                RÉMUNÉRATION
                            </h3>
                            <label for="salaire_base">Salaire de base</label> <br>
                            <input class="form-control" type="text" name="salaire_base" id="salaire_base"
                                value="" oninput="updateForm()"><br>
                            <label for="prime">Primes liées à la fonction</label> <br>
                            <input class="form-control" type="text" name="prime" id="prime" value=""
                                oninput="updateForm()"><br>

                        </div>
                        <div class="section8">
                            <h3>
                                PERIODE D’ESSAI
                            </h3>
                            <label for="periode_essai"> Période d&apos;essai </label> <br>
                            <input class="form-control" type="text" name="periode_essai" id="periode_essai"
                                value="" oninput="updateForm()"><br>

                        </div>
                        <div class="section9">
                            <h3>
                                LES DIFFÉRENDS
                            </h3>
                            <label for="date_debut">Date de début </label> <br>
                            <input class="form-control" type="date" name="date_debut" id="date_debut" value=""
                                oninput="updateForm()"><br>

                        </div>
                        <div class="sectio10">
                            <h3>
                                LIEU ET DATE
                            </h3>
                            <label for="lieu">Lieu </label> <br>
                            <input class="form-control" type="text" name="lieu" id="lieu" value=""
                                oninput="updateForm()"><br>
                            <label for="date">Date </label> <br>
                            <input class="form-control" type="text" name="date" id="date" value=""
                                oninput="updateForm()"><br>
                        </div>
                        {{--  <button type="button" onclick="addFields('section2')">Ajouter un champ</button>  --}}
                        <!-- Ajoutez d&apos;autres sections de formulaire ici -->
                        <br><br>
                        <button type="submit" name="submitType" value="pdf">Enregistrer en format PDF</button>
                        {{--  <button type="submit" name="submitType" value="word">Enregistrer en format Word</button>  --}}


                    </form>
                </div>
                <div class="pdf-container">
                    <iframe id="pdfViewer" class="pdf-frame" src="{{ route('pdf-CDD-view') }}" width="100%"
                        height="70%"></iframe>

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M7.871 1.5a.5.5 0 0 1 .456.276l6.068 12.134a.5.5 0 0 1-.456.724H1.307a.5.5 0 0 1-.456-.724L7.416 1.776a.5.5 0 0 1 .456-.276zm-.006 2.186a.566.566 0 0 0-.549.416L6.304 9.416a.534.534 0 0 0 .016.204.57.57 0 0 0 .157.232.493.493 0 0 0 .228.104h2.433a.493.493 0 0 0 .228-.104.57.57 0 0 0 .157-.232.534.534 0 0 0 .016-.204l-.012-.052-.998-5.31a.566.566 0 0 0-.549-.416z" />
                            <path
                                d="M7.5 12a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-1 0v-.5a.5.5 0 0 1 .5-.5zm0-2a.5.5 0 0 1 .5.5V9a.5.5 0 0 1-1 0v-.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        Ceci est un aperçu du contrat.Vous pouvez le modifier une fois à la fin, calmez-vous et finissez
                        le travail.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('contrat_js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function updateForm() {
            var formData = new FormData(document.getElementById("myForm"));

            axios.post('{{ route('update-form') }}', formData)
                .then(function(response) {
                    var pdfViewer = document.getElementById("pdfViewer");
                    pdfViewer.src = "{{ route('pdf-CDD-view') }}";
                })
                .catch(function(error) {
                    console.log(error);
                });
        }



        var fieldCount = 0; // Compteur pour les champs ajoutés dynamiquement

        function addInput() {
            fieldCount++; // Incrémenter le nombre de champs

            // Créer le champ de saisie
            var newField = document.createElement("input");
            newField.type = "text";
            newField.name = "textFields[]";
            newField.placeholder = "Champ supplémentaire";
            newField.className = "form-control";
            newField.oninput = updateForm;


            // Créer le bouton de suppression
            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.textContent = "Supprimer";
            deleteButton.onclick = function() {
                removeInput(newField);
            };

            // Créez le conteneur pour le champ de saisie et le bouton de suppression
            var inputContainer = document.createElement("div");
            inputContainer.className = "dynamic-field";
            inputContainer.appendChild(newField);
            inputContainer.appendChild(deleteButton);
            if (fieldCount === 1) {
                inputContainer.style.marginTop = "30px";
            } else {
                inputContainer.style.marginTop = "30px";
            }


            var container = document.getElementById("inputContainer");
            container.appendChild(inputContainer);
        }

        function removeInput(field) {

            var container = field.parentNode;
            container.parentNode.removeChild(container);
        }

        function removeText(button) {

            var defaultText = button.parentNode;
            defaultText.parentNode.removeChild(defaultText);
        }


        {{--  var pdfSubmitButton = document.getElementById("pdfSubmit");
        var wordSubmitButton = document.getElementById("wordSubmit");  --}}




    </script>
@endsection
