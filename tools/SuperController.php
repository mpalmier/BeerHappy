<?php

class SuperController
{
    public static function callPage($page)
    {
        switch($page)
        {
            case "interdit" :
                $instanceController = new ControllerInterdiction();
                if ($instanceController->isConnected()==false) {
                    $instanceController->includeView();
                }
                break;
        }
    }
}
