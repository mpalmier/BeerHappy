<?php

include_once('DAO/MessageDAO.php');
include_once('DTO/MessageDTO.php');

class ControllerContact
{
    public static function insertView()
    {
        include_once("contact.php");
    }

    public static function getFormContact() {

        if(isset($_POST['message']) || isset($_POST['titre']))
        {
            if(!empty($_POST['message']) || !empty($_POST['titre']))
            {
                header('Location:index.php?page=contactLaunch&msg='.$_POST['message'].'&titre='.$_POST['titre'].'');
            }
            else {
                header('Location: index.php?page=contact&r=1');
            }
        }
    }

    public static function getFormLaunchContact() {
        MessageDAO::setMessageContact($_GET['msg'],$_GET['titre']);
        ControllerContact::redirectUser();
    }

    public static function redirectUser() {
        header('Location: index.php?page=contact');
    }
}
