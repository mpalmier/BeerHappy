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
        <form action="index.php?page=AjouterProduit" method="post" enctype="multipart/form-data">
            <p> Image du produit :</p>
            <input type="file" name="upload_file">
            <p>Nom du produit : <input type="text" name="nom" /></p>
            <p>Prix du produit : <input type="text" name="prix" /></p>
            <p>Stock : <input type="text" name="stock" /></p>
            <p> Catégorie :</p>
            <select name="menu_destination">
                <?php
                ControllerAdminProduit::afficherCategorie();
                ?>
            </select>
            <p><input type="submit" name="submit" value="Ajouter un produit"></p>
        </form>

        <?php
        ControllerAdminProduit::afficherListeProduits();
        ?>
    </div>
</div>
</body>
</html>



