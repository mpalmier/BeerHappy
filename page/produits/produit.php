<!DOCTYPE html>
<html lang="fr">
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
        <div class="categorie">
        <?php ControllerProduit::afficherNameCategorie(); ?>
        </div>

        <?php

        $value = ProduitDAO::getNbrElement($_GET['id']);
        foreach ($value as $v) {
            $nbr =  $v['cpt'];
        }

        // Pagination

        @$pages=$_GET["pages"];
        if (empty($pages)) {
            $pages=1;
        }
        $nbr_elements_par_page = 9;
        $nbr_de_pages = ceil($nbr/$nbr_elements_par_page);
        $debut=($pages-1)*$nbr_elements_par_page;

        ?>
        <?php

        //Parcourir les différentes pages
        echo '<div class="pages">';
        for($i=1;$i<=$nbr_de_pages;$i++)
        {
            if($pages != $i)
            {
                echo "<a class='noUse' href='?pages=$i&page=".$_GET['page']."&id=".$_GET['id']."'>$i</a>";
            }
            else {
                echo "<a class='use'>$i</a>";
            }
        }
        echo '</div>';

        ?>

        <div class="wrapper">
            <?php
            ProduitDAO::getElementByPage($_GET['id'],$debut,$nbr_elements_par_page);
            ?>
        </div>

        <?php

        //Parcourir les différentes pages
        echo '<div class="pagess">';
        for($i=1;$i<=$nbr_de_pages;$i++)
        {
            if($pages != $i)
            {
                echo "<a class='noUse' href='?pages=$i&page=".$_GET['page']."&id=".$_GET['id']."'>$i</a>";
            }
            else {
                echo "<a class='use'>$i</a>";
            }
        }
        echo '</div>';

        ?>

</body>
</html>

