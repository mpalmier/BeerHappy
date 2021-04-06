<?php


class ControllerInscription
{
    public static function includeView()
    {
        include_once("inscription.php");
    }

    public static function createAccount($identifiant, $mdp)
    {
        $inscription = $dbb->prepare('INSERT INTO log( mail, user, password, photo_profil) VALUES (?,?,sha1(?),?)');
        $inscription->execute(array($_POST['Email'],$_POST['Username'],$_POST['Password'],$pp));
    }

    public static function redirectUser()
    {
        header('Location: index.php?page=connexion');
    }

    public static function redirectUserFalse()
    {
        include_once('inscriptionFalse.php');
    }

}