<?php
/*
echo "Votre panier :";*/

$tab = $_SESSION['panier'];
$prix = 0;
$_SESSION['panier']['qteProduit'];

var_dump($_SESSION['panier']);
echo "<br>";
var_dump($_SESSION['panier']['qteProduit']);


foreach ($tab as $item)
{
    $produit = new ProduitDTO();
    $produit =  ProduitDAO::getProduitById($item);

    if (isset($produit))
    {
        foreach ($produit as $pt)
        {
            echo '<br>
                Nom : ' . $pt->getNom() . '<br>
                Prix : ' . $pt->getPrix() . '<br>
                Photo : <img src="' . $pt->getPhoto() . '"><br>
                Quantité : <a href="index.php?page=addQuantite?id='.$pt->getId().'">Plus</a> '.$_SESSION['panier']['qteProduit'][$pt->getId()].'
                <a href="index.php?page=suprQuantite">Moins</a><br>
                <a href=' . $_SERVER["HTTP_REFERER"] . '>Retour</a>
                <a href="index.php?page=supprimerPanier&id=' . $pt->getId() . '">Supprimé</a>';
            $prix1 = $pt->getPrix();
            $prix += $prix1;
        }
    }
}

echo '<br><br><br>Prix total de vos produits : '.$prix.' €';




