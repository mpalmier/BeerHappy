<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_profil.css">

</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <div class="block_profil">
            <p>Vos informations :</p>
            <?php

                ControllerProfile::afficherProfile();

                if (isset($_GET['r'])) {
                    if (isset($_GET['r'])) {
                        if ($_GET['r'] == 1) {
                            echo 'Les deux mot de passe ne correcpondent pas';
                        }
                        elseif ($_GET['r'] == 2) {
                            echo 'Mot de passe incorect';
                        }
                    }
                }

            ?>
        </div>
</body>
</html>
