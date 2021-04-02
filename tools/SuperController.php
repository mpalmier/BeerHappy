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
                break;

            case "produit" :
                $instanceController = new ControllerProduit();
                $instanceController->includeView();
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
