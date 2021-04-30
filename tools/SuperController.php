<?php

session_start();

class SuperController
{
    public static function callPage($page)
    {
        include_once('tools/DatabaseLinker.php');
        if (isset($_GET['page']))
        {
            if (isset($_GET['page']) || $_GET['page']=="interdit")
            {
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once('page/Admin/ControllerAdmin.php');
                include_once("page/Header-Footer/header.php");
            }
        }

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
                include_once('DTO/ProduitDTO.php');
                include_once('page/produits/ControllerProduit.php');

                $instanceController = new ControllerProduit();
                $instanceController->includeView();

                break;

            case "details" :
                include_once('DAO/ProduitDAO.php');
                include_once('DTO/ProduitDTO.php');
                include_once('page/details/ControllerDetails.php');

                $instanceController = new ControllerDetails();
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
                include_once('DTO/UserDTO.php');
                include_once('DAO/UserDAO.php');
                include_once("page/inscription/ControllerInscription.php");

                $instanceController = new ControllerInscription();
                $instanceController->includeView();
                break;

            case "deconnexion" :
                include_once("page/deconnexion/ControllerDeconnexion.php");

                $instanceController = new ControllerDeconnexion();
                $instanceController->getDeconnexion();
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
                break;

            case "launchPanier":
                include_once('DAO/ProduitDAO.php');
                include_once('DTO/ProduitDTO.php');
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->launchPanier();
                break;

            case "panier":
                include_once('DAO/ProduitDAO.php');
                include_once('DTO/ProduitDTO.php');
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->includeView();
                break;

            case "supprimerPanier":
                include_once('DAO/ProduitDAO.php');
                include_once('DTO/ProduitDTO.php');
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->SuprPanier();
                break;

            case "deleteAdmin":
                include_once('DAO/UserDAO.php');
                include_once('DTO/UserDTO.php');
                include_once('DAO/AdresseDAO.php');
                include_once('DTO/AdresseDTO.php');
                include_once('page/Admin/ControllerAdmin.php');
                $instanceController=new ControllerAdmin();
                echo '<p> prout</p>';
                AdresseDAO::deleteAdresseById($_GET['id']);
                UserDAO::deleteUserById($_GET['id']);
                $instanceController->redirectUser();
                break;

            case "AdminProduit":
                include_once('DAO/ProduitDAO.php');
                include_once ('DTO/ProduitDTO.php');
                include_once('page/AdminProduit/AdminProduit.php');



            case "AjouterProduit":
                include_once('DAO/ProduitDAO.php');
                include_once ('DTO/ProduitDTO.php');
                include('page/AdminProduit/ControllerAdminProduit.php');
                $instanceController=new ControllerAdminProduit();
                if($instanceController->isGood()==true){

                }





        }
    }
}
