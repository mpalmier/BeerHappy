<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
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
        $quantite = 1;
        $_SESSION['panier'][] =[$product_id, $quantite];
    }

    public static function SuprPanier($supr_id)
    {
        if(isset($supr_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $supr_id)
                {
                    unset($_SESSION['panier'][$key]);
                    header('Location: index.php?page=panier');
                }
            }
        }

    }

    public static function suprQuantite($supr_id)
    {
        if(isset($supr_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $supr_id)
                {
                    if ($value[1] == 1)
                    {
                        ControllerPanier::SuprPanier($supr_id);
                    }
                    else {
                        $value[1]--;
                    }

                    header('Location: index.php?page=panier');
                }
            }
        }

    }

    public static function addQuantite($supr_id)
    {
        if(isset($supr_id))
        {
            foreach ($_SESSION['panier'] as $key => $value)
            {
                if ($key == $supr_id)
                {
                    $value[1]++;
                    header('Location: index.php?page=panier');
                }
            }
        }
    }

    public static function getCalculPrixQte($prix,$qte)
    {
        if(isset($prix) && isset($qte))
        {
            $prix *= $qte;
        }
        return $prix;
    }

}