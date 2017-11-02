<?php
	session_start();

	require_once("../config/config.php");

  if(!isset($_SESSION['email']) || $_SESSION['email'] != "zephair.merchant@gmail.com" ){
    header("Location: /admin");
    die();
  }

  if(!isset($_GET['uid'])){
    header("Location: /admin");
    die();
  }

  $deleteuser = $_GET['uid'];

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$del = $conn->prepare("DELETE FROM users WHERE user_id = :uid");
		$del->bindParam(":uid", $deleteuser);
	  $del->execute();

    header("Location: /admin");
		die();
	}
	catch(PDOException $e){
    header("Location: /admin");
		die();
	}
?>
