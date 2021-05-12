<?php
include_once('DAO/UserDAO.php');
include_once('DTO/UserDTO.php');
include_once('DAO/CategorieDAO.php');
include_once('DTO/CategorieDTO.php');
include_once('DAO/AdresseDAO.php');
include_once('DTO/AdresseDTO.php');

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
            echo '<tr><td>'.$user->getPseudo().'</td>';
            echo '<td>'.$user->getEmail().'</td>';
            $adresse=AdresseDAO::getAdresseByIdUser($user->getId());
            if (!empty($adresse)) {
                echo '<td>'.$adresse->getPrenom().'</td>';
                echo '<td>'.$adresse->getNom().'</td>';
                echo '<td>'.$adresse->getVille().'</td>';
                echo '<td>'.$adresse->getAdresseLigne().'</td>';
                echo '<td>'.$adresse->getCodePostal().'</td>';
                echo '<td>'.$adresse->getTelephone().'</td>';
            }
            echo '<td><a href="index.php?page=deleteAdmin&id='.$user->getId().'">Supprimer</a></td></tr>';

        }
    }

    public static function redirectUser(){
        header("location:index.php?page=admin");
    }
}