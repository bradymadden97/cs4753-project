<?php

/*
This persists $_SESSION variables across multiple pages.
We will use $_SESSION variables to keep track of who a user is once they've logged in.
*/
session_start();

//Includes database connection variables 
require_once("../../config/config.php");

//Validate input fields server side is more secure. Cannot rely on client-side validation.
function validate_address(){
	if(isset($_POST['address'])){
		return $_POST['address'];
	}else{
		header("Location:index.php?err=address&type=missing");
		die();
	}
}

function validate_city(){
	if(isset($_POST['city'])){
		return $_POST['city'];
	}else{
		header("Location:index.php?err=city&type=missing");
		die();
	}
}

function validate_state(){
	if(isset($_POST['state'])){
		if($_POST['state'] == 'State'){
			header("Location: index.php?err=state&type=invalid");
			die();
		}else{
			return $_POST['state'];
		}
	}else{
		header("Location:index.php?err=state&type=missing");
		die();
	}
}

function validate_zip(){
	if(isset($_POST['zip'])){
		if(preg_match("/[0-9]+$/i", $_POST['zip'])){
			if(strlen($_POST['zip']) != 5){
				header("Location:index.php?err=zip&type=length");
				die();				
			}else{
				return $_POST['zip'];
			}
		}else{
			header("Location:index.php?err=zip&type=invalid");
			die();
		}		
	}else{
		header("Location:index.php?err=zip&type=missing");
		die();	
	}
}

//Creating new account by inserting new row
function update_account_info($db, $id, $address, $city, $state, $zip){
	$act = $db->prepare('UPDATE users SET address=:address, city=:city, state=:state, zip=:zip WHERE user_id=:uid');
	$act->bindParam(":address", $address);
	$act->bindParam(":city", $city);
	$act->bindParam(":state", $state);
	$act->bindParam(":zip", $zip);
	$act->bindParam(":uid", $id);
	return $act->execute();
}

//Must be in try/catch in case database connection fails
try {	
	if(!isset($_SESSION['user_id'])){
		header("Location:/login");
		die();
	}else{
		$address = validate_address();
		$city = validate_city();
		$state = validate_state();
		$zip = validate_zip();
				
		
		//Use either PDO or MySQLi to prevent against SQL injection attacks
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if(update_account_info($conn, $_SESSION['user_id'], $address, $city, $state, $zip)){
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
