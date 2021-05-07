<?php

class ControllerProfile
{
    public static function includeView()
    {
        include_once("profile.php");
    }

    public static function afficherProfile()
    {
        $info=new UserDTO();
        $info=UserDAO::getProduitByCategorie($_GET['id']);
        foreach ($info as $if)
        {
            echo '<br>
                <a href="index.php?page=details&id='.$if->getId().'">'.$if->getNom().'</a>
                <img src="'.$if->getPhoto().'">';

        }

    }
}