<?php

class UserDAO{
    public static function getUser() {
    $bdd = DatabaseLinker::getConnexion();
	$reponse = $bdd->prepare("SELECT * from user");
	$reponse->execute();
	$user = $reponse->fetchAll();
	$tab=Array(); 
	if (empty($user[0])){
		return null;
	}
	else{
		foreach ($user as $users) {
                    $userDTO = new UserDTO();
                    $userDTO->setIdUser($users[0]);
                    $userDTO->setPseudo($users[1]);
                    $userDTO->setMdp($users[2]);
                    $userDTO->setArgent($users[3]);
                    $userDTO->setAdresse($users[4]);
                    $userDTO->setAdmin($users[5]);
                    $tab[]=$userDTO; 
		}
                
            return $tab;
        }
    }
    
    
    public static function getUserById($id,$mdp){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where pseudo=? AND mdp=?");
        $reponse->execute(array($id,$mdp));
        $user = $reponse->fetchAll();
            if (empty($user[0])){
            return null;
        }
        else{
                $luser=$user[0];
                $userDTO = new UserDTO();
                $userDTO->setIdUser($luser[0]);
                $userDTO->setPseudo($luser[1]);
                $userDTO->setMdp($luser[2]);
                $userDTO->setArgent($luser[3]);
                $userDTO->setAdresse($luser[4]);
                $userDTO->setAdmin($luser[5]);
                return $userDTO;
        }
    }

    public static function getAdminByIdUser($idUser){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT admin from user where id_user=?");
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
}