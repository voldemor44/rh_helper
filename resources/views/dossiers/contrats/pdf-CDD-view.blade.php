<!DOCTYPE html>
<html>

<head>
    <title>ContratCDD</title>
    <style>
        .texte {
            text-align: center;

        }

        h5 .texte {
            display: flex;
            width: 50%;
            height: 2%;
        }

        p {
            font-size: 12px;
        }

        .display {
            display: flex;

        }
    </style>
</head>

<body>



    <h5 class="texte">CONTRAT DE TRAVAIL A DUREE DETERMINEE</h5>
    <h6>
        ENTRE L’EMPLOYEUR
    </h6>
    <p>Nom: {{ $formData['nomEmployeur'] ?? '' }}</p>
    <p>Adresse: {{ $formData['adresseEmployeur'] ?? '' }}</p>
    <!-- Affichez les autres champs du formulaire ici -->
    {{--  Section 2  --}}
    <h6>
        ET L’EMPLOYE
    </h6>
    <div class="display">
        <span>
            <p> Nom & Prénoms : {{ $formData['nom_prenom_Employe'] ?? '' }}</p>
        </span>
        <span style="margin-left: 50px;">
            <p> Sexe : {{ $formData['sexeEmploye'] ?? '' }}</p>
        </span>
    </div>
    <div class="display">
        <span>
            <p>Né le : {{ $formData['dateNaissanceEmploye'] ?? '' }}</p>
        </span>
        <span style="margin-left: 70px;">
            <p>Département: {{ $formData['departementEmploye'] ?? '' }}</p>
        </span>
    </div>
    <p>Nationalité : {{ $formData['nationaliteEmploye'] ?? '' }}</p>
    <p>Qualification : {{ $formData['qualificationEmploye'] ?? '' }}</p>
    <div class="display">
        <span>
            <p>
                Situation matrimoniale : {{ $formData['situationMatrimonialeEmploye'] ?? '' }}
            </p>
        </span>
        <span>
            <p style="margin-left: 40px;">
                Nombre d’enfant : {{ $formData['nbEnfantsEmploye'] ?? '' }}
            </p>
        </span>
    </div>

    <div class="display">
        <span>
            <p>
                Adresse actuelle : {{ $formData['adresseEmploye'] ?? '' }}
            </p>
        </span>
        <span style="margin-left: 30px;">
            <p>
                E-Mail : {{ $formData['emailEmploye'] ?? '' }}
            </p>
        </span>
    </div>
    <p>Téléphones: {{ $formData['phoneEmploye'] ?? '' }} </p>

    {{--  Section 3  --}} <br>
    <p>Il a été convenu ce qui suit :</p>
    <p>
        1 - TEXTE RÉGISSANT LE PRÉSENT CONTRAT</p>
    <p>
        La {{ $formData['nomStructure'] ?? '' }} engage
    </p>
    @php
    $alphabet = range('a', 'z');
    $usedAlphabets = [];
@endphp

@if (isset($formData['defaultTexts']))
    @php
        $defaultTexts = $formData['defaultTexts'];
        sort($defaultTexts);
    @endphp

    @foreach ($defaultTexts as $index => $defaultText)
        @php
            $currentAlphabet = $alphabet[$index % 26];
            $usedAlphabets[] = $currentAlphabet;
        @endphp

        <li>
            <p>{{ $currentAlphabet }} {{ $defaultText }}</p>
        </li>
    @endforeach
@endif

@if (isset($formData['textFields']))
    @php
        $textFields = $formData['textFields'];
        sort($textFields);
    @endphp

    @foreach ($textFields as $index => $textField)
        @php
            $currentAlphabet = '';
            $counter = 0;
            while (in_array($alphabet[$counter], $usedAlphabets)) {
                $counter++;
            }
            if ($counter < 26) {
                $currentAlphabet = $alphabet[$counter];
                $usedAlphabets[] = $currentAlphabet;
            }
        @endphp

        <li>
            <p>{{ $currentAlphabet }} {{ $textField }}</p>
        </li>
    @endforeach
@endif

    <h5>
        2 - ENGAGEMENT ET DURÉE DU CONTRAT
    </h5>
    <p>
        La {{ $formData['nomStructure'] ?? '' }} engage Monsieur {{ $formData['nom_prenom_Employe'] ?? '' }}
        en qualité de {{ $formData['poste_occupe'] ?? '' }}
        à compter du {{ $formData['periode_contrat'] ?? '' }}.

        D&apos;accord parties, le présent contrat est conclu pour une durée de {{ $formData['nbMois'] ?? '' }}
        (……..)
        mois assortie
        d’une évaluation/appréciation concluante à l’issue d’une période d’essai de trois (03) mois.
    </p>
    {{--  section4  --}}
    <h5>
        3 - EMPLOI ET ATTRIBUTIONS
    </h5>
    <p>

        Employé en qualité de {{ $formData['poste'] ?? '' }}, il sera chargé, sous l&apos;autorité
        du {{ $formData['superieur_hierachique'] ?? '' }}, des fonctions
        décrites dans la fiche de poste jointe au présent contrat, qui en fait partie intégrante et qui
        est signée par
        l’employé et l’employeur.
    </p>
    {{--  Section 5  --}}
    <h5>
        4 – HORAIRES DE TRAVAIL
    </h5>
    <p>

        Les horaires de travail sont fixés du lundi au vendredi comme suit : </p>
    <ul>
        <p> • Matinée : de {{ $formData['matinee'] ?? '' }}.
        </p>
    </ul>
    <ul>
        <p>• Soirée : de {{ $formData['soir'] ?? '' }}..</p>
    </ul>
    <p> Les horaires du travail sont fixés par la Direction de la {{ $formData['nomStructure'] ?? '' }}
        qui peut les
        modifier en fonction des nécessités de service.
    </p>

    {{--  Section 6  --}}
    <h5> 5 – RÉMUNÉRATION</h3>
        <p> La rémunération brute mensuelle de Monsieur {{ $formData['nom_prenom_Employe'] ?? '' }} est de
            (MONTANT EN LETTRE ET EN CHIFFRE) CFA
            décomposée comme suit :</p>

        <p>
            • Salaire de base : {{ $formData['salaire_base'] ?? '' }}. FCFA
        </p>

        <p>
            • Primes liées à la fonction : {{ $formData['prime'] ?? '' }}. FCFA.
        </p>

        <p>
            A ce salaire brut, seront appliquées les retenues légales et réglementaires
            (retenues fiscale et sociale) en vigueur
            au Bénin et à la charge de l’employé (ITS et part ouvrière CNSS).
            Le paiement du salaire se fera par virement bancaire dans un compte ouvert par l’employé,
            en son nom, à la banque de
            son choix.
        </p>

        {{--  Section 7  --}}

        <h5>
            6 - DURÉE DES CONGÉS
        </h5>
        <p>
            Monsieur {{ $formData['nom_prenom_Employe'] ?? '' }} aura droit à des congés payés à la
            charge de l’employeur à raison de
            deux (02)
            jours par mois, soit un total de vingt-quatre (24) jours ouvrables par année de service
            accompli.
        </p>

        {{--  Section 8  --}}
        <h5> 7 - ACCIDENT DU TRAVAIL ET MALADIES PROFESSIONNELLES</h5>
        <p>
            En cas d&apos;accident survenu dans le travail ou des maladies professionnelles,
            les droits et obligations de chacune
            des parties seront réglés conformément aux textes en vigueur en la matière.
        </p>
        {{--  Section 9  --}}
        <h5>8 – PERIODE D’ESSAI</h5>
        <p>
            Les parties conviennent d&apos;une période d&apos;essai de trois (03) mois, à compter du
            {{ $formData['periode_essai'] ?? '' }}. Pendant cette
            période, les deux parties ont la faculté réciproque de rompre le présent contrat sans préavis,
            ni indemnités
            sauf celles compensatrices des congés payés au prorata du temps de service accompli.

        </p>
        {{--  Section 10  --}}
        <h5>
            9 - SÉCURITÉ SOCIALE
        </h5>
        <p>

            Monsieur {{ $formData['nom_prenom_Employe'] ?? '' }} sera affilié à la Caisse Nationale de Sécurité Sociale
            et bénéficiera des
            prestations de celle-ci.
        </p>
        {{--  Section 11  --}}
        <h5>
            10 – CLAUSE DE NON CONCURRENCE ET DE CONFIDENTIALITE
        </h5>
        <p>

            Il est interdit à Monsieur {{ $formData['nom_prenom_Employe'] ?? '' }}
            d’exercer, même en dehors des heures de travail,
            une activité
            à caractère professionnel susceptible de concurrencer l’employeur dans ses activités
            professionnelles ou de
            nuire à l’exécution des services convenus.

            Il lui est également interdit de divulguer tant à l’intérieur qu’à l’extérieur de la
            {{ $formData['nomStructure'] ?? '' }},
            pendant la durée du contrat et à l’issue de celui-ci, ou d’utiliser à des fins personnelles
            ou pour le
            compte de tiers, les renseignements ou informations se rapportant à l’activité de la
            {{ $formData['nomStructure'] ?? '' }}
            et dont il aurait eu connaissance à l’occasion de ses fonctions, ou des techniques acquises
            au service de
            l’employeur.

        </p>
        {{--  Section 12 --}}
        <h5>
            11 – CONDITIONS DE RESILIATION
        </h5>
        <p>

            Le présent contrat étant un contrat de travail à durée déterminée, sa résiliation, en dehors des cas de
            faute lourde commise par l’une ou l’autre des parties et sous réserve de l’appréciation du juge compétent,
            ne peut intervenir que dans les cas suivants :
        <ul>
            <p>
                - Echéance du terme fixé ;
            </p>
            <p>
                - Accord explicite des parties ;
            </p>
            <p>
                - Force majeure
            </p>
        </ul>
        </p>
        {{-- Section 13   --}}
        <h5>
            12 - LES DIFFÉRENDS
        </h5>
        <p>

            Les différends qui pourraient s&apos;élever à l&apos;occasion de l&apos;exécution du
            présent contrat seront réglés
            conformément aux dispositions des textes législatifs ou réglementaires en vigueur et,
            à défaut, aux usages
            locaux réglant les rapports des employeurs et salariés auxquels les parties déclarent
            formellement se
            soumettre.
            L&apos;employé soussigné affirme qu&apos;il est libre de tout engagement antérieur et
            qu&apos;
            il donne son libre
            consentement au présent contrat de travail qui prend effet à compter du
            {{ $formData['date_debut'] ?? '' }}.
        </p>
        {{--  Section 14  --}}
        <p style="margin-left: 150px;"> Fait en 03 (Trois) exemplaires originaux,</p>

        <p style="margin-left: 150px;">Fait à {{ $formData['lieu'] ?? '' }}, le {{ $formData['date'] ?? '' }}</p>

        <div class="display">
            <span>
                <p> L&apos;EMPLOYÉ, </p>
                <p>(Mention manuscrite « Lu et approuvé », <br>
                    Suivie de la signature de l’agent)</p>
            </span>
            <span style="margin-left: 50px;">
                <p> L&apos;EMPLOYEUR,</p>
            </span>
        </div> <br>
        <div class="display">
            <span>
                <p> Prénoms et Nom </p>

            </span>
            <span style="margin-left: 270px;">
                <p> Prénoms et Nom </p>
            </span>
        </div>

        <div class="display">
            <p style="margin-left: 100px;">
                VISE S/N°__________/MTFP/DDTFP du _____________
            </p>
        </div>

        <p style="margin-left: 120px; max-width: 250px;">
            LE DIRECTEUR DEPARTEMENTAL
            DU TRAVAIL ET DE LA FONCTION
            PUBLIQUE DU …………………………..
        </p> <br>
        <br>
        <br>
        <p style="text-align: center;">
            Prénoms et Nom
        </p>
</body>

</html>
