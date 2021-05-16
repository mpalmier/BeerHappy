<?php
class MessageDAO{


    public static function getMessageById($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from message where id=?");
        $reponse->execute(array($id));
        $message = $reponse->fetchAll();
        $tab=Array();

        if (empty($message[0])){
            return null;
        }
        else{
            $mess=$message[0];
            $messageDTO = new MessageDTO();
            $messageDTO->setId($mess[0]);
            $messageDTO->setTitre($mess[1]);
            $messageDTO->setContenu($mess[2]);
            $messageDTO->setDate($mess[3]);
            $messageDTO->setIdUser($mess[4]);
            $tab[]=$messageDTO;
            return $tab;
        }
    }

    public static function setMessageContact($msg,$titre) {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("INSERT INTO message (id, titre, contenu, date, id_user) VALUES (NULL, ?, ?, CURRENT_TIMESTAMP(), ?);");
        $reponse->execute(array($titre,$msg,$_SESSION['id']));
    }

    public static function getNbrElementAdminContact()
    {
        // Récupérer le nombre d'enregistrements
        $bdd = DatabaseLinker::getConnexion();
        $count = $bdd->prepare('SELECT COUNT(id) AS cpt from message');
        $count->setFetchMode(PDO::FETCH_ASSOC);
        $count->execute();
        $tcount=$count->fetchAll();
        return $tcount;
    }

    public static function getElementByPageAdminContact($debut,$nbr_elements_par_page) {
        //Récupérer les enregistrements eux-mêmes
        $bdd = DatabaseLinker::getConnexion();
        $sel=$bdd->query('SELECT id FROM message ORDER BY id LIMIT '.$debut.','.$nbr_elements_par_page);
        $sel->setFetchMode(PDO::FETCH_ASSOC);
        $tab=$sel->fetchAll();
        foreach ($tab as $t)
        {
            $id =  $t['id'];
            ControllerAdminContact::insertCommentaireById($id);
        }
    }


}