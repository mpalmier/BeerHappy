<?php

class ControllerAdmin{
    public static function isAdmin(){
        if (isset($_SESSION['id'])){
            $user= new UserDTO();
            $user=UserDAO::getAdminByIdUser($_SESSION['id']);
            if ($user==true){
                return true;
            }
            else{
                return false;
            }




        }
    }
    public static function insertView(){
        if (isset($_SESSION['id'])) {
            include_once("admin.php");
        }
        else{
            header('Location: index.php?page=carte');
        }
    }

    public static function afficherUser(){
        $users=new UserDTO();
        $users=UserDAO::getUser();
        $adresse=new AdresseDTO();

        foreach ($users as $user){
            echo '<br>'.$user->getEmail().'<br>';
            echo $user->getPseudo().'<br>';
            $adresse=AdresseDAO::getAdresseByIdUser($user->getId());
            echo $adresse->getVille().'<br>';
            echo $adresse->getAdresseLigne().'<br>';
            echo $adresse->getCodePostal().'<br>';
            echo $adresse->getTelephone().'<br>';
            echo '<a href="index.php?page=delete?id='.$user->getId().'">Supprimer</a>';

        }
    }

    public static function redirectUser(){
        header("location:index.php?page=admin");
    }
}