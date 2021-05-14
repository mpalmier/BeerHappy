<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_produits.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="content-area">
    <div class="wrapper">
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