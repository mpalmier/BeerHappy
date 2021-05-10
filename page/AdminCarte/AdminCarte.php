<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">

        <h1> Ajouter une catégorie </h1>
        <form action=index.php?page=AddCategorie method='post'> <input type=text name=nom> <input value='Ajouter' type='submit' > </form><br>
        <?php
        AdminCarteController::afficherCategorie();
        ?>
    </div>
</div>
</body>
</html>

