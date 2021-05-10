<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">

        <?php ?>
        <a href="index.php?page=AdminContact"><p> Admin contact</p> </a>
        <a href="index.php?page=AdminCarte"><p> Admin Carte</p> </a>
        <a href="index.php?page=AdminProduit"><p> Admin Produit</p> </a>
        <?php
        ControllerAdmin::afficherUser();
        ?>
    </div>
</div>
</body>
</html>
