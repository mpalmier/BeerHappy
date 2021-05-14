<?php
class ContenirDAO{
    public static function getContenirByIdFacture($id_facture)
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from contenir WHERE id_facture=?");
        $reponse->execute(array($id_facture));
        $contenir = $reponse->fetchAll();
        $tab = array();
        foreach ($contenir as $ct)
        {
            $contenirDTO = new ContenirDTO();
            $contenirDTO->setId($ct[0]);
            $contenirDTO->setIdFacture($ct[1]);
            $contenirDTO->setQuantite($ct[2]);
            $tab[] = $contenirDTO;
            return $tab;
        }

    }

}