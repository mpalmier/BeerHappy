<?php

class UserDAO
{
    public static function getUser()
    {
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user");
        $reponse->execute();
        $user = $reponse->fetchAll();
        $tab=Array();
        if (empty($user[0]))
        {
            return null;
        }
        else
        {
            foreach ($user as $users)
            {
                $userDTO = new UserDTO();
                $userDTO->setId($users[0]);
                $userDTO->setEmail($users[1]);
                $userDTO->setPseudo($users[2]);
                $userDTO->setPassword($users[3]);
                $userDTO->setArgent($users[4]);
                $userDTO->setAdmin($users[5]);
                $tab[]=$userDTO;
            }

            return $tab;
        }
    }

    public static function setUserAccount($email, $identifiant, $mdp)
    {
        $bdd = DatabaseLinker::getConnexion();
        $inscription = $bdd->prepare('INSERT INTO user( email, pseudo, password) VALUES (?,?,sha1(?))');
        $inscription->execute(array($email, $identifiant, $mdp));
    }

    public static function getUserConnexion($id,$mdp){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where pseudo=? AND password=?");
        $reponse->execute(array($id,$mdp));
        $user = $reponse->fetchAll();
            if (empty($user[0])){
            return null;
        }
        else{
                $luser=$user[0];
                $userDTO = new UserDTO();
                $userDTO->setId($luser[0]);
                $userDTO->setEmail($luser[1]);
                $userDTO->setPseudo($luser[2]);
                $userDTO->setPassword($luser[3]);
                $userDTO->setArgent($luser[4]);
                $userDTO->setAdmin($luser[5]);
                return $userDTO;
        }
    }

    public static function getUserById($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where id=?");
        $reponse->execute(array($id));
        $user = $reponse->fetchAll();
        $tab = array();
        if (empty($user[0])){
            return null;
        }
        else{
            $luser=$user[0];
            $userDTO = new UserDTO();
            $userDTO->setId($luser[0]);
            $userDTO->setEmail($luser[1]);
            $userDTO->setPseudo($luser[2]);
            $userDTO->setPassword($luser[3]);
            $userDTO->setArgent($luser[4]);
            $userDTO->setAdmin($luser[5]);
            $tab[] = $userDTO;

            return $tab;
        }
    }

    public static function getAdminByIdUser($idUser){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT admin from user where id=?");
        $reponse->execute(array($idUser));
        $user = $reponse->fetchAll();
        if (empty($user[0]) || $user[0][0]==0){
            return false;
        }
        else
        {
            return true;
        }


    }

    public static function deleteUserById($id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("DELETE FROM user where id=?");
        $reponse->execute(array($id));

    }

    public static function UpdatePseudoById($pseudo,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE user SET pseudo=? where id=?");
        $reponse->execute(array($pseudo,$id));

    }

    public static function UpdateEmailById($email,$id){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE user SET email=? where id=?");
        $reponse->execute(array($email,$id));

    }

    public static function UpdateMdpById($id,$mdp){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("UPDATE user SET password=? where id=?");
        $reponse->execute(array($mdp,$id));

    }

    public static function getNbrUserAdmin() {
        // Récupérer le nombre d'enregistrements
        $bdd = DatabaseLinker::getConnexion();
        $count = $bdd->prepare('SELECT COUNT(id) AS cpt from user');
        $count->setFetchMode(PDO::FETCH_ASSOC);
        $count->execute();
        $tcount=$count->fetchAll();
        return $tcount;
    }

    public static function getUserByPageAdmin($debut, $nbr_elements_par_page) {
        //Récupérer les enregistrements eux-mêmes
        $bdd = DatabaseLinker::getConnexion();
        $sel=$bdd->query('SELECT id FROM user ORDER BY pseudo LIMIT '.$debut.','.$nbr_elements_par_page);
        $sel->setFetchMode(PDO::FETCH_ASSOC);
        $tab=$sel->fetchAll();

        foreach ($tab as $t)
        {
            $id =  $t['id'];
            ControllerAdmin::afficherUser($id);
        }

    }
}