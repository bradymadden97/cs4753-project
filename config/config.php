<?php

	$DB_HOST = "localhost";
	$DB_USERNAME = "root";
	$DB_PASSWORD = "";
	$DB_PORT = "";
	$DB_NAME = "cs4753_project";
	$PHPMAILER_EMAIL = "";
	$PHPMAILER_PASSWORD = "";

	$BITPAY_TOKEN = "";

	if(getenv("AWS_RDS_URL")){
		$DB_HOST = getenv("AWS_RDS_URL");
	}
	if(getenv("AWS_RDS_USER")){
		$DB_USERNAME = getenv("AWS_RDS_USER");
	}
	if(getenv("AWS_RDS_PASS")){
		$DB_PASSWORD = getenv("AWS_RDS_PASS");
	}
	if(getenv("AWS_RDS_PORT")){
		$DB_PORT = getenv("AWS_RDS_PORT");
	}
	if(getenv("AWS_RDS_DB")){
		$DB_NAME = getenv("AWS_RDS_DB");
	}

	if(getenv("ZEPHAIR_BITPAY_TOKEN")){
		$BITPAY_TOKEN = getenv("ZEPHAIR_BITPAY_TOKEN");
	}

	if(getenv("PHPMAILER_EMAIL")){
		$PHPMAILER_EMAIL = getenv("PHPMAILER_EMAIL");
	}

	if(getenv("PHPMAILER_PASSWORD")){
		$PHPMAILER_PASSWORD = getenv("PHPMAILER_PASSWORD");
	}
	
?>
