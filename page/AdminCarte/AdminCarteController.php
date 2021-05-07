<?php
class AdminCarteController{
    public static function redirectUser(){
        header('Location:index.php?page=AdminCarte');
    }

    public static function afficherCategorie(){
        $cat=CategorieDAO::getCategorie();
        echo '<h1> Liste des catégories </h1>';
        foreach($cat as $categories){
            echo $categories->getNom();
            echo '<form method=post action="index.php?page=ModifierCategorie&id='.$categories->getId().'"><input type="text" name="nom"><input type="submit" value="Modifier"></form>';
            echo '<a href=index.php?page=SupCategorie&id='.$categories->getId().'>Supprimer </a><br>';
        }
    }
}
