<?php
class FactureDAO{
    public static function getFacture()
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from facture");
        $reponse->execute();
        $facture = $reponse->fetchAll();
        $tab = array();
        foreach ($facture as $fcs)
        {
            $factureDTO = new FactureDTO();
            $contenirDTO = new ContenirDTO();
            $factureDTO->setId($fcs[0]);
            $factureDTO->setPrix($fcs[1]);
            $tab[] = $factureDTO;
        }

        return $tab;
    }

}