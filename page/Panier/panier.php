<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">

        <?php

            $prix = 0;
            $prix1 = 0;

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
                            Quantité :  <a href="index.php?page=suprQuantite&id='.$key.'">Moins</a>'.$value[1].'
                            <a href="index.php?page=addQuantite&id='.$key.'">Plus</a><br>
                            <a href=' . $_SERVER["HTTP_REFERER"] . '>Retour</a>
                            <a href="index.php?page=supprimerPanier&id='.$key.'">Supprimer</a>';
                            $prix1 += ControllerPanier::getCalculPrixQte($pt->getPrix(),$value[1]);
                            $prix += $prix1;
                    }
                }
            }

            echo '<br><br><br>Prix total de vos produits : '.$prix.' €';

        ?>
    </div>
</div>
</body></html>





