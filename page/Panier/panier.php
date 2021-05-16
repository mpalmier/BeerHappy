<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_panier.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <table>
            <tr>
                <th><span class="photo">Photo</span></th>
                <th><span class="name">Nom du produit</span></th>
                <th><span class="price">Prix</span></th>
                <th><span class="quantity">Quantité</span></th>
                <th><span class="action">Action</span></th>
            </tr>

            <?php

            ControllerPanier::afficherPanier();

            ?>

    <div>

    <?php
    if(!empty($_SESSION['panier'])) {
        echo '<div class="add"><a href="index.php?page=commande"><span></span><span></span><span></span><span></span>Commander</a></div>';
    }

    ?>

    <div class="retour"><a href="javascript:history.go(-1)">Retour</a></div>
    </div>

</body></html>








