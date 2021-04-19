<?php

session_start();

class SuperController
{
    public static function callPage($page)
    {
        include_once('tools/DatabaseLinker.php');

        switch($page)
        {
            case "interdit" :
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once('page/Admin/ControllerAdmin.php');
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
                include_once('DAO/ProduitDAO.php');
                include_once ('DTO/ProduitDTO.php');
                include_once ('page/produits/ControllerProduit.php');

                $instanceController = new ControllerProduit();
                $instanceController->includeView();

                break;

            case "carte" :
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once('DAO/CategorieDAO.php');
                include_once('DTO/CategorieDTO.php');
                include_once('page/carte/ControllerCarte.php');
                include_once('page/Admin/ControllerAdmin.php');

                include_once ("page/carte/ControllerCarte.php");
                $instanceController = new ControllerCarte();
                $instanceController->includeView();
                break;

            case "accueil":
                include_once ("page/Accueil/ControllerAccueil.php");
                $instanceController=new ControllerAccueil();
                $instanceController->insertView();
                break;

            case "connexion" :
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once("page/connexion/ControllerConnexion.php");


                $instanceController = new ControllerConnexion();
                $instanceController->includeView();

                if(!empty($_POST['username']) && !empty($_POST['password']))
                {
                    if ($instanceController->authenticate($_POST['username'], $_POST['password']))
                    {
                        $instanceController->redirectUser();
                    }
                    else
                    {
                        $instanceController->redirectUserFalse();
                    }
                }
                break;

            case "inscription" :
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once("page/inscription/ControllerInscription.php");

                $instanceController = new ControllerInscription();
                $instanceController->includeView();
                break;

            case "admin":
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once('DAO/AdresseDAO.php');
                include_once('DTO/AdresseDTO.php');
                include_once('page/Admin/ControllerAdmin.php');
                $instanceController=new ControllerAdmin();
                if (isset($_SESSION['id'])) {
                    if ($instanceController->isAdmin($_SESSION['id']) == true) {
                        $instanceController->insertView();
                    }
                }






        }
    }
}
