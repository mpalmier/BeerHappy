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
                include_once("page/connexion/ControllerConnexion.php");
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');

                $instanceController = new ControllerConnexion();
                $instanceController->includeView();

                if(!empty($_POST['username']) && !empty($_POST['password']))
                {
                    if ($instanceController->authenticate($_POST['username'], $_POST['password']))
                    {
                        $instanceController->redirectUser();
                    }
                }
                break;

            case "inscription" :
                $instanceController = new ControllerInscription();
                $instanceController->includeView();
                break;
        }
    }
}
