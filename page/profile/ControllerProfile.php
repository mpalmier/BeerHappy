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
            <input type='text' name='pseudo' placeholder='Votre pseudo'><br>"."<input class='envoyer' type='submit' name='submit' value='Modifier'></form></div>";

            echo 'Votre Email : '.$user->getEmail()."<form method=post action='index.php?page=ModifierMail&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='email' name='email' placeholder='Votre email'><br>"."<input class='envoyer' type='submit' name='submit' value='Modifier'></form>";

            echo "Votre Mot de passe : ".$user->getPassword()."<form method=post action='index.php?page=ModifierMdp' enctype='multipart/form-data' >
            <input type='password' name='password1' placeholder='Votre ancien mot de passe'>".'  '."<input type='password' placeholder='Votre nouveau mot de passe' name='password2'>".'  '."<input type='password' placeholder='Répéter votre mot de passe' name='password3'><br>"."<input class='envoyer' type='submit' name='submit' value='Modifier'></form>";
            echo '</div>';

            echo '<p>Votre Adresse :</p>';

            $adresse = AdresseDAO::getAdresseByIdUser($user->getId());

            if (!empty($adresse)) {

                echo '<div class="block_profiladresse">';

                echo "Votre Ville : ".$adresse->getVille() ."<form method=post action='index.php?page=ModifierVille&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='ville' placeholder='Votre ville'>"."<br><input class='envoyer' type='submit' name='submit' value='Modifier'></form>";

                echo "Votre adresse de Ligne : ".$adresse->getAdresseLigne() . "<form method=post action='index.php?page=ModifierAdresse&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='adresse' placeholder='Votre adresse de ligne'><br>"."<input class='envoyer' type='submit' name='submit' value='Modifier'></form>";

                echo "Votre Code Postal : ".$adresse->getCodePostal() . "<form method=post action='index.php?page=ModifierCode&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='code' placeholder='Votre code postal'>"."<br><input class='envoyer' type='submit' name='submit' value='Modifier'></form>";

                echo 'Votre numéro de Télèphone : 0'.$adresse->getTelephone() . "<form method=post action='index.php?page=ModifierTel&id=" . $_SESSION['id'] . "' enctype='multipart/form-data' >
            <input type='text' name='tel' placeholder='Votre numéro de téléphone'>"."<br><input class='envoyer' type='submit' name='submit' value='Modifier'></form>";

                echo '</div>';


            } else {
                echo '<div class="block_profiladresse">';
                echo '<br>'."<form method=post action='index.php?page=newAdresse' enctype='multipart/form-data' >".
                "Nom :"."<br><input type='text' placeholder='Votre nom' name='nom'>" . '<br>'.
                "Prenom :"."<br><input type='text' placeholder='Votre prenom' name='prenom'>" . '<br>'.
                "Ville :"."<br><input type='text' placeholder='Votre ville' name='ville'>" . '<br>'.
                "Adresse :"."<br><input type='text' placeholder='Votre adresse de ligne' name='adresse_ligne'>" . '<br>'.
                "Code Postal :"."<br><input type='text' placeholder='Votre code postal' name='postal'>" . '<br>'.
                "Téléphone :"."<br><input type='text' placeholder='Votre numéro de téléphone' name='tel'>" . '<br>'.
                "<input class='envoyer' type='submit' name='submit' value='Modifier'></form>";
                echo '</div>';

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
        else {
            header('Location:index.php?page=profile&r=3');
        }
    }
}
