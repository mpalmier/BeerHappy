<?php

class ControllerDetails
{
    public static function includeView()
    {
        include_once("details.php");
    }

    public static function afficherProduit()
    {
        $produit=new ProduitDTO();
        $produit=ProduitDAO::getProduitById($_GET['id']);
        foreach ($produit as $ptd)
        {
            echo '
            Nom : '.$ptd->getNom().'<br>
            Prix : '.$ptd->getPrix().'<br>
            Stock : '.$ptd->getStock().'<br>
            Photo : <img src="'.$ptd->getPhoto().'">
            <a href="">Ajouter au panier</a>
            <a href='.$_SERVER["HTTP_REFERER"].'>Retour</a>';

        }

    }
}