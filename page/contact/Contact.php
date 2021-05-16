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
            <h2>Formulaire de contact</h2>
            <form method="post" action="">
                <input type="text" name="titre" placeholder="Titre message">
                <textarea name="message" placeholder="Votre message"></textarea>
                <?php

                if (isset($_SESSION['id']))
                {
                    echo '<input id="launch" type="submit" value="Envoyer">';
                }
                else {
                    echo '<p>Connectez vous pour envoyer un message</p>';
                }
                ?>
            </form>
        </div>

        <?php

        ControllerContact::getFormContact();

        ?>
    </div>


</body>
</html>