<?php

AdresseDAO::deleteAdresseById($_GET[id]);
UserDao::deleteUserById($_GET[id]);
header('Location: index.php?page=admin');