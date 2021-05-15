<?php
class MessageDAO{
    public static function getMessage(){
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
                $messageDTO->setId($mes[0]);
                $messageDTO->setEmail($mes[1]);
                $messageDTO->setTitre($mes[2]);
                $messageDTO->setContenu($mes[3]);
                $messageDTO->setDate($mes[4]);
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