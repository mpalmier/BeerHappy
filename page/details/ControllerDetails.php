<?php
include_once('DAO/ProduitDAO.php');
include_once('DTO/ProduitDTO.php');
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
            <div class="photo"><img src="'.$ptd->getPhoto().'"></div>
            <div class="description">
            <div class="nom"><p>'.$ptd->getNom().'</p></div>
            <div class="prix"><p>'.$ptd->getPrix().' €</p></div>
            <div class="stock"><p>Stock disponible : '; if ($ptd->getStock() >= 0) { echo $ptd->getStock(); } else { echo 'En cours d\'approvisionnement'; } echo'</p></div>
            <div class="add"><a href="index.php?page=launchPanier&id='.$_GET['id'].'"><span></span><span></span><span></span><span></span>Ajouter au panier</a></div>
            <div class="retour"><a href="'.$_SERVER["HTTP_REFERER"].'">Retour</a></div></div>';

        }

    }

}