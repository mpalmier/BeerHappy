<?php

class SuperController
{
    public static function callPage($page)
    {
        switch($page)
        {
            case "interdit" :
                include_once("page/interdiction/ControllerInterdiction.php");
                $instanceController = new ControllerInterdiction();
                if ($instanceController->isConnected()==false) {
                    $instanceController->includeView();
                }
                else {
                    header("location:index.php?page=accueil");
                }
                break;

            case "produit" :
                $instanceController = new ControllerProduit();
                $instanceController->includeView();
                break;


            case "accueil":
                include_once ("page/Accueil/ControllerAccueil.php");
                $instanceController=new ControllerAccueil();
                $instanceController->insertView();
                break;

            case "connexion" :
                $instanceController = new ControllerConnexion();
                $instanceController->includeView();
                break;

            case "inscription" :
                $instanceController = new ControllerInscription();
                $instanceController->includeView();
                break;
        }
    }
}
