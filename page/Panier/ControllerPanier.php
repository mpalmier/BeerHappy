<?php

class ControllerPanier
{

    function includeView()
    {
        include_once('panier.php');
    }

    function launchPanier()
    {
        include_once('panierLaunch.php');
    }

    function getPanierVerif()
    {
        if(isset($_GET['id']))
        {
            $product = ProduitDAO::getProduitById($_GET['id']);
            if(empty($product))
            {
                die("Ce produit n'existe pas");
            }
            $this->addProduct($_GET['id']);
            header('Location: index.php?page=carte');
        } else {
            die("Vous n'avez pas sélectionné de produit à ajouter");
        }
    }

    function addProduct($product_id) {
        $_SESSION['panier'][$product_id] = $product_id;

    }

    public static function SuprPanier()
    {
        if(isset($_GET['id']))
        {
            if(empty($_GET['id']))
            {
                echo "Aucun produit sélectionné";
            }
            unset($_SESSION['panier'][$_GET['id']]);
            header('Location: index.php?page=panier');
        }
    }
}