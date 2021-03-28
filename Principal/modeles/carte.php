<?php
session_start();

function AjoutFavori(){
	$nom =  isset($_POST['infoNom'])?($_POST['infoNom']):'';
    $adresse =  isset($_POST['infoAdresse'])?($_POST['infoAdresse']):'';
	$long = isset($_POST['infoLongi'])?($_POST['infoLongi']):'';
	$lat = isset($_POST['infoLati'])?($_POST['infoLati']):'';
	$id_ins = $_SESSION['id'];
	echo($nom);
	echo($id_ins);
	echo($lat);
	echo($adresse);
	if (!checkLieuExistant($nom,$adresse)){
		echo("sasa");
		ajouterlieu($nom, $adresse, $long, $lat);
	}
	$id_lieu = getIdLieu($nom, $adresse);
	echo("gefe");
	if (checkNoteExistant($id_lieu, $id_ins)){
		echo("asz");
		return false;
	}
	else {
		echo("zasa");
		ajoutFavReq($id_lieu, $id_ins);
		return true;
	}
	
}

function checkLieuExistant($nom, $adresse){
	require ("./connect.php");
	$requete = "SELECT * FROM lieu";
    try {
        $stmt = $pdo->query($requete);
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die(); // On arrête tout.
    }	

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :  
		if ($row['nom'] == $nom  and $row['adresse'] == trim($adresse)) :
			return true;
		endif;
	endwhile;
	return false;
}

function getIdLieu($nom, $adresse){
	require ("./connect.php");
	$requete = "SELECT * FROM lieu";
    try {
        $stmt = $pdo->query($requete);
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die(); // On arrête tout.
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :  
		if ($row['nom'] == $nom  and $row['adresse'] == trim($adresse)) :
			return $row['id_lieu'];
		endif;
	endwhile;
	return null;
}

function ajouterlieu($nom, $adresse, $long, $lat) {
    require ("./connect.php");
	$sql="INSERT INTO lieu (nom,adresse, lng, lat) VALUES (:nom, :adresse, :long, :lat)"; 
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nom', $nom, PDO::PARAM_STR);
		$commande->bindParam(':adresse', $adresse, PDO::PARAM_STR);
		$commande->bindParam(':long', $long, PDO::PARAM_STR);
		$commande->bindParam(':lat', $lat, PDO::PARAM_STR);
		$commande->execute();		
		return true;
	}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function ajoutFavReq($id_lieu, $id_ins){
	require ("./connect.php");
	$sql="INSERT INTO note (id_lieu,id_ins,favoris) VALUES (:id_lieu, :id_ins, 'O')"; 
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id_lieu', $id_lieu, PDO::PARAM_STR);
		$commande->bindParam(':id_ins', $id_ins, PDO::PARAM_STR);
		$commande->execute();		
		return true;
	}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function checkNoteExistant($id_lieu, $id_ins){
	require ("./connect.php");
	$requete = "SELECT * FROM note";
    try {
        $stmt = $pdo->query($requete);
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die(); // On arrête tout.
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :  
		if ($row['id_lieu'] == $id_lieu  and $row['id_ins'] == trim($id_ins)) :
			return true;
		endif;
	endwhile;
	return false;
}

?>