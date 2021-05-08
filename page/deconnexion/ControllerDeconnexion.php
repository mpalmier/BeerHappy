<?php


class ControllerDeconnexion
{
    public static function getDeconnexion()
    {
        include_once('deconnexion.php');
    }

    public static function setDeconnexionDestroy()
    {
        if (isset($_SESSION['id']))
        {
            session_unset();
            session_destroy();
            header('Location: index.php?page=accueil');
        }
    }
}