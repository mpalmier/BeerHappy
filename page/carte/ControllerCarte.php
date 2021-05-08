<?php
include_once('DAO/UserDAO.php');
include_once('DTO/UserDTO.php');
include_once('DAO/CategorieDAO.php');
include_once('DTO/CategorieDTO.php');
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
            echo '<div class="content"><h1><a href="index.php?page=produit&id='.$cat->getId().'">'.$cat->getNom()."</a></h1></div>";
        }

    }
}