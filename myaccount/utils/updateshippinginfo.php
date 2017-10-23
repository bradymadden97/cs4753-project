<?php

	session_start();
	
	require_once("../../config/config.php");
	
	
	if(!isset($_SESSION['user_id'])){
		echo 0;
		die();
	}
	
	if(!isset($_POST['address']) || !isset($_POST['city']) || !isset($_POST['state']) || !isset($_POST['zip'])){
		echo 0;
		die();
	}
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$ship = $conn->prepare("UPDATE users set address = :a, city = :c, state = :s, zip = :z WHERE user_id = :uid");
		$ship->bindParam(":uid", $_SESSION['user_id']);
		$ship->bindParam(":a", $_POST['address']);
		$ship->bindParam(":c", $_POST['city']);
		$ship->bindParam(":s", $_POST['state']);
		$ship->bindParam(":z", $_POST['zip']);
		
		$shipres = $ship->execute();
		
		echo $shipres;
		die();		
	}
	catch(PDOException $e){
		echo 0;
		die();
	}

?>