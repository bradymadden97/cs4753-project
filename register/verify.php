<?php

session_start();

//Includes database connection variables
require_once("../config/config.php");
include('../register/register.php');

function getVerification($email,$code){
	$query_check = $conn->prepare("UPDATE users SET status = 1 where email = :email and code = :code");
	$query_check->bindParam(':email', $email);
	$query_check->bindParam(":code", $code);
	$query_check->execute();
	return $query_check;
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
      header("Location:/myaccount");
    }
    else{
      header("Location:/myaccount?err=db");
    }

  }

}
catch(PDOException $e){
	header("Location:index.php?err=db");
}






?>
