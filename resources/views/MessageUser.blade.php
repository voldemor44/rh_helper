<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Nouveau Utilisateur</title>
</head>

<body>
    <h1>Compte utilisateur créé</h1>
    <h5> {{ $data['employe'] }}, votre mot de passe utilisateur est : {{ $data['password'] }}</h5>
    <span><a href="http://localhost:8000/">Cliquez ici pour vous connecter</a></span>
</body>

</html>
