<?php

class ControllerConnexion {
    public static function includeView(){
        include_once("connexion.php");
    }

    public static function authenticate($identifiant, $mdp)
    {

        $auth = true;
        $mdp = sha1($mdp);

        $Users = UserDAO::getUserById($identifiant, $mdp);

        if ($Users != null)
        {

            session_name("prestachopebdd4" );

            $_SESSION['id']=$Users->getId();
            $_SESSION['panier'] = array();
            $_SESSION['panier']['qtnProduit'] = array();
            $_SESSION['qte']['qtnProduit'] = array();
            $_SESSION['qte'] = array();
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

    public static function redirectUserFalse()
    {
        include_once('connexionFalse.php');
    }

}