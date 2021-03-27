<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vues/css/styleLogin.css">
    <link rel="stylesheet" type="text/css" href="./vues/css/phone.css" media="only screen and (max-width: 767px)" />
    <title>Inscription</title>
</head>
<body>
    <a href="#"><img src="./vues/img/logo2.png" alt="miap" class=" img-fluid logo"></a>
    <div class="espace"></div>
    <div class="centre">
        <div class="connect sm-col-12">
            <span class="Hdl"> Inscription </span>
            <form action="index.php?controle=inscription&action=affmodele" method="post">
                </br>
                Nom     <br/>
                <input 	name="nom" 	type="text" 
                        value= " " />			 
                <br/><br/>			
                Adresse E-mail     <br/>
                <input 	name="mail" 	type="text" 
                        value= " " />			 
                <br/><br/>
                Mot de passe (6 caractères minimum)<br/>
                <input 	type="password" 	name="mdp"
                        value= " " />             <br/><br/>					
                <input type= "submit"  value="S'inscrire" >   
            </form> <br>
            <?php
                if($errins==1){
                    echo("Vos champs sont mal remplis <br>");
                }
            ?> 
            <hr>           
            <span class="pt-3"> Vous avez déjà un compte ? </span> <br>
            <form name="x" action="index.php?controle=connexion&action=connexion" method="post">
                <button type="submit" class="btn-link nav-link">Connectez vous</button>
            </form> 
            <!-- <a href="./Connexion.php"> Connectez-vous ! </a> -->
            <br> <hr>
            <span>
                <a href="./index.html">Retour à l'accueil</a>
            </span>
        </div>    
    </div>

</body>
</html>