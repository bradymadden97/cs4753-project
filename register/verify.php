<?php

session_start();

//Includes database connection variables
require_once("../config/config.php");
include('../register/register.php');

function getVerification($email,$code){
	$query_check = "UPDATE `email_var` SET `status` = '1' where `email` = '$email' && `code` = '$code'";
	if (mysql_query($query_check)) {
		return true;
	}
  else{
		return false;
	}
}

try {
	//Use either PDO or MySQLi to prevent against SQL injection attacks
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($_GET['email'] && $_GET['code']){
    $email = $_GET['email'];
    $code = $_GET['code'];

    $check_status = getVerification($email, $code);

    if($check_status){
      header("Location:/register/welcome");
    }
    else{
      header("Location:index.php?err=db");
    }

  }

}
catch(PDOException $e){
	header("Location:index.php?err=db");
}






?>
