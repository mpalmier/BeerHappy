<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="" method="POST">
    <h1>Inscription</h1>
    <label><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required><br><br>

    <label><b>Email</b></label>
    <input type="text" placeholder="Entrer le votre Email" name="email" required><br><br>

    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required><br><br>

    <label><b>Répéter Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="re_password" required><br><br>

    <input type="submit" value='Inscription'>
</form>
</body>
</html>

<?php

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password']))
    {
        ControllerInscription::createAccount();
    }

