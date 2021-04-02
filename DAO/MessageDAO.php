<?php
class MessageDAO{
    public static function getcommentaire(){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from message");
        $reponse->execute();
        $message = $reponse->fetchAll();
        $tab=Array();

        if (empty($message[0])){
            return null;
        }
        else{
            foreach ($message as $mes) {
                $messageDTO = new MessageDTO();
                $messageDTO->setIdUser($mes[0]);
                $messageDTO->setPseudo($mes[1]);
                $messageDTO->setContent($mes[2]);
                $messageDTO->setDate($mes[3]);
                $tab[]=$messageDTO;
            }

            return $tab;
        }
    }

    public static function getMessageById($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where id_message=?");
        $reponse->execute(array($id));
        $message = $reponse->fetchAll();
        if (empty($user[0])){
            return null;
        }
        else{
            $mess=$message[0];
            $messageDTO = new MessageDTO();
            $messageDTO->setIdUser($mess[0]);
            $messageDTO->setPseudo($mess[1]);
            $messageDTO->setContent($mess[2]);
            $messageDTO->setDate($mess[3]);
            return $messageDTO;
        }
    }
    public static function getMessageByPseudo($pseudo){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where pseudo=?");
        $reponse->execute(array($pseudo));
        $message = $reponse->fetchAll();
        if (empty($user[0])){
            return null;
        }
        else{
            $mess=$message[0];
            $messageDTO = new MessageDTO();
            $messageDTO->setIdUser($mess[0]);
            $messageDTO->setPseudo($mess[1]);
            $messageDTO->setContent($mess[2]);
            $messageDTO->setDate($mess[3]);
            return $messageDTO;
        }
    }


}