<?php
	session_start();
	
	require_once('../config/config.php');
	
	try {
		if(!isset($_POST['email'])){
			header("Location:index.php?err=email&type=missing");
			die();
		}
		
		if(!isset($_POST['pass'])){
			header("Location:index.php?err=pass&type=missing");
			die();
		}
		
		$db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $db->prepare("SELECT COUNT(*), user_id, first_name, last_name, email FROM users WHERE email = :email AND pass = :pass");
		$stmt->bindParam(":email", $_POST['email']);
		$stmt->bindParam(":pass", password_hash($_POST['pass'], PASSWORD_DEFAULT));
		$stmt->execute();
		
		$res = $stmt->fetch();
		
		if($res['COUNT(*)'] != 1){
			header("Location:index.php?err=invalid");
			die();
		}else{
			$stmt = $db->prepare("UPDATE users SET last_login = now() WHERE email = :email");
			$stmt->bindParam(":email"), $_POST['email']);
			$stmt->execute();
			
			session_destroy();
			session_start();
			
			$_SESSION['user_id'] = $res['user_id'];
			$_SESSION['first_name'] = $res['first_name'];
			$_SESSION['last_name'] = $res['last_name'];
			$_SESSION['email'] = $res['email'];
			
			header("Location:/myaccount");
			die();			
		}
	} catch(PDOException $e) {
		header("Location:index.php?err=db");
		die();
	}
?>