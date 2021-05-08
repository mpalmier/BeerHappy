<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fixed Header with html and css | Collapsing Header Tutorial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style_header.css">
</head>
<body>
<div class="box-area">
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="#">BeerHappy</a>
            </div>
            <nav>
                <a href="index.php?page=accueil">Accueil</a>
                <a href="index.php?page=carte">Cartes</a>
                <a href="index.php?page=contact">Contact</a>
                <?php
                if (!isset($_SESSION['id']))
                {
                    if (!isset($_SESSION['id']))
                    {
                        echo "<a href='index.php?page=connexion'>Connectez-vous</a>";
                    }
                }

                if (isset($_SESSION['id']))
                {
                    if (ControllerAdmin::isAdmin($_SESSION['id']) == true)
                    {
                        echo "<a href='index.php?page=admin'>Admin</a>";
                    }
                }

                if (isset($_SESSION['id']))
                {
                    if (isset($_SESSION['id']))
                    {
                        echo "<a href='index.php?page=deconnexion'>Déconnexion</a>";
                    }
                }

                if (isset($_SESSION['panier']))
                {
                    if (isset($_SESSION['panier']))
                    {
                        $qte = 0;
                        foreach ($_SESSION['panier'] as $key => $value)
                        {
                            $qte += $value[1];
                        }

                        echo "<a id='nbr' href='index.php?page=panier'><img src='assets/images/caddie.svg'> $qte </img></a>";
                    }
                }

                ?>
            </nav>
        </div>
    </header>
    <?php

    if ($_GET['page'] != 'connexion')
    {
        if ($_GET['page'] != 'inscription')
        {
            echo '
            <div class="banner-area">
                <h2>PrestaChope</h2>
            </div>';
        }

    }

    ?>
</div>

<section class="banner"></section>
<script type="text/javascript">
    window.addEventListener("scroll" function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>

</body>
</html>

