<?php

class ProduitDAO {

    public static function getProduit() {
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
}