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
        $info=UserDAO::getUserById($_SESSION['id']);
        foreach ($info as $if)
        {
            echo '<br>',
                    $if->getPseudo(),
                    $if->getPassword(),
                    $if->getEmail();

        }

    }
}