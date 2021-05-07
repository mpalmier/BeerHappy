<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
    <body>
        <?php
            foreach ($var as $vars)
            {
                echo $vars['pseudo'] , $vars ['content'], $var['date'];
            }
        ?>
        <h2>Formulaire de contact</h2>
        <form method="post" action="Contact.php">
            <input type="text" name="nom" placeholder="Votre nom">
            <input type="mail" name="mail" placeholder="Votre email">
            <textarea name="message" placeholder="Votre message"></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>