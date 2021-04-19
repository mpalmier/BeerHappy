<?php

class ControllerCarte
{
    public static function includeView()
    {
        include_once("carte.php");
    }

    public static function afficherCategorie()
    {
        $categorie=new CategorieDTO();
        $categorie=CategorieDAO::getCategorie();
        foreach ($categorie as $cat)
        {
            echo '<br><a href="index.php?page=produit&id='.$cat->getId().'">'.$cat->getNom()."</a>";

        }

    }
}