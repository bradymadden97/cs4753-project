<?php

	session_start();
	
	require_once("../../config/config.php");
	
	
	if(!isset($_SESSION['user_id'])){
		echo 0;
		die();
	}
	
	if(!isset($_POST['item_list']) ){
		echo 0;
		die();
	}
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$item_pair = array();
		$item_array = explode(",", $_POST['item_list']);
		$getitem = $conn->prepare("SELECT item_name FROM items WHERE item_id = :iid");
		foreach($item_array as $item){
			$getitem->bindParam(":iid", $item);
			$getitem->execute();
			
			$item_res = $getitem->fetchColumn();
			$item_pair[$item] = $item_res;			
		}
		
		echo json_encode($item_pair);
		die();		
	}
	catch(PDOException $e){
		echo 0;
		die();
	}

?>