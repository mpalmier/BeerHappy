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
<div class="content-area" id="adminAll">
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

        <div class="block">
            <p>Trésorie de Prestachope : <span><?php ControllerAdmin::getTresorie(); ?></span> €</p>
        </div>
        <?php
        $value = UserDAO::getNbrUserAdmin();
        foreach ($value as $v) {
        $nbr =  $v['cpt'];
        }

        // Pagination

        @$pages=$_GET["pages"];
        if (empty($pages)) {
        $pages=1;
        }
        $nbr_elements_par_page = 11;
        $nbr_de_pages = ceil($nbr/$nbr_elements_par_page);
        $debut=($pages-1)*$nbr_elements_par_page;



        ?>


        <div class="userListe">
            <?php

            //Parcourir les différentes pages
            echo '<div class="pages">';
            for($i=1;$i<=$nbr_de_pages;$i++)
            {
                if($pages != $i)
                {
                    echo "<a class='noUse' href='?pages=$i&page=".$_GET['page']."'>$i</a>";
                }
                else {
                    echo "<a class='use'>$i</a>";
                }
            }
            echo '</div>';

            ?>
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

            UserDAO::getUserByPageAdmin($debut, $nbr_elements_par_page);

            ?>
            </table>
            <?php

                //Parcourir les différentes pages
                echo '<div class="pages">';
                for($i=1;$i<=$nbr_de_pages;$i++)
                {
                    if($pages != $i)
                    {
                        echo "<a class='noUse' href='?pages=$i&page=".$_GET['page']."'>$i</a>";
                    }
                    else {
                        echo "<a class='use'>$i</a>";
                    }
                }
                echo '</div>';

            ?>
        </div>
    </body>
</html>
