<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_admin.css"
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
        <div class="column">
            <div class="addProduct">
                <h1>Ajouter un produit</h1>
                <form action="index.php?page=AjouterProduit" method="post" enctype="multipart/form-data">
                    <p> Image du produit : <input type="file" name="upload_file"></p>
                    <p>Nom du produit : <input type="text" name="nom" /></p>
                    <p>Prix du produit : <input type="text" name="prix" /></p>
                    <p>Stock : <input type="text" name="stock" /></p>
                    <p> Catégorie : <select name="menu_destination"><?php ControllerAdminProduit::afficherCategorie(); ?> </p></select>
                    <p><input type="submit" name="submit" value="Ajouter un produit"></p>
                </form>
            </div>

            <?php

            $value = ProduitDAO::getNbrElementAdmin();
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

            //Parcourir les différentes pages
            echo '<div class="pages">';
            for($i=1;$i<=$nbr_de_pages;$i++)
            {
                if($pages != $i)
                {
                    echo "<a href='?pages=$i&page=".$_GET['page']."'>$i</a>";
                }
                else {
                    echo "<a>$i</a>";
                }
            }
            echo '</div>';

            ?>
        </div>

        <!--<h1>Modifier le produit</h1>-->
        <table>
            <tr>
                <th><span class="nom">Nom</span></th>
                <th><span class="image">Image</span></th>
                <th><span class="prix">Prix</span></th>
                <th><span class="stock">Stock</span></th>
                <th><span class="action">Action</span></th>
            </tr>

    <?php
        ProduitDAO::getElementByPageAdmin($debut,$nbr_elements_par_page);
    ?>


    </table>

        <?php
        //Parcourir les différentes pages
        echo '<div class="pages">';
        for($i=1;$i<=$nbr_de_pages;$i++)
        {
            if($pages != $i)
            {
                echo "<a href='?pages=$i&page=".$_GET['page']."'>$i</a>";
            }
            else {
                echo "<a>$i</a>";
            }
        }
        echo '</div>';

        ?>
</body>
</html>



