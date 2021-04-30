<form action="index.php?page=AjouterProduit" method="post">
    <p>Nom du produit : <input type="text" name="nom" /></p>
    <p>Prix du produit : <input type="text" name="prix" /></p>
    <p>Stock : <input type="text" name="stock" /></p>
        <h2>Upload Fichier</h2>
        <label for="fileUpload">Fichier:</label>
        <input type="file" name="photo" id="fileUpload">
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    <p><input type="submit" value="Ajouter un produit"></p>
</form>