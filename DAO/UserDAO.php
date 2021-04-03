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
                    $tab[]=$userDTO; 
		}
                
            return $tab;
        }
    }
    
    
    public static function getUserById($id,$mdp){
        $bdd = DatabaseLinker::getConnexion();
        $reponse = $bdd->prepare("SELECT * from user where pseudo=? and mdp=?");
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
                return $userDTO;
            }
    }
}