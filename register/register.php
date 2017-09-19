<?php

require_once("../config/config.php");
	
try {	
	$first_name;
	$last_name;
	$email;
	$pass;
	$pass_retype;
	
	if(isset($_POST['first_name'])){
		if(ctype_alpha($_POST['first_name'])){
			$first_name = $_POST['first_name'];
		}else{
			//Throw non-alphabetic name error
		}
	}else{
		//Throw missing error
	}
	
	if(isset($_POST['last_name'])){
		if(ctype_alpha($_POST['last_name'])){
			$last_name = $_POST['last_name'];
		}else{
			//Throw non-alphabetic name error
		}
	}else{
		//Throw missing error
	}
	
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}else{
		//Throw missing error
	}
	
	if(isset($_POST['password']) && isset($_POST['password_retype'])){
		if($_POST['password'] == $_POST['password_retype']){
			if(strlen($_POST['password']) >= 6){
				$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
			}else{
				//Throw password too short error
			}
		}else{
			//Throw passwords don't match error
		}
	}else{
		//Throw missing error
	}
			
	
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$validate_email = $conn->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
	$validate_email->bindParam(":email", $email);
	$validate_email->execute();
	$validate_email_result = $validate_email->fetchColumn();
	
	if($validate_email_result > 0){
		//Throw account already exists error
	}else{
		$create_account = $conn->prepare('INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES (:first_name, :last_name, :email, :pass, now())');
		$create_account->bindParam(":first_name", $first_name);
		$create_account->bindParam(":last_name", $last_name);
		$create_account->bindParam(":email", $email);
		$create_account->bindParam(":pass", $pass);
		$create_account->execute();
		
		if($create_account){
			$account_id = $conn->lastInsertId('user_id');
			
			
		}else{
			//Throw error on insert
		}
	}
}
catch(PDOException $e){
	//Throw database connection error	
}

?>