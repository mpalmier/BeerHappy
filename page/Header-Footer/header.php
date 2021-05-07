<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style_header.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Logo</a>
        <ul>
            <li><a href="index.php?page=accueil">Accueil</a></li>
            <li><a href="index.php?page=carte">Cartes</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
            <?php
            if (!isset($_SESSION['id']))
            {
                if (!isset($_SESSION['id']))
                {
                    echo "<li><a href='index.php?page=connexion'>Connectez-vous</a></li>";
                }
            }

            if (isset($_SESSION['id']))
            {
                if (ControllerAdmin::isAdmin($_SESSION['id']) == true)
                {
                    echo "<li><a href='index.php?page=admin'>Admin</a></li>";
                }
            }

            if (isset($_SESSION['id']))
            {
                if (isset($_SESSION['id']))
                {
                    echo "<li><a href='index.php?page=deconnexion'>Déconnexion</a></li>";
                }
            }

            if (isset($_SESSION['panier']))
            {
                if (isset($_SESSION['panier']))
                {
                    foreach ($_SESSION['panier'] as $key => $value)
                    {
                        echo "<li><a href='index.php?page=panier'>Panier : $value[1] </a></li>";
                    }
                }
            }
            ?>

        </ul>
    </header>
    <section class="banner"></section>
    <script type="text/javascript">
        window.addEventListener("scroll" function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>
</html>
