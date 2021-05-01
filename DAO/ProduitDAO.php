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
        $reponse = $bdd->prepare("SELECT * from produit where id=?");
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
        var_dump($produit);
        $reponse = $bdd->prepare("INSERT INTO produit (nom,prix,stock,photo,id_categorie) VALUES(?,?,?,?,?)");
        $reponse->execute(array($produit->getNom(),$produit->getPrix(),$produit->getStock(),$produit->getPhoto(),$produit->getIdCategorie()));
    }


    public static function supprimerProduit($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("DELETE from produit where id=?");
        $reponse->execute(array($id));
    }

}