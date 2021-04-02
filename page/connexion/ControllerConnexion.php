<?php

class ControllerConnexion {
    public static function includeView(){
        include_once("connexion.php");
    }

    public static function authenticate($iden, $mdp)
    {

        $auth = true;
        $mdp = sha1($mdp);

        $Users = UserDAO::getUserById($iden, $mdp);

        if ($Users != null)
        {
            return $auth;
        }
        else
        {
            $auth = false;
            return $auth;
        }
    }

    public static function redirectUser()
    {
        header('Location: index.php?page=carte');
    }
}