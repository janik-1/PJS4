<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte | MIAP</title>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin="" />
    <!-- Bibliothèque Javascript Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <!-- Javascript Material Design -->
    <script type="text/javascript" src="./vues/js/carte.js"></script>
    <link rel="stylesheet" href="./vues/css/styleLogin.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"> <a href="index.html">Miap</a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                            <ul class="menu-area-main">
                                <li> <a href="./blog.html"> Blog</a> </li>
                                <li> <a href="./equipe.html">L'équipe</a> </li>
                                <li> <a href="./aide.html">Contactez-nous</a> </li>
                                <li>
                                    <form name="x" action="./index.php?controle=connexion&action=connexion" method="post">
                                        <button type="submit" class="btn-link nav-link">Se Connecter</button>
                                    </form>                    
                                </li>
                                <li>
                                    <form name="x" action="./index.php?controle=inscription&action=affins" method="post">
                                        <button type="submit" class="btn-link nav-link">Inscription</button>
                                    </form> 
                                </li>  
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner --> 
    </header>
    <div class="containerCarte">
        <div class="contenu">
        <input type="search" id="recherche" name="restaurant">
             <button id = "search">Rechercher</button>

        <div id="mapid"></div>
        </div>
    
        




    </div>

</body>
</html>