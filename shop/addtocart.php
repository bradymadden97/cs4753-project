<?php
	session_start();
	
	require_once("../config/config.php");
	
	if(!isset($_POST['id'])){
		header('Content-Type: application/json');
		echo json_encode(array('redir' => urlencode('/shop')));
		die();
	}
	
	if(!isset($_SESSION['user_id'])){
		header('Content-Type: application/json');
		echo json_encode(array('redir' => urlencode('/login?next=atc&id=' . $_POST['id'])));
		die();
	}
	
	$item_id = $_POST['id'];
	$quantity = 1;
	
	if(isset($_POST['quantity'])){
		$quantity = $_POST['quantity'];
	}
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("SELECT COUNT(*) FROM cart WHERE user_id = :uid AND item_id = :iid");
		$stmt->bindParam(":uid", $_SESSION['user_id']);
		$stmt->bindParam(":iid", $item_id);
		$stmt->execute();
		
		
		if($stmt->fetchColumn() == 0){
			$stmt = $conn->prepare("INSERT INTO cart (user_id, item_id, time_added, quantity) VALUES (:uid, :iid, now(), :quant)");
		}else{
			$stmt = $conn->prepare("UPDATE cart SET time_added=now(), quantity=:quant WHERE user_id=:uid AND item_id=:iid");		
		}
		$stmt->bindParam(":uid", $_SESSION['user_id']);
		$stmt->bindParam(":iid", $item_id);
		$stmt->bindParam(":quant", $quantity);
		$res = $stmt->execute();
		
		$cartfind = $conn->prepare('SELECT COUNT(*) FROM cart WHERE user_id = :uid');
		$cartfind->bindParam(":uid", $_SESSION['user_id']);
		$cartfind->execute();
		$cartcount = $cartfind->fetchColumn();

		header('Content-Type: application/json');
		echo json_encode(array('added' => $res, 'cartcount'=> $cartcount));
		die();
		
	}
	catch(PDOException $e){
		header('Content-Type: application/json');
		echo json_encode(array('error' => 'db'));
		die();
	}
?>