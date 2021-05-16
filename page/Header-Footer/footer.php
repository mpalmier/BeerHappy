<!DOCTYPE html>
<html lang="fr">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style_footer.css">
</head>
<body>
    <footer>
        <div class="footer">
            <ol>
                <li id="titre1">Nos services</li>
                <li class="listeTextLien"><a href="index.php?page=accueil">Accueil</a></li>
                <?php

                $categorie = CategorieDAO::getCategorie();

                foreach ($categorie as $cat) {
                    echo '<li class="listeTextLien"><a href="index.php?page=produit&id='.$cat->getId().'">'.$cat->getNom().'</a></li>';
                }

                ?>

                <li class="listeTextLien"><a href="index.php?page=contact">Contactez-nous</a></li>

            </ol>
            <ol><span class="vertical"></ol>
            <ol>
                <li id="titre2">Les Horaires</li>
                <li class="listeText">Lundi 18H30 à 18h45</li>
                <li class="listeText">Mardi fermé</li>
                <li class="listeText">Mercredi 18H30 à 18h45</li>
                <li class="listeText">Jeudi 18H30 à 18h45</li>
                <li class="listeText">Vendredi 18H30 à 18h45</li>
                <li class="listeText">Samedi fermé</li>
                <li class="listeText">Dimanche fermé</li>
            </ol>
            <ol><span class="vertical"></ol>
            <ol>
                <li id="titre3">Info Contact</li>
                <li class="listeTextAdresse">Adresse : 2 Rue Boirot, 63000 Clermont-Ferrand</li>
                <li class="listeText">Tel : 04 54 21 58 60</li>
                <li class="listeTextAdresseMail">Email : <a href="mailto:prestachope@gmail.com">prestachope@gmail.com</a></li>
            </ol>
        </div>
        <div class="underFotter">
            <p>Copyright © 2021 Tous droits réservés par Prestachop-4.</p>
        </div>
    </footer>
    </div></div>
</body>
</html>
