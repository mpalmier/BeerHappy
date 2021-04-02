<?php



class ProduitDAO {

    public static function getProduit() {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from produit");
        $reponse->execute();
        $produit = $reponse->fetchAll();
        $tab=Array();
        if (empty($produit[0])){
            return null;
        }
        else{
            foreach ($produit as $produits) {
                $produitDTO = new UserDTO();
                $produitDTO->setIdProduit($produits[0]);
                $produitDTO->setNom($produits[1]);
                $produitDTO->setPrix($produits[2]);
                $produitDTO->setCategorie($produits[3]);
                $produitDTO->setPhoto($produits[4]);
                $tab[]=$produitDTO;
            }
        
            return $tab;
        }
    }
}