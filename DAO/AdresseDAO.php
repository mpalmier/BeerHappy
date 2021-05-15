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

    public static function UpdateNomById($nom,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET nom=? where id_user=?");
        $reponse->execute(array($nom,$id));

    }

    public static function UpdatePrenomById($prenom,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET prenom=? where id_user=?");
        $reponse->execute(array($prenom,$id));

    }
    public static function UpdateAdresseById($adresse_ligne,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET adresse_ligne=? where id_user=?");
        $reponse->execute(array($adresse_ligne,$id));

    }
    public static function UpdateVilleById($ville,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET ville=? where id_user=?");
        $reponse->execute(array($ville,$id));

    }
    public static function UpdateCodeById($code,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET code_postal=? where id_user=?");
        $reponse->execute(array($code,$id));

    }
    public static function UpdateTelById($code,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE adresse SET telephone=? where id_user=?");
        $reponse->execute(array($code,$id));

    }
}