<?php

class ControllerInscription
{
    public static function includeView()
    {
        include_once("inscription.php");
    }

    public static function createAccount()
    {
        $user = new UserDTO();
        $user = UserDAO::getUser();
        $erreur=0;

        foreach ($user as $u)
        {
            if ($u->getPseudo() == $_POST['username'])
            {
                echo "Ce nom d'utilisateur est déjà utilisé";
                $erreur = 1;
                break;
            }

            elseif ($u->getEmail() == $_POST['email'])
            {
                echo "Cette email est déjà utilisé";
                $erreur = 1;
                break;
            }
        }

        if ($erreur == 0)
        {
            if ($_POST['password'] == $_POST['re_password']) {
                UserDAO::setUserAccount($_POST['email'], $_POST['username'], $_POST['password']);
                ControllerInscription::redirectUser();
            }

            else {
                echo "Les mot de passes de correspondent pas ";
            }
        }


    }


    public static function redirectUser()
    {
        header('Location: index.php?page=connexion');
    }

}