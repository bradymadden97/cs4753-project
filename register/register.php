<?php

/*
This persists $_SESSION variables across multiple pages.
We will use $_SESSION variables to keep track of who a user is once they've logged in.
*/

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/PHPMailer/src/Exception.php';
require '../phpmailer/PHPMailer/src/PHPMailer.php';
require '../phpmailer/PHPMailer/src/SMTP.php';

session_start();

//Includes database connection variables
require_once("../config/config.php");

//Validate input fields server side is more secure. Cannot rely on client-side validation.
function validate_first_name(){
	if(isset($_POST['first_name'])){
		if(preg_match("/^([A-z \-]+)$/i", $_POST['first_name'])){
			return $_POST['first_name'];
		}else{
			//header("Location: ... ") is used to redirect page
			//It is good to put die(); afterwards to end register.php script from continuing to run
			header("Location:index.php?err=fn&type=nonalpha");
			die();
		}
	}else{
		header("Location:index.php?err=fn&type=missing");
		die();
	}
}

function validate_last_name(){
	if(isset($_POST['last_name'])){
		if(preg_match("/^([A-z \-]+)$/i", $_POST['last_name'])){
			return $_POST['last_name'];
		}else{
			header("Location:index.php?err=ln&type=nonalpha");
			die();
		}
	}else{
		header("Location:index.php?err=ln&type=missing");
		die();
	}
}

function validate_email(){
	if(isset($_POST['email'])){
		return $_POST['email'];
	}else{
		header("Location:index.php?err=email&type=missing");
		die();
	}
}

function validate_password(){
	if(isset($_POST['password']) && isset($_POST['password_retype'])){
		if($_POST['password'] == $_POST['password_retype']){
			if(strlen($_POST['password']) >= 6){
				return password_hash($_POST['password'], PASSWORD_DEFAULT);
			}else{
				header("Location:index.php?err=pass&type=short");
				die();
			}
		}else{
			header("Location:index.php?err=pass&type=match");
			die();
		}
	}else{
		header("Location:index.php?err=pass&type=missing");
		die();
	}
}

//Check if email already exists as a user by getting COUNT of number of rows in table with email
function email_exists($db, $e){
	$val_email = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
	$val_email->bindParam(":email", $e);
	$val_email->execute();
	return $val_email->fetchColumn();
}

//Creating new account by inserting new row
function create_account($db, $fn, $ln, $e, $p, $s, $vc){
	$act = $db->prepare('INSERT INTO users (first_name, last_name, email, pass, registration_date, status, verification_code) VALUES (:first_name, :last_name, :email, :pass, now()), :status, :code');
	$act->bindParam(":first_name", $fn);
	$act->bindParam(":last_name", $ln);
	$act->bindParam(":email", $e);
	$act->bindParam(":pass", $p);
	$act->bindParam(":status", $s);
	$act->bindParam(":code", $vc);
	return $act->execute();
}


//Must be in try/catch in case database connection fails
try {
	if(isset($_POST['first_name'])){
		$_SESSION['temp_first_name'] = $_POST['first_name'];
	}
	if(isset($_POST['last_name'])){
		$_SESSION['temp_last_name'] = $_POST['last_name'];
	}
	if(isset($_POST['email'])){
		$_SESSION['temp_email'] = $_POST['email'];
	}

	$first_name = validate_first_name();
	$last_name = validate_last_name();
	$email = validate_email();
	$pass = validate_password();


	//Use either PDO or MySQLi to prevent against SQL injection attacks
	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	if(email_exists($conn, $email) > 0){
		header("Location:index.php?err=email&type=exists");
		die();
	}else{
		$rand_num = md5(rand(1000,10000)); // random number hashed for the verification code
		if(create_account($conn, $first_name, $last_name, $email, $pass, 0, $rand_num)){
			$account_id = $conn->lastInsertId('user-id');


			$password = md5($pass);

			//Load composer's autoloader
			//require 'vendor/autoload.php';

			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'zephair.merchant@gmail.com';       // SMTP username
			    $mail->Password = 'cs4753project';                    // SMTP password
			    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('zephair.merchant@gmail.com', 'Mailer');
			    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			    //$mail->addAddress('ellen@example.com');               // Name is optional
					$mail->addAddress($email);															// Add user email as recipient
			    $mail->addReplyTo('zephair.merchant@gmail.com', 'Information'); 			// reply information
			    //$mail->addCC('cc@example.com');
			    //$mail->addBCC('bcc@example.com');


			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML

					$bodyContent = 'Greetings from Zephair, <br><br> Please confirm your Zephair account:<br>';
					// need to change link
					$bodyContent .= '<p><a href="http://localhost/webidea/email_var/check.php?email='.$email.'&&code='.$rand_num.'">Click Here to confirm your account</a></p>';

					$mail->Subject = 'Zephair Sign-Up Confirmation';
					$mail->Body    = $bodyContent;

					// just in case we need an alternate body for people with nonHTML clients
			    //$mail->AltBody = 'Greetings from Zephair, Please confirm your zephair account:';

			    $mail->send();
			    echo 'Message has been sent';
			}
			catch (Exception $e) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			}

			//$query_insert = "INSERT into `email_var` (`username`,`email`,`password`,`code`,`status`) VALUES ('$username','$email','$password','$rand_num','0')";
			//if ($conn->prepare($query_insert)) {
			//	return "<script>alert('Please check your mailbox for confirmation')</script>";
			//}
			//Destroy session variables in case someone was logged in and created a new account
			session_destroy();
			//Begin a new session and set necessary session variables
			session_start();
			$_SESSION['user_id'] = $account_id;
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['email'] = $email;

			//Redirect to information collection. Will break on XAMPP due to filepath differences
			header("Location:/register/welcome");
			die();
		}else{
			header("Location:index.php?err=db");
			die();
		}
	}
}
catch(PDOException $e){
	header("Location:index.php?err=db");
}

?>
