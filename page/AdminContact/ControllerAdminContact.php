<?php
include_once ('DAO/MessageDAO.php');
include_once ('DTO/MessageDTO.php');

class ControllerAdminContact{

    public static function includeView()
    {
        include_once('AdminContact.php');
    }
}