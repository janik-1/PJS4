<?php

require ("./connect.php");

$return_arr = array();
$data1 =array();

$statement = $pdo->prepare("SELECT L.nom , L.adresse, L.lat , L.lng FROM note N, lieu L where N.inscrit =" + $_SESSION['id'] + " and N.lieu = L.id_lieu; " );
$statement->execute();
$data1= $statement->fetchAll( PDO::FETCH_ASSOC );

$return_array['liste'] = $data1;

echo "<script>console.log('Debug Objects: " . $return_array['liste'] . "' );</script>";
echo json_encode($return_array); 






?>
