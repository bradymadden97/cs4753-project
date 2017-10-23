<?php

	session_start();
	
	require_once("../../config/config.php");
	
	
	if(!isset($_SESSION['user_id'])){
		echo 0;
		die();
	}
	
	if(!isset($_POST['current_password']) || !isset($_POST['new_password']) || !isset($_POST['new_password_retype'])){
		echo 0;
		die();
	}
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$pw = $conn->prepare("SELECT pass FROM users WHERE user_id = :uid");
		$pw->bindParam(":uid", $_SESSION['user_id']);
		$pw->execute();
		
		$pw_res = $pw->fetch();
		
		$isCurrentPassword = password_verify($_POST['current_password'], $pw_res[0]);
		
		if(!$isCurrentPassword){
			echo 1;
			die();
		}
		
		
		$updatepw = $conn->prepare("UPDATE users set pass = :new_pass WHERE user_id = :uid");
		$updatepw->bindParam(":new_pass", password_hash($_POST['new_password'], PASSWORD_DEFAULT));
		$updatepw->bindParam(":uid", $_SESSION['user_id']);
		$pwres = $updatepw->execute();
		
		if($pwres == 1){
			echo 2;
			die();
		}else{
			echo 0;
			die();
		}				
	}
	catch(PDOException $e){
		echo 0;
		die();
	}

?>