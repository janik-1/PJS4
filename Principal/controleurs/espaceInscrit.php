<?php 
function affEspace(){
    require ("./modeles/espaceInscrit.php");
    $stmtAmiA=getAmisPartA();
    $stmtAmiB=getAmisPartB();
    $stmtDem=getDem();

    require ("./vues/espaceInscrit.php");
}

function InvitAmi(){
    $s ="";
    require ("./modeles/espaceInscrit.php");
    if (InviterAmi()){
        $s= "Votre invitation à été envoyé";
    }
    else{
        $s= "Votre invitation n'a pas pu aboutir";
    }
}

function accepterDem(){
    require ("./modeles/espaceInscrit.php");
    actionsDem();
}

?>