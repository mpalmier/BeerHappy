<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_css_commun.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_commande.css">
</head>
<body>
<div class="content-area">
    <div class="wrapper">
        <div class="block_commande">
            <p>Prix total de votre commande : <?php echo $_SESSION['prix']; ?> €</p>
            <p>Vous avez : <?php echo ControllerCommande::argentUserById($_SESSION['id']); ?> € sur votre comtpe</p>
            <p>Il vous restera : <?php ControllerCommande::argentUserByIdMoins($_SESSION['id']); ?> € après la transaction effectué</p>
            <div class="buttonYes">
                <div class="add"><a href="index.php?page=finishCommande"><span></span><span></span><span></span><span></span>Finir la transaction</a></div>
            </div>
            <div class="retour"><a href="index.php?page=panier">Retour</a></div>
        </div>







