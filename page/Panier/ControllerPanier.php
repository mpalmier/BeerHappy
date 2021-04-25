<?php

class ControllerPanier
{

    function includeView()
    {
        include_once('panier.php');
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
            /*header('Location: index.php?page=carte');*/
            echo "Produit bien ajouté a votre panié";
            var_dump($_SESSION['panier']);
        } else {
            die("Vous n'avez pas sélectionné de produit à ajouter");
        }
    }

    function addProduct($product_id) {
        $_SESSION['panier'][$product_id] = 1;
    }
}