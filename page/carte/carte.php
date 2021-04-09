<?php

session_start();
echo "Id du Users : ".$_SESSION['id'];


if (isset($_SESSION['id'])) {
    if (ControllerAdmin::isAdmin($_SESSION['id']) == true) {
        echo "<a href='index.php?page=admin'><p> Admin</p></a>";
    }
} else {
    echo 'PROUT';
}
