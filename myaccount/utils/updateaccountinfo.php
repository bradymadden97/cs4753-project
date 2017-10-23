<?php

	session_start();
	
	require_once("../../config/config.php");
	
	
	if(!isset($_SESSION['user_id'])){
		echo 0;
		die();
	}
	
	if(!isset($_POST['first_name']) || !isset($_POST['last_name'])){
		echo 0;
		die();
	}
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$actinfo = $conn->prepare("UPDATE users SET first_name = :fn, last_name = :ln WHERE user_id = :uid");
		$actinfo->bindParam(":fn", $_POST['first_name']);
		$actinfo->bindParam(":ln", $_POST['last_name']);
		$actinfo->bindParam(":uid", $_SESSION['user_id']);
		$result = $actinfo->execute();
		
		echo $result;
		die();
		
				
	}
	catch(PDOException $e){
		echo 0;
		die();
	}

?>