<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_produits.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script  src="assets/js/script.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="content-area">
        <div class="wrapper">
            <?php

            ProduitDAO::BarRechercheProduct($_POST['q'])

            ?>

            <form method="POST">
                <input type="search" name="q" placeholder="Recherche..." />
                <input type="submit" value="Valider" />
            </form>
            <?php if($product->rowCount() > 0) { ?>
                <ul>
                    <?php while($a = $product->fetch()) { ?>
                        <li><?= $a['nom'] ?></li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                Aucun résultat pour: <?= $_POST['q'] ?>...
            <?php } ?>

            <?php

            ControllerProduit::afficherCategorie();

            ?>

        </div>
    </div>
</body>
</html>

