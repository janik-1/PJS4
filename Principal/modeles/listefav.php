<?php
session_start();

function ajaxlist(){
    require ("./connect.php");
    echo("console.log");
    $return_array = array();
    $data1 =array();

    //$statement = $pdo->prepare("SELECT * FROM note N, lieu L where N.inscrit =" . $_SESSION['id'] . "and N.lieu = L.id_lieu;" );
    //  $statement = $pdo->prepare("SELECT * FROM note, lieu where inscrit= 1 and lieu=id_lieu" );
    $statement = $pdo->prepare("SELECT * FROM note, lieu where inscrit=" . $id . "and lieu=id_lieu" );
    //$statement = $pdo->prepare("SELECT * FROM inscrit" );

    $statement->execute();
    $data1= $statement->fetchAll( PDO::FETCH_ASSOC );

    $return_array["liste"] = $data1;

    echo json_encode($return_array); 

}

?>