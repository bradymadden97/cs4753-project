<?php

	session_start();
	
	require_once("../config/config.php");
	
	
	if(!isset($_SESSION['user_id'])){
		echo 0;
		die();
	}
	
	if(!isset($_POST['item_id']) ){
		echo 0;
		die();
	}
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$del = $conn->prepare("DELETE FROM cart WHERE user_id = :uid AND item_id = :iid");
		$del->bindParam(":uid", $_SESSION['user_id']);
		$del->bindParam(":iid", $_POST['item_id']);
		
		$delres = $del->execute();
		
		//TODO
		//need to return a json containing the new amount of items to update other sections of the webpage
		
		$cart = $conn->prepare("SELECT COUNT(*), SUM(items.bitcoin_price) as total_cost FROM cart JOIN items ON cart.item_id = items.item_id WHERE user_id = :uid");
		$cart->bindParam(":uid", $_SESSION['user_id']);
		$cart->execute();
		
		$cartres = $cart->fetch();
				
		echo json_encode(array('cart_items' => $cartres['COUNT(*)'], 'total_cost' => $cartres['total_cost']));
		die();		
	}
	catch(PDOException $e){
		echo 0;
		die();
	}

?>