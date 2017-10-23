<?php

	session_start();
	
	require_once("../config/config.php");
	
	if(!isset($_POST['id'])){
		header("Location: /");
		die();
	}

	
	//Autoload Bitpay Library
	$autoloader = __DIR__ . '/../bitpay/src/Bitpay/Autoloader.php';
	if (true === file_exists($autoloader) &&
		true === is_readable($autoloader))
	{
		require_once $autoloader;
		\Bitpay\Autoloader::register();
	} else {
		throw new Exception('BitPay Library could not be loaded');
	}
	
	$client = new \Bitpay\Client\Client();
	$network = new \Bitpay\Network\Testnet();
	$adapter = new \Bitpay\Client\Adapter\CurlAdapter();
	$token = new \Bitpay\Token();
	
	$client->setNetwork($network);
	$client->setAdapter($adapter);
	$client->setToken($token);

	
	$invoice = $client->getInvoice($_POST['id']);
	$invoiceId = $invoice->getId();
	$invoiceOrderId = $invoice->getOrderId();
	$invoiceStatus = $invoice->getStatus();
	$invoicePrice = $invoice->getPrice();
	
	
	header("HTTP/1.1 200 OK");	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$fetchorderupdate1 = $conn->prepare("UPDATE orders SET state=:state WHERE order_id = :oid");
		$fetchorderupdate1->bindParam(":state", $invoiceStatus);
		$fetchorderupdate1->bindParam(":oid", $invoiceOrderId);
		$fetchorderupdate1->execute();
						
	}
	catch(PDOException $e){
		echo "Database Error" . $e;
	}
	
?>