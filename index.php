<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>BeerHappy</title>
</head>
<body>

<?php
include_once("tools/SuperController.php");
include_once("page/interdiction/ControllerInterdiction.php");
$page = "interdit";

if(!empty($_GET['page'])) {
    $page = $_GET['page'];
}

SuperController::callPage($page);
?>

</body>
</html>