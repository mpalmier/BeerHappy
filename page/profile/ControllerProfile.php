<?php

class ControllerProfile
{
    public static function includeView()
    {
        include_once("profile.php");
    }

    public static function afficherProfile()
    {
        $users = UserDAO::getUser();
        foreach ($users as $user){
            echo '<br>'.$user->getEmail().'<br>';
            echo $user->getPseudo().'<br>';
            $adresse=AdresseDAO::getAdresseByIdUser($user->getId());
            if (!empty($adresse)) {
                echo $adresse->getVille() . '<br>';
                echo $adresse->getAdresseLigne() . '<br>';
                echo $adresse->getCodePostal() . '<br>';
                echo $adresse->getTelephone() . '<br>';
            }

    }
}