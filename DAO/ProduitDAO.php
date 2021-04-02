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
                $produitDTO->setIdProduit($produits[0]);
                $produitDTO->setNom($produits[1]);
                $produitDTO->setPrix($produits[2]);
                $produitDTO->setCategorie($produits[3]);
                $produitDTO->setPhoto($produits[4]);
                $tab[] = $produitDTO;
            }

            return $tab;
        }
    }

    public static function getProduitByCategorie($categorie)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit where categorie=?");
        $reponse->execute(array($categorie));
        $produit = $reponse->fetchAll();
        $tab = array();
        if (empty($produit[0])){
            return null;
        }
        else{
            $lproduit=$produit[0];
            $produitDTO = new ProduitDTO();
            $produitDTO->setIdProduit($lproduit[0]);
            $produitDTO->setNom($lproduit[1]);
            $produitDTO->setPrix($lproduit[2]);
            $produitDTO->setCategorie($lproduit[3]);
            $produitDTO->setPhoto($lproduit[4]);
            $tab[] = $produitDTO;
            return $tab;
        }
    }

    public static function getProduitById($id)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit where id=?");
        $reponse->execute(array($id));
        $produit = $reponse->fetchAll();
        if (empty($produit[0])){
            return null;
        }
        else{
            $lproduit=$produit[0];
            $produitDTO = new ProduitDTO();
            $produitDTO->setIdProduit($lproduit[0]);
            $produitDTO->setNom($lproduit[1]);
            $produitDTO->setPrix($lproduit[2]);
            $produitDTO->setCategorie($lproduit[3]);
            $produitDTO->setPhoto($lproduit[4]);
            return $produitDTO;
        }
    }

}