<?php
include_once('DAO/UserDAO.php');
include_once('DTO/UserDTO.php');
class ControllerConnexion {
    public static function includeView(){
        include_once("connexion.php");
    }

    public static function authenticate($identifiant, $mdp)
    {

        $auth = true;
        $mdp = sha1($mdp);

        $Users = UserDAO::getUserConnexion($identifiant, $mdp);

        if ($Users != null)
        {
            $_SESSION['id']=$Users->getId();
            $_SESSION['panier'] = array();
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