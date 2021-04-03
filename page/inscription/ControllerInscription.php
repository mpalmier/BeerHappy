<?php


class ControllerInscription
{
    public static function includeView()
    {
        include_once("inscription.php");
    }

    public static function createAccount($identifiant, $mdp)
    {

        $auth = true;
        $mdp = sha1($mdp);

        $Users = UserDAO::getUserById($identifiant, $mdp);

        if ($Users != null) {
            return $auth;
        } else {
            $auth = false;
            return $auth;
        }
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