<?php
class ControllerInterdiction{
    public static function includeView(){
        include("interdiction.php");
    }
    public static function isConnected(){
        if (isset($_SESSION['pseudo'])){
            return true;
        }
        else{
            return false;
        }
    }
}