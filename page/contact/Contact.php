<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_contact.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <div class="form_contact">
            <p>Formulaire de contact</p>
            <form method="post" action="">
                <input type="text" name="titre" placeholder="Titre message">
                <textarea name="message" placeholder="Votre message"></textarea>
                <?php

                if (isset($_SESSION['id']))
                {
                    echo '<div class="launch"><input type="submit" value="Envoyer"></div>';
                }
                else {
                    echo '<p>Connectez vous pour envoyer un message</p>';
                }
                ?>
            </form>

            <?php

            if (isset($_GET['r'])) {
                if (isset($_GET['r'])) {
                    if ($_GET['r'] == 1) {
                        echo '<div class="error">Vous n\'avez pas remplit toute les cases</div>';
                    }
                }
            }

            ?>

        </div>

        <?php

        ControllerContact::getFormContact();

        ?>
    </div>


</body>
</html>