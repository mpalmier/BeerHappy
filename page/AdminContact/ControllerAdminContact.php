<?php
include_once ('DAO/MessageDAO.php');
include_once ('DTO/MessageDTO.php');
include_once ('DAO/UserDAO.php');
include_once ('DTO/UserDTO.php');

class ControllerAdminContact{

    public static function includeView()
    {
        include_once('AdminContact.php');
    }

    public static function insertCommentaireById($id){
        $mes=MessageDAO::getMessageById($id);

        foreach ($mes as $messages){
            echo '<div class="block_contact">';
            echo '<div class="titre">Titre : '.$messages->getTitre().'</div>';
            echo '<div class="contenu">'.$messages->getContenu().'</div>';
            $user = UserDAO::getUserById($messages->getIdUser());

            foreach ($user as $us) {
                echo '<div class="user">De '.$us->getPseudo().' envoyé le '.$messages->getDate().'</div>';

                echo '<div class="mail"><a href="mailto:'.$us->getEmail().'">Répondre</a></div>';
            }

            echo '</div>';
        }
    }




}