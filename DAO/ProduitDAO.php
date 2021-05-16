<?php



class ProduitDAO
{

    public static function getProduit()
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit");
        $reponse->execute();
        $produit = $reponse->fetchAll();
        $tab = array();
        if (empty($produit[0])) {
            return null;
        } else {
            foreach ($produit as $produits) {
                $produitDTO = new ProduitDTO();
                $produitDTO->setId($produits[0]);
                $produitDTO->setNom($produits[1]);
                $produitDTO->setPrix($produits[2]);
                $produitDTO->setStock($produits[3]);
                $produitDTO->setPhoto($produits[4]);
                $tab[] = $produitDTO;
            }

            return $tab;
        }
    }

    public static function getProduitByCategorie($categorie)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit where id_categorie=?");
        $reponse->execute(array($categorie));
        $produit = $reponse->fetchAll();
        $tab = array();
        if (empty($produit[0]))
        {
            return null;
        }
        else
        {
            foreach ($produit as $pt)
            {
                $produitDTO = new ProduitDTO();
                $produitDTO->setId($pt[0]);
                $produitDTO->setNom($pt[1]);
                $produitDTO->setPrix($pt[2]);
                $produitDTO->setStock($pt[3]);
                $produitDTO->setPhoto($pt[4]);
                $tab[] = $produitDTO;
            }

            return $tab;
        }
    }

    public static function getProduitById($id)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit where id = ?");
        $reponse->execute(array($id));
        $produit = $reponse->fetchAll();
        $tab = array();
        if (empty($produit[0])){
            return null;
        }
        else{
            $lproduit=$produit[0];
            $produitDTO = new ProduitDTO();
            $produitDTO->setId($lproduit[0]);
            $produitDTO->setNom($lproduit[1]);
            $produitDTO->setPrix($lproduit[2]);
            $produitDTO->setStock($lproduit[3]);
            $produitDTO->setPhoto($lproduit[4]);
            $tab[] = $produitDTO;
        }
        return $tab;
    }

    public static function addProduit($produit){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("INSERT INTO produit (nom,prix,stock,photo,id_categorie) VALUES(?,?,?,?,?)");
        $reponse->execute(array($produit->getNom(),$produit->getPrix(),$produit->getStock(),$produit->getPhoto(),$produit->getIdCategorie()));
    }


    public static function supprimerProduit($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("DELETE from produit where id=?");
        $reponse->execute(array($id));
    }

    public static function modifierProduit($photo){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE produit set nom=?, prix=?, stock=?,photo=? where id=?");
        $reponse->execute(array($_POST['nom'],$_POST['prix'],$_POST['stock'],$photo,$_GET['id']));
    }

    public static function deletePhoto($id){
        $produit=ProduitDAO::getProduitById($id);
        $produitObjet=$produit[0];
        unlink($produitObjet->getPhoto());
    }

    public static function getNbrElement($idCategorie)
    {
        // Récupérer le nombre d'enregistrements
        $bdd = DatabaseLinker::getConnexion();
        $count = $bdd->prepare('SELECT COUNT(id) AS cpt from produit WHERE id_categorie = ?');
        $count->setFetchMode(PDO::FETCH_ASSOC);
        $count->execute(array($idCategorie));
        $tcount=$count->fetchAll();
        return $tcount;
    }

    public static function getElementByPage($idCategorie,$debut,$nbr_elements_par_page) {
        //Récupérer les enregistrements eux-mêmes
        $bdd = DatabaseLinker::getConnexion();
        $sel=$bdd->query('SELECT id FROM produit WHERE id_categorie = '.$idCategorie.' ORDER BY nom LIMIT '.$debut.','.$nbr_elements_par_page);
        $sel->setFetchMode(PDO::FETCH_ASSOC);
        $tab=$sel->fetchAll();

        foreach ($tab as $t)
        {
            $id =  $t['id'].'<br>';
            ControllerProduit::afficherCategorie($id);
        }
    }

    public static function getNbrElementAdmin()
    {
        // Récupérer le nombre d'enregistrements
        $bdd = DatabaseLinker::getConnexion();
        $count = $bdd->prepare('SELECT COUNT(id) AS cpt from produit');
        $count->setFetchMode(PDO::FETCH_ASSOC);
        $count->execute();
        $tcount=$count->fetchAll();
        return $tcount;
    }

    public static function getElementByPageAdmin($debut,$nbr_elements_par_page) {
        //Récupérer les enregistrements eux-mêmes
        $bdd = DatabaseLinker::getConnexion();
        $sel=$bdd->query('SELECT id FROM produit ORDER BY nom LIMIT '.$debut.','.$nbr_elements_par_page);
        $sel->setFetchMode(PDO::FETCH_ASSOC);
        $tab=$sel->fetchAll();

        foreach ($tab as $t)
        {
            $id =  $t['id'];
            ControllerAdminProduit::afficherListeProduits($id);
        }
    }

    public static function SuprStockByQte($stockValue,$id_product) {
        $bdd = DatabaseLinker::getConnexion();
        $updateStock = $bdd->prepare('UPDATE produit SET stock=? WHERE id=?');
        $updateStock->execute(array($stockValue,$id_product));
    }

    public static function updatePrixUser($argent,$id_user) {
        $bdd = DatabaseLinker::getConnexion();
        $updateStock = $bdd->prepare('UPDATE user SET argent=? WHERE id=?');
        $updateStock->execute(array($argent,$id_user));
    }

    public static function setContenir($product_id,$id_facture,$quantite) {
        $bdd = DatabaseLinker::getConnexion();
        $updateStock = $bdd->prepare('INSERT INTO contenir (id, id_facture, quantite) VALUES (?, ?, ?);');
        $updateStock->execute(array($product_id,$id_facture,$quantite));
    }

    public static function setFacture($prix,$id_user) {
        $bdd = DatabaseLinker::getConnexion();
        $updateStock = $bdd->prepare('INSERT INTO facture (prix, id_user) VALUES (?, ?);');
        $updateStock->execute(array($prix,$id_user));
    }

}