<?php
include_once('DAO/ProduitDAO.php');
include_once ('DTO/ProduitDTO.php');
include_once('DAO/CategorieDAO.php');
include_once ('DTO/CategorieDTO.php');
include_once('DAO/UserDAO.php');
include_once('DTO/UserDTO.php');
 class ControllerAdminProduit{
    public static function testPhoto(){
        if (isset($_POST['submit'])){
            $maxSize=100000;
            $validExt=array('.jpg','.jpeg','.gif','.png');
            if($_FILES['upload_file']['error'] >0){
                echo"Une erreur est survenue lors du transfet";
                die;
            }
            $fileSize=$_FILES['upload_file']['size'];
            if ($fileSize>$maxSize){
                return false;
            }
            $fileName=$_FILES['upload_file']['name'];
            $fileExt=".".strtolower(substr(strrchr($fileName,'.'),1));


            if (!in_array($fileExt,$validExt)){
                echo "Le fichier n'est pas une image";
                return false;
            }

            $tmpname=$_FILES['upload_file']["tmp_name"];
            $NomUnique=md5(uniqid(rand(),true));
            $fileName="assets/photoproduits/".$NomUnique.$fileExt;
            $result=move_uploaded_file($tmpname,$fileName);
            if ($result){
                return $fileName;
            }
        }
    }



    public static function publierProduit($photo){
            if(!empty($_POST['nom']) && !empty($_POST['stock']) && !empty($_POST['prix'])) {
                $produitDTO = new ProduitDTO();
                $produitDTO->setNom($_POST['nom']);
                $produitDTO->setStock($_POST['stock']);
                $produitDTO->setPrix($_POST['prix']);
                $produitDTO->setPhoto($photo);
                $produitDTO->setIdCategorie($_POST['menu_destination']);
               return $produitDTO;
            }
        }


    public static function afficherCategorie(){
        $categorie=new CategorieDTO();
        $categorie=CategorieDAO::getCategorie();
        foreach ($categorie as $cat)
        {
            echo '<option name="idcategorie"  value="'.$cat->getId().'">'.$cat->getNom().'</option>';
        }

    }

    public static function afficherListeProduits($id)
    {
        $produit = ProduitDAO::getProduitById($id);

        if (!empty($produit)) {
        foreach ($produit as $produits) {
            echo "<tr>";
            echo "<td>Nom du produit : " . $produits->getNom() . "<form method=post action='index.php?page=ModifierProduit&id=" . $produits->getId() . "' enctype='multipart/form-data' > <input type='text' name='nom'></td>";
            echo "<td>Image du produit : </p><input type='file' name='upload_file'></td>";
            echo "<td>Prix du produit : " . $produits->getPrix() . "<input type='text' name='prix'></td>";
            echo "<td>Stock restant : " . $produits->getStock() . "<input type='text' name='stock'></td>";
            echo "<td><input class='input_modif' type='submit' name='submit' value='Modifier'></form></td>";
            echo "<td><a href='index.php?page=supprimerProduit&id=" . $produits->getId() . "'><img src='assets/images/poubelle-de-recyclage.svg'></a></td>" ;
            echo "</tr>";
        }
    }

    }

    public static function redirectUser(){
            header("location:index.php?page=AdminProduit");
    }
}
