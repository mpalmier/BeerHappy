<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_admin.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <div class="navAdmin">
            <nav class="nav">
                <ul class="nav__menu">
                    <li class="nav__menu-item"><a href="index.php?page=AdminContact">Admin contact</a></li>
                    <li class="nav__menu-item"><a href="index.php?page=AdminCarte">Admin Carte</a></li>
                    <li class="nav__menu-item"><a href="index.php?page=AdminProduit">Admin Produit</a></li>
                </ul>
            </nav>
        </div>

        <div class="userListe">
            <table>
                <tr>
                    <th><span class="pseudo">Pseudo</span></th>
                    <th><span class="email">Adresse mail</span></th>
                    <th><span class="prenom">Prenom</span></th>
                    <th><span class="nom">Nom</span></th>
                    <th><span class="ville">Ville</span></th>
                    <th><span class="adresseligne">Adresse Ligne</span></th>
                    <th><span class="codepostal">Code postal</span></th>
                    <th><span class="tel">Téléphone</span></th>
                    <th><span class="action">Action</span></th>
                </tr>

            <?php

            ControllerAdmin::afficherUser();

            ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
