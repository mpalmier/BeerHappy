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
            $this->addProduct($_GET['id']);
            header('Location: index.php?page=carte');
        } else {
            die("Vous n'avez pas sélectionné de produit à ajouter");
        }
    }

    function addProduct($product_id)
    {
        $idProduit = $product_id;
        $quantite = 1;
        $_SESSION['Panier'] = [$idProduit, $quantite];
    }

    public static function SuprPanier($supr_id)
    {
        if(isset($supr_id))
        {
            if(empty($supr_id))
            {
                echo "Aucun produit sélectionné";
            }
            unset($_SESSION['panier'][$supr_id]);
            header('Location: index.php?page=panier');
        }
    }
}