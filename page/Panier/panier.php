<?php
/*
echo "Votre panier :";*/

$tab = $_SESSION['panier'];
$prix = 0;

foreach ($tab as $item)
{
    $produit = new ProduitDTO();
    $produit =  ProduitDAO::getProduitById($item);

    foreach ($produit as $pt)
    {
        echo '<br>
            Nom : '.$pt->getNom().'<br>
            Prix : '.$pt->getPrix().'<br>
            Photo : <img src="'.$pt->getPhoto().'">
            <input>'.$_SESSION['panier']['qtnProduit'].'</input>
            <a href='.$_SERVER["HTTP_REFERER"].'>Retour</a>
            <a href="index.php?page=supprimerPanier&id='.$pt->getId().'">Supprimé</a>';
        $prix1 = $pt->getPrix();
        $prix += $prix1;
    }
}

echo '<br><br><br>Prix total de vos produits : '.$prix.' €';





