<?php

	session_start();
	
	require_once("../config/config.php");

	//Don't continue if not signed in - can't checkout
	if(!isset($_SESSION['user_id'])){
		echo 1;
		die();
	}
	
	//Insert order into database
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$order = $conn->prepare("INSERT INTO orders (user_id, order_price, item_list, transaction_date, paid) VALUES (:uid, :order_price, :item_list, now(), 0)");
		$order->bindParam(":uid", $_SESSION['user_id']);
		$order->bindParam(":order_price", $order_price);
		$order->bindParam(":item_list", $item_list);
		$order->execute();
		
		$order_id = $conn->lastInsertId('order_id');
	}
	catch(PDOException $e){
		echo 1;
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
	$invoice = new \Bitpay\Invoice();
	$buyer = new \Bitpay\Buyer();
	$item = new \Bitpay\Item();
	
	$client->setNetwork($network);
	$client->setAdapter($adapter);

	//GET FROM ENV VARIABLE
	$token->setToken($BITPAY_TOKEN);
	$client->setToken($token);

	$buyer
		->setFirstName($_SESSION['first_name']);
		->setLastName($_SESSION['last_name']);
		->setEmail($_SESSION['email']);
		
	$invoice->setBuyer($buyer);

	$item
		->setCode($order_id)
		->setDescription('Your purchase from Zephair')
		->setPrice($order_price);
		
	$invoice->setItem($item);
	$invoice->setCurrency(new \Bitpay\Currency('BTC'));
	$invoice
		->setOrderId($order_id)
		->setNotificationUrl('https://cs4753-project/checkout/transactioncomplete.php');

	try {
		$client->createInvoice($invoice);
	} catch (\Exception $e) {
		echo $e;
		$request  = $client->getRequest();
		$response = $client->getResponse();
		echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
		echo (string) $response.PHP_EOL.PHP_EOL;
		die();
	}
	echo 'Invoice "'.$invoice->getId().'" created, see '.$invoice->getUrl().PHP_EOL;
	
?>