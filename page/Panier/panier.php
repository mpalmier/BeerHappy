<?php

$prix = 0;

foreach ($_SESSION['panier'] as $key => $value)
{
    $produit = new ProduitDTO();
    $produit =  ProduitDAO::getProduitById($value[0]);

    if (isset($produit))
    {
        foreach ($produit as $pt)
        {
            echo '<br>
                Nom : ' . $pt->getNom() . '<br>
                Prix : ' . $pt->getPrix() . '<br>
                Photo : <img src="' . $pt->getPhoto() . '"><br>
                Quantité : <a href="index.php?page=addQuantite?id='.$pt->getId().'">Plus</a> '.$value[1].'
                <a href="index.php?page=suprQuantite">Moins</a><br>
                <a href=' . $_SERVER["HTTP_REFERER"] . '>Retour</a>
                <a href="index.php?page=supprimerPanier&id=' . $pt->getId() . '">Supprimé</a>';
            $prix1 = $pt->getPrix();
            $prix += $prix1;
        }
    }
}

echo '<br><br><br>Prix total de vos produits : '.$prix.' €';



