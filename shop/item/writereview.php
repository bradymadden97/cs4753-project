<?php
	session_start();
	require_once("../../config/config.php");

  if(!isset($_POST['id'])){
    header("Location: /shop");
    die();
  }
	if(!isset($_SESSION['user_id'])){
		header("Location: /login");
		die();
	}

  $stars = 0;
  if(isset($_POST['stars'])){
    $stars = $_POST['stars'];
  }

  $reviewtext = "";
  if(isset($_POST['review'])){
    $reviewtext = $_POST['review'];
  }

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$review = $conn->prepare("INSERT INTO reviews (item_id, user_id, stars, review) VALUES (:iid, :uid, :stars, :review)");
    $review->bindParam(":iid", $_POST['id']);
    $review->bindParam(":uid", $_SESSION['user_id']);
    $review->bindParam(":stars", $stars);
    $review->bindParam(":review", $reviewtext);
		$review->execute();

		header("Location: /shop/item/?id=". $_POST['id']);
    die();
	}
	catch(PDOException $e){
		echo 0;
		die();
	}
?>
