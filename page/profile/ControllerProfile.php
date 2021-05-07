<?php

class ControllerProfile
{
    public static function includeView()
    {
        include_once("profile.php");
    }

    public static function afficherProfile()
    {
        $users = UserDAO::getUser();
        foreach ($users as $user){
            echo $user->getPseudo()."<form method=post action='index.php?page=ModifierPseudo&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='pseudo'>"."<input type='submit' name='submit' value='Modifier'></form>";


            echo $user->getEmail()."<form method=post action='index.php?page=ModifierMail&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='email' name='email'>"."<input type='submit' name='submit' value='Modifier'></form>";

            echo "Mot de passe"."<form method=post action='index.php?page=ModifierMdp&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='password' name='password'>".'<br>'."<input type='password' name='pseudo'>"."<input type='submit' name='submit' value='Modifier'></form>";

            $adresse=AdresseDAO::getAdresseByIdUser($user->getId());
            foreach ($adresse as $ad) {

                if (!empty($ad)) {
                    echo $ad->getVille() . '<br>';
                    echo $ad->getAdresseLigne() . '<br>';
                    echo $ad->getCodePostal() . '<br>';
                    echo $ad->getTelephone() . '<br>';
                } else {
                    echo '<br>'."<form method=post action='index.php?page=newAdresse=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
                    <input type='text' name='pseudo'>" . '<br>' . "<input type='text' name='pseudo'>" . "<input type='submit' name='submit' value='Modifier'></form>";
                }
            }
    }
}
}
