<?php
session_start();

require ("../connect.php");

$return_array = array();
$data1 =array();

$statement = $pdo->prepare("SELECT * from lieu; " );
$statement->execute();
$data1= $statement->fetchAll( PDO::FETCH_ASSOC );

$return_array["liste"] = $data1;

echo json_encode($return_array); 






?>
