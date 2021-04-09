<?php
class AdresseDAO{
    public static function getAdresseByIdUser($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from adresse where id_user=?");
        $reponse->execute(array($id));
        $adresses = $reponse->fetchAll();
        if (empty($adresses[0])){
            return null;
        }
        else{
            $adresse=$adresses[0];
            $AdressesDTO = new AdresseDTO();
            $AdressesDTO->setId($adresse[0]);
            $AdressesDTO->setNom($adresse[1]);
            $AdressesDTO->setPseudo($adresse[2]);
            $AdressesDTO->setPassword($adresse[3]);
            $AdressesDTO->setArgent($adresse[4]);
            $AdressesDTO->setAdmin($adresse[5]);
            return $AdressesDTO;
        }
    }
}