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
    
    
    public static function getUserById($id,$mdp){
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
}