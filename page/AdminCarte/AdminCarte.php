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
        <div class="navAdmin">
            <nav class="nav">
                <ul class="nav__menu">
                    <li class="nav__menu-item"><a href="index.php?page=AdminContact">Admin contact</a></li>
                    <li class="nav__menu-item"><a href="index.php?page=AdminCarte">Admin Carte</a></li>
                    <li class="nav__menu-item"><a href="index.php?page=AdminProduit&pages=1">Admin Produit</a></li>
                </ul>
            </nav>
        </div>
        <div class="addCategorie">
            <h1> Ajouter une catégorie </h1>
            <form action=index.php?page=AddCategorie method='post'>
                <input id="addInput" type=text name=nom><br>
                <input id="addButton" value='Ajouter' type='submit' >
            </form>
        </div>
        <div class="listeCategorie">
            <table>
                <tr>
                    <th><span class="pseudo">Nom</span></th>
                    <th><span class="email">Modifier</span></th>
                    <th><span class="prenom">Action</span></th>
                </tr>
            <?php
                AdminCarteController::afficherCategorie();
            ?>
            </table>
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
