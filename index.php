<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>BeerHappy</title>
</head>
<body>

<?php
session_start('prestachopebdd4');
include_once("tools/SuperController.php");
session_start();
$page = "interdit";

if(!empty($_GET['page'])) {
    $page = $_GET['page'];
}

SuperController::callPage($page);
?>

</body>
</html>