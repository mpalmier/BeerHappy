<?php
include_once('DAO/UserDAO.php');
include_once ('DTO/UserDTO.php');
include_once('DAO/AdresseDAO.php');
include_once('DTO/AdresseDTO.php');

class ControllerProfile
{


    public static function includeView()
    {
        include_once("profile.php");
    }

    public static function afficherProfile()
    {
        $users = UserDAO::getUserById($_SESSION['id']);
        foreach ($users as $user){
            echo $user->getPseudo()."<form method=post action='index.php?page=ModifierPseudo&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='pseudo'>"."<input type='submit' name='submit' value='Modifier'></form>";


            echo $user->getEmail()."<form method=post action='index.php?page=ModifierMail&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='email' name='email'>"."<input type='submit' name='submit' value='Modifier'></form>";

            echo "Mot de passe"."<form method=post action='index.php?page=ModifierMdp&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='password' name='password1'>".'<br>'."<input type='password2' name='pseudo'>"."<input type='submit' name='submit' value='Modifier'></form>";


            $adresse = AdresseDAO::getAdresseByIdUser($user->getId());

            if (!empty($adresse)) {
                echo $adresse->getVille() . '<br>';
                echo $adresse->getAdresseLigne() . '<br>';
                echo $adresse->getCodePostal() . '<br>';
                echo $adresse->getTelephone() . '<br>';
            } else {
                echo '<br>'."<form method=post action='index.php?page=newAdresse' enctype='multipart/form-data' >".
                "nom :"."<input type='text' name='nom'>" . '<br>'.
                "prenom :"."<input type='text' name='prenom'>" . '<br>'.
                "Ville :"."<input type='text' name='ville'>" . '<br>'.
                "Adresse :"."<input type='text' name='adresse_ligne'>" . '<br>'.
                "Code Postal :"."<input type='text' name='postal'>" . '<br>'.
                "Téléphone :"."<input type='text' name='tel'>" . '<br>'.
                "<input type='submit' name='submit' value='Modifier'></form>";

        }
    }
}
    public static function redirectUser(){
        header("Location:index.php?page=profile");
    }
}
