<?php

session_start();

require_once("../config/config.php");


function validate_first_name(){
	if(isset($_POST['first_name'])){
		if(ctype_alpha($_POST['first_name'])){
			return $_POST['first_name'];
		}else{
			header("Location:index.php?err=fn&type=nonalpha");
			die();
		}
	}else{
		header("Location:index.php?err=fn&type=missing");
		die();
	}
}

function validate_last_name(){
	if(isset($_POST['last_name'])){
		if(ctype_alpha($_POST['last_name'])){
			return $_POST['last_name'];
		}else{
			header("Location:index.php?err=ln&type=nonalpha");
			die();
		}
	}else{
		header("Location:index.php?err=ln&type=missing");
		die();
	}	
}

function validate_email(){
	if(isset($_POST['email'])){
		return $_POST['email'];
	}else{
		header("Location:index.php?err=email&type=missing");
		die();
	}	
}

function validate_password(){
	if(isset($_POST['password']) && isset($_POST['password_retype'])){
		if($_POST['password'] == $_POST['password_retype']){
			if(strlen($_POST['password']) >= 6){
				return password_hash($_POST['password'], PASSWORD_DEFAULT);
			}else{
				header("Location:index.php?err=pass&type=short");
				die();
			}
		}else{
			header("Location:index.php?err=pass&type=match");
			die();
		}
	}else{
		header("Location:index.php?err=pass&type=missing");
		die();
	}	
}
	
function email_exists($db, $e){
	$val_email = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
	$val_email->bindParam(":email", $e);
	$val_email->execute();
	return $val_email->fetchColumn();
}
	
function create_account($db, $fn, $ln, $e, $p){
	$act = $db->prepare('INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES (:first_name, :last_name, :email, :pass, now())');
	$act->bindParam(":first_name", $fn);
	$act->bindParam(":last_name", $ln);
	$act->bindParam(":email", $e);
	$act->bindParam(":pass", $p);
	return $act->execute();
}
	
try {	
	$first_name = validate_first_name();
	$last_name = validate_last_name();
	$email = validate_email();
	$pass = validate_password();
			
	
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	if(email_exists($conn, $email) > 0){
		header("Location:index.php?err=email&type=exists");
		die();
	}else{
		if(create_account($conn, $first_name, $last_name, $email, $pass)){
			$account_id = $conn->lastInsertId('user-id');
			
			session_destroy();
			session_start();
			$_SESSION['user_id'] = $account_id;
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['email'] = $email;
			header("Location:/");
			die();			
		}else{
			header("Location:index.php?err=db");
			die();
		}
	}
}
catch(PDOException $e){
	header("Location:index.php?err=db");	
}

?>