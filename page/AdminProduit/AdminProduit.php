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



