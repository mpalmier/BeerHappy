<?php

echo "Id du Users : ".$_SESSION['id'].'<br>';

ControllerCarte::afficherCategorie();

if (isset($_SESSION['id'])) {
    if (ControllerAdmin::isAdmin($_SESSION['id']) == true) {
        echo "<a href='index.php?page=admin'><p> Admin</p></a>";
    }
}

