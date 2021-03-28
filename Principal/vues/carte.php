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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlx5BQ52Nb7AAACUxLJ8ioc4Ht3syAwgU&libraries=places"></script>
    <!-- Javascript Material Design -->
    <script type="text/javascript" src="./vues/js/carte.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./vues/css/styleLogin.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
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
    <div class="container contenu">
        <div class="row">
            <div class="col-sm pb-5">
                <input type="search" id="recherche" name="restaurant">
                <button id = "search">Rechercher</button>

                <div id="locationField">
                <input
                    id="autocomplete"
                    placeholder="Enter your address"
                    type="text"/>
                </div>

        
                <form action="./index.php?controle=carte&action=ajoutListe" method="post" id="ajoutEtaForm">
                    <div id="infosEta">
                        Nom : <input type="text" id="infoNom" name="infoNom" value=" " readonly> <br> 
                        Adresse : <input type="text" id="infoAdresse" name="infoAdresse" value=" " readonly> <br>
                    </div>
                    <div id="longlat">
                        <input type="text" id="infoLongi" name="infoLongi" value=" " readonly>
                        <input type="text" id="infoLati" name="infoLati" value=" " readonly>  
                    </div>
                    <button type="submit" class="btn-link nav-link" id="ajoutEtaBtn" >Ajoutez cet établissment à votre liste</button>
                </form>
            </div>
            <div class="col-sm">
                <p>du txt</p>
            </div>
        </div>
        
       
        <div class="containerCarte ">
            <div id="mapid" class="md-col-12"></div>
        </div>
        
    </div>

    

</body>
</html>