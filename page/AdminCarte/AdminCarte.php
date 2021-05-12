<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_admin.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <div class="addCategorie">
            <h1> Ajouter une catégorie </h1>
            <form action=index.php?page=AddCategorie method='post'>
                <input id="addInput" type=text name=nom><br>
                <input id="addButton" value='Ajouter' type='submit' >
            </form>
        </div>
        <div class="listeCategorie">
            <?php
                AdminCarteController::afficherCategorie();
            ?>
        </div>
    </div>
</div>
</body>
</html>
<!--
<a href="#" class="btn">
    <span class="text">Text</span>
    <span class="flip-front">Ajouter une</span>
    <span class="flip-back">Catégorie</span>
</a>
-->
