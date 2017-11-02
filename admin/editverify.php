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

  if(!isset($_GET['verify'])){
    header("Location: /admin");
    die();
  }

  $uid = $_GET['uid'];
  $verify = 0;
  if($_GET['verify'] == true){
    $verify = 1;
  }

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$v = $conn->prepare("UPDATE users SET status=:status WHERE user_id = :uid");
		$v->bindParam(":uid", $uid);
    $v->bindParam(":status", $verify);
	  $v->execute();

    header("Location: /admin");
		die();
	}
	catch(PDOException $e){
    header("Location: /admin");
		die();
	}
?>
