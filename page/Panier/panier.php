<?php
/*
echo "Votre panier :";*/

$tab = $_SESSION['panier'];


foreach ($tab as $item)
{
    $produit = new ProduitDTO();
    $produit =  ProduitDAO::getProduitById($item);
    echo $item;

    foreach ($produit as $pt)
    {
        echo '
            Nom : '.$pt->getNom().'<br>
            Prix : '.$pt->getPrix().'<br>
            Quantité :<br>
            Photo : <img src="'.$pt->getPhoto().'">
            <a href='.$_SERVER["HTTP_REFERER"].'>Retour</a>
            <a href="supprimerPanier.php">Supprimé</a>';
    }
}
