<?php

class SuperController
{
    public static function callPage($page)
    {
        switch($page)
        {
            case "interdit" :
                $instanceController = new ControllerInterdiction();
                if ($instanceController->isConnected()==false) {
                    $instanceController->includeView();
                }
                else {
                    header("location:index.php?page=acceuil");
                }
                break;

            case "produit" :
                $instanceController = new ControllerProduit();
                $instanceController->includeView();
                break;


            case "accueil":
                $instanceController=new ControllerAccueil();
                $instanceController->includeView();

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
