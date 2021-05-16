<?php
include_once('DAO/UserDAO.php');
include_once ('DTO/UserDTO.php');
include_once('DAO/AdresseDAO.php');
include_once('DTO/AdresseDTO.php');

class ControllerProfile
{


    public static function includeView()
    {
        include_once("profile.php");
    }

    public static function afficherProfile()
    {
        $users = UserDAO::getUserById($_SESSION['id']);
        foreach ($users as $user){
            echo '<div class="block_profiluser">';
            echo '<div class="block_sous_profil">Votre pseudo : '.$user->getPseudo()."<form method=post action='index.php?page=ModifierPseudo&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='pseudo'>"."<input type='submit' name='submit' value='Modifier'></form></div>";


            echo 'Votre Email : '.$user->getEmail()."<form method=post action='index.php?page=ModifierMail&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='email' name='email'>"."<input type='submit' name='submit' value='Modifier'></form>";

            echo "Votre Mot de passe : ".$user->getPassword()."<form method=post action='index.php?page=ModifierMdp' enctype='multipart/form-data' >
            <input type='password' name='password1'>".'  '."<input type='password' name='password2'>".'  '."<input type='password' name='password3'>"."<input type='submit' name='submit' value='Modifier'></form>";
            echo '</div>';

            echo '<p>Votre Adresse :</p>';

            $adresse = AdresseDAO::getAdresseByIdUser($user->getId());

            if (!empty($adresse)) {

                echo '<div class="block_profiladresse">';

                echo "Votre Ville : ".$adresse->getVille() ."<form method=post action='index.php?page=ModifierVille&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='ville'>"."<input type='submit' name='submit' value='Modifier'></form>";

                echo "Votre adresse de Ligne : ".$adresse->getAdresseLigne() . "<form method=post action='index.php?page=ModifierAdresse&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='adresse'>"."<input type='submit' name='submit' value='Modifier'></form>";

                echo "Votre Code Postal : ".$adresse->getCodePostal() . "<form method=post action='index.php?page=ModifierCode&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='code'>"."<input type='submit' name='submit' value='Modifier'></form>";

                echo 'Votre numéro de Télèphone : '.$adresse->getTelephone() . "<form method=post action='index.php?page=ModifierTel&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='tel'>"."<input type='submit' name='submit' value='Modifier'></form>";

                echo '</div>';


            } else {
                echo '<br>'."<form method=post action='index.php?page=newAdresse' enctype='multipart/form-data' >".
                "nom :"."<input type='text' name='nom'>" . '<br>'.
                "prenom :"."<input type='text' name='prenom'>" . '<br>'.
                "Ville :"."<input type='text' name='ville'>" . '<br>'.
                "Adresse :"."<input type='text' name='adresse_ligne'>" . '<br>'.
                "Code Postal :"."<input type='text' name='postal'>" . '<br>'.
                "Téléphone :"."<input type='text' name='tel'>" . '<br>'.
                "<input type='submit' name='submit' value='Modifier'></form>";

        }
    }
}
    public static function redirectUser(){
        header("Location:index.php?page=profile");
    }

    public static function getVerifMdp($mdp,$mdp1,$mdp2) {
        if(!empty($mdp)) {
            $user = UserDAO::getUserById($_SESSION['id']);

            foreach ($user as $u) {
                if ($mdp == $u->getPassword()) {
                    if ($mdp1 == $mdp2) {
                        UserDAO::UpdateMdpById($_SESSION['id'],$mdp1);
                    }
                    else {
                        header('Location:index.php?page=profile&r=1');
                    }
                }
                else {
                    header('Location:index.php?page=profile&r=2');
                }
            }
        }
    }
}
