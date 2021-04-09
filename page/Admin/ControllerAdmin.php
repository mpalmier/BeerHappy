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
        foreach ($users as $user){
            echo $user->getPseudo();
            echo $user->getAdresse();
            echo '<BR>';

        }
    }
}