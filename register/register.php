<?php

/*
This persists $_SESSION variables across multiple pages.
We will use $_SESSION variables to keep track of who a user is once they've logged in.
*/
session_start();

//Includes database connection variables 
require_once("../config/config.php");

//Validate input fields server side is more secure. Cannot rely on client-side validation.
function validate_first_name(){
	if(isset($_POST['first_name'])){
		if(ctype_alpha($_POST['first_name'])){
			return $_POST['first_name'];
		}else{
			//header("Location: ... ") is used to redirect page
			//It is good to put die(); afterwards to end register.php script from continuing to run
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
	
//Check if email already exists as a user by getting COUNT of number of rows in table with email
function email_exists($db, $e){
	$val_email = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
	$val_email->bindParam(":email", $e);
	$val_email->execute();
	return $val_email->fetchColumn();
}

//Creating new account by inserting new row
function create_account($db, $fn, $ln, $e, $p){
	$act = $db->prepare('INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES (:first_name, :last_name, :email, :pass, now())');
	$act->bindParam(":first_name", $fn);
	$act->bindParam(":last_name", $ln);
	$act->bindParam(":email", $e);
	$act->bindParam(":pass", $p);
	return $act->execute();
}

//Must be in try/catch in case database connection fails
try {	
	$first_name = validate_first_name();
	$last_name = validate_last_name();
	$email = validate_email();
	$pass = validate_password();
			
	
	//Use either PDO or MySQLi to prevent against SQL injection attacks
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	if(email_exists($conn, $email) > 0){
		header("Location:index.php?err=email&type=exists");
		die();
	}else{
		if(create_account($conn, $first_name, $last_name, $email, $pass)){
			$account_id = $conn->lastInsertId('user-id');
			
			//Destroy session variables in case someone was logged in and created a new account
			session_destroy();
			//Begin a new session and set necessary session variables
			session_start();
			$_SESSION['user_id'] = $account_id;
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['email'] = $email;
			
			//Redirect to homepage for right now. Will break on XAMPP due to filepath differences
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
