<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>BeerHappy</title>
</head>
<body>

<?php

    if (empty($_SESSION))
    {
        session_name("prestachopebdd4" );
        session_start();
    }

    include_once("tools/SuperController.php");

    $page = "interdit";

    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
    }

    SuperController::callPage($page);

?>



</body>
</html>