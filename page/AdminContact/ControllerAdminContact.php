<?php
include_once ('DAO/MessageDAO.php');
include_once ('DTO/MessageDTO.php');

class ControllerAdminContact{

    public static function includeView()
    {
        include_once('AdminContact.php');
    }

    public static function insertCommentaire(){
        $mes=MessageDAO::getMessage();
        foreach ($mes as $messages){
            echo $messages->getTitre(),'<br>';
            echo $messages->getDate(),'<br>';
            echo $messages->getEmail(),'<br>';
            echo $messages->getContenu(),'<br>';

        }
    }




}