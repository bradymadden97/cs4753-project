<?php

	session_start();

	$autoloader = __DIR__ . '/../bitpay/src/Bitpay/Autoloader.php';
	if (true === file_exists($autoloader) &&
		true === is_readable($autoloader))
	{
		require_once $autoloader;
		\Bitpay\Autoloader::register();
	} else {
		throw new Exception('BitPay Library could not be loaded');
	}

	require_once("../config/config.php");


	$client        = new \Bitpay\Client\Client();
	$network       = new \Bitpay\Network\Testnet();
	$adapter       = new \Bitpay\Client\Adapter\CurlAdapter();
	$client->setNetwork($network);
	$client->setAdapter($adapter);

	//GET FROM ENV VARIABLE
	$token = new \Bitpay\Token();
	$token->setToken($BITPAY_TOKEN);
	/**
	 * Token object is injected into the client
	 */
	$client->setToken($token);
	/**
	 * This is where we will start to create an Invoice object, make sure to check
	 * the InvoiceInterface for methods that you can use.
	 */
	$invoice = new \Bitpay\Invoice();
	$buyer = new \Bitpay\Buyer();
	$buyer
		->setEmail('buyeremail@test.com');
	// Add the buyers info to invoice
	$invoice->setBuyer($buyer);

	$item = new \Bitpay\Item();
	$item
		->setCode('skuNumber')
		->setDescription('General Description of Item')
		->setPrice('1.99');
	$invoice->setItem($item);
	$invoice->setCurrency(new \Bitpay\Currency('USD'));
	// Configure the rest of the invoice
	$invoice
		->setOrderId('OrderIdFromYourSystem')
		// You will receive IPN's at this URL, should be HTTPS for security purposes!
		->setNotificationUrl('https://cs4753-project/');
	/**
	 * Updates invoice with new information such as the invoice id and the URL where
	 * a customer can view the invoice.
	 */
	try {
		$client->createInvoice($invoice);
	} catch (\Exception $e) {
		echo $e;
		$request  = $client->getRequest();
		$response = $client->getResponse();
		echo (string) $request.PHP_EOL.PHP_EOL.PHP_EOL;
		echo (string) $response.PHP_EOL.PHP_EOL;
		exit(1); // We do not want to continue if something went wrong
	}
	echo 'Invoice "'.$invoice->getId().'" created, see '.$invoice->getUrl().PHP_EOL;
	
?>