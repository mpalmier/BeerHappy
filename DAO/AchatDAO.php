<?php
class AchatDAO{
    public static function getAchat()
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from achat");
        $reponse->execute();
        $achat = $reponse->fetchAll();
        $tab = array();
        if (empty($achat[0])) {
            return null;
        } else {
            foreach ($achat as $achats) {
                $achatDTO = new AchatDTO();
                $achatDTO->setId($achats[0]);
            }
            return $tab;
        }
    }
    public static function getAchatById($id){

        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from achat where id=?");
        $reponse->execute(array($id));
        $achat = $reponse->fetchAll();
        if (empty($achat[0])) {
            return null;
        }
        else {
            $achats=$achat[0];
            $achatDTO=new AchatDTO();
            $achatDTO->setId($achats[0]);
            return $achatDTO;
            }


    }

}