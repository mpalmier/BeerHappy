<?php
include_once ('DAO/CategorieDAO.php');
include_once ('DTO/CategorieDTO.php');

class AdminCarteController{
    public static function redirectUser(){
        header('Location:index.php?page=AdminCarte');
    }

    public static function afficherCategorie(){
        $cat=CategorieDAO::getCategorie();
        echo '<h1>Liste des catégories</h1>';
        foreach($cat as $categories){
            echo '<tr>';
            echo '<td>'.$categories->getNom().'</td>';
            echo '<td><form method=post action="index.php?page=ModifierCategorie&id='.$categories->getId().'"><input type="text" name="nom"><input type="submit" value="Modifier"></form></td>';
            echo '<td><a href=index.php?page=SupCategorie&id='.$categories->getId().'><img class="id1" src="assets/images/poubelle-de-recyclage.svg"></a></td>';
            echo '</tr>';
        }
    }
}
