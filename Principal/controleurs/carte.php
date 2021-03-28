<?php 

function lancercarte(){
 require ("./vues/carte.php");
}

function ajoutListe(){
    require ("./modeles/carte.php");
    AjoutFavori();
}

function listefav(){
    require("./modeles/listefav.php");
}

function carteAmi(){
    $id = $_SESSION["id"];
    require("./vues/carteAmi.php");
}

?>