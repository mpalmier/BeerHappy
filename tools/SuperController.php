<?php

class SuperController
{
    public static function callPage($page)
    {
        include_once('tools/DatabaseLinker.php');
        if (isset($_GET['page']))
        {
            if ($_GET['page']!="interdit")
            {
                if ($_GET['page']!="finishCommande") {
                    include_once('DAO/UserDAO.php');
                    include_once('DTO/UserDTO.php');
                    include_once('page/Admin/ControllerAdmin.php');
                    include_once("page/Header-Footer/header.php");
                }

            }
        }

        switch($page)
        {
            case "interdit" :
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
                include_once('page/produits/ControllerProduit.php');
                $instanceController = new ControllerProduit();
                $instanceController->includeView();
                break;

            case "details" :
                include_once('page/details/ControllerDetails.php');
                $instanceController = new ControllerDetails();
                $instanceController->includeView();
                break;

            case "commande":
                include_once('page/Commande/ControllerCommande.php');
                $instanceController = new ControllerCommande();
                $instanceController->includeView();
                break;

            case "finishCommande":
                include_once('page/Commande/ControllerCommande.php');
                $instanceController = new ControllerCommande();
                $instanceController->getCommandeFinish();
                break;

            case "carte" :
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
                include_once('page/Admin/ControllerAdmin.php');
                $instanceController=new ControllerAdmin();
                if (isset($_SESSION['id'])) {
                    if ($instanceController->isAdmin($_SESSION['id']) == true) {
                        $instanceController->insertView();
                    }
                }
                break;

            case "launchPanier":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->getPanierVerif();
                break;

            case "panier":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->includeView();
                break;

            case "supprimerPanierAll":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->supprimerPanierAll();
                break;

            case "supprimerPanier":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->SuprPanier($_GET['id']);
                break;


            case "suprQuantite":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->suprQuantite($_GET['id'],$_GET['idp']);
                break;

            case "addQuantite":
                include_once('page/Panier/ControllerPanier.php');
                $instanceController=new ControllerPanier();
                $instanceController->addQuantite($_GET['id'],$_GET['idp']);
                break;

            case "deleteAdmin":
                include_once('page/Admin/ControllerAdmin.php');
                $instanceController=new ControllerAdmin();
                AdresseDAO::deleteAdresseById($_GET['id']);
                UserDAO::deleteUserById($_GET['id']);
                $instanceController->redirectUser();
                break;

            case "AdminProduit":
                $instanceController=new ControllerAdmin();
                if (isset($_SESSION['id'])) {
                    if ($instanceController->isAdmin($_SESSION['id']) == true) {
                        include_once('page/Admin/ControllerAdmin.php');
                        include_once('page/AdminProduit/ControllerAdminProduit.php');
                        include_once('page/AdminProduit/AdminProduit.php');
                    }
                }
                else {
                    header('index.php?page=carte');
                }
                break;

            case "AjouterProduit":
                include_once('page/AdminProduit/ControllerAdminProduit.php');
                if(!empty($_POST['nom']) && !empty($_POST['stock']) && !empty($_POST['prix'])) {
                    $instanceController = new ControllerAdminProduit();
                    $photo = $instanceController->testPhoto();
                    ProduitDAO::addProduit($instanceController->publierProduit($photo));
                }
                $instanceController=new ControllerAdminProduit();
                $instanceController->redirectUser();
                break;

            case "supprimerProduit";
                include_once ('page/AdminProduit/ControllerAdminProduit.php');
                $instanceController=new ControllerAdminProduit();
                ProduitDAO::deletePhoto($_GET['id']);
                ProduitDAO::supprimerProduit($_GET['id']);
                $instanceController->redirectUser();
                break;

            case "ModifierProduit":
                include_once ('page/AdminProduit/ControllerAdminProduit.php');
                if (isset($_POST['nom']) && isset($_POST['stock']) && isset($_POST['prix'])) {
                    ProduitDAO::deletePhoto($_GET['id']);
                    $instanceController = new ControllerAdminProduit();
                    $photo=$instanceController->testPhoto();
                    ProduitDAO::modifierProduit($photo);
                    $instanceController->redirectUser();
                }
                break;

            case "profile";
                include_once ('page/profile/ControllerProfile.php');
                include_once ('page/profile/profile.php');
                $instanceController=new ControllerProfile();
                $instanceController->includeView();
                break;


            case "AdminCarte":
                include_once('page/AdminCarte/AdminCarteController.php');
                include_once ('page/AdminCarte/AdminCarte.php');
                break;

            case "AddCategorie":
                include_once('page/AdminCarte/AdminCarteController.php');
                if (isset($_POST['nom'])) {
                    CategorieDAO::addCategorie($_POST['nom']);
                    AdminCarteController::redirectUser();
                }
                break;

            case "AdminContact":
                include_once('page/AdminContact/ControllerAdminContact.php');
                $instanceController=new ControllerAdminContact();
                $instanceController->includeView();
                break;

            case "SupCategorie":
                include_once('page/AdminCarte/AdminCarteController.php');
                CategorieDAO::deleteCategorie($_GET['id']);
                AdminCarteController::redirectUser();
                break;

            case "ModifierCategorie":
                include_once('page/AdminCarte/AdminCarteController.php');
                if (isset($_POST['nom']) && isset($_GET['id'])) {
                    CategorieDAO::modifierCategorie($_POST['nom'], $_GET['id']);
                }
                AdminCarteController::redirectUser();
                break;

            case "ModifierPseudo":
                include_once('DTO/UserDTO.php');
                include_once('DAO/UserDAO.php');
                if (isset($_POST['pseudo']) && isset($_GET['id'])) {
                    UserDAO::UpdatePseudoById($_POST['pseudo'], $_GET['id']);
                }
                ControllerProfile::redirectUser();
                break;

            case "ModifierMail":
                include_once('DTO/UserDTO.php');
                include_once('DAO/UserDAO.php');
                if (isset($_POST['email']) && isset($_GET['id'])) {
                    UserDAO::UpdateEmailById($_POST['email'], $_GET['id']);
                }
                ControllerProfile::redirectUser();
                break;

            case "newAdresse":
                echo'on est bien arriver';
                include_once('DTO/AdresseDTO.phpDTO.php');
                include_once('DAO/AdresseDAO.phpDAO.php');
                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse_ligne']) && isset($_POST['ville']) && isset($_POST['postal']) && isset($_POST['tel'])) {
                    echo('champ rempli');
                    AdresseDAO::insertAdresseById($_POST['nom'], $_POST['prenom'], $_POST['adresse_ligne'], $_POST['ville'], $_POST['postal'], $_POST['tel'], $_SESSION['id']);
                    echo 'inseré';
                }

                ControllerProfile::redirectUser();
                echo 'rediriger';
                break;


            case "contact" :
                include_once('page/contact/ControllerContact.php.php');
                include_once("page/contact/Contact.php");
                $instanceController = new ControllerContact();
                $instanceController::insertView();
                break;

        }

        if (isset($_GET['page']))
        {
            if ($_GET['page']!="interdit")
            {
                if ($_GET['page']!="connexion")
                {
                    if ($_GET['page']!="inscription")
                    {
                        if ($_GET['page']!="finishCommande") {
                            include_once("page/Header-Footer/footer.php");

                        }

                    }
                }
            }
        }

    }

}
