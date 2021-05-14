<?php
class AdresseDAO
{
    public static function getAdresseByIdUser($id)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from adresse where id_user=?");
        $reponse->execute(array($id));
        $adresses = $reponse->fetchAll();
        if (empty($adresses[0])) {
            return null;
        } else {
            $adresse = $adresses[0];
            $AdressesDTO = new AdresseDTO();
            $AdressesDTO->setId($adresse[0]);
            $AdressesDTO->setNom($adresse[1]);
            $AdressesDTO->setPrenom($adresse[2]);
            $AdressesDTO->setAdresseLigne($adresse[3]);
            $AdressesDTO->setVille($adresse[4]);
            $AdressesDTO->setCodePostal($adresse[5]);
            $AdressesDTO->setTelephone($adresse[6]);

            return $AdressesDTO;
        }
    }

    public static function deleteAdresseById($id)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("DELETE FROM adresse where id_user=?");
        $reponse->execute(array($id));
    }

    public static function insertAdresseById($nom, $prenom, $adresse_ligne, $ville, $code_postal, $tel, $id_user)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("INSERT INTO adresse(nom,prenom,adresse_ligne,ville,code_postal,telephone,id_user) VALUES (?,?,?,?,?,?,?)");
        $reponse->execute(array($nom, $prenom, $adresse_ligne, $ville, $code_postal, $tel, $id_user));
    }
}