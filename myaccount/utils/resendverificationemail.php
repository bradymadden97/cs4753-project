<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/PHPMailer/src/Exception.php';
require '../../phpmailer/PHPMailer/src/PHPMailer.php';
require '../../phpmailer/PHPMailer/src/SMTP.php';

session_start();

//Includes database connection variables
require_once("../../config/config.php");

if(!isset($_SESSION['user_id']) || !isset($_SESSION['email'])){
  echo 0;
  die();
}

try{

  $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $rand_num = md5(rand(1000,10000));

  $newvcode = $conn->prepare("UPDATE users SET verification_code=:vcode WHERE user_id = :uid");
  $newvcode->bindParam(":uid", $_SESSION['user_id']);
  $newvcode->bindParam(":vcode", $rand_num);
  $newvcode->execute();

  $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $PHPMAILER_EMAIL;
        $mail->Password = $PHPMAILER_PASSWORD;
        $mail->Port = 587;

        $mail->setFrom('zephair.merchant@gmail.com', 'Zephair');
        $mail->addAddress($_SESSION['email']);
        $mail->addReplyTo('zephair.merchant@gmail.com', 'Zephair Customer Service');

        //Content
        $mail->isHTML(true);

        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];

        ob_start();
          include('../../emails/welcome.php');
          $emailBody = ob_get_contents() ;
        ob_clean();
        $bodyContent = $emailBody;

        $mail->Subject = 'Zephair Email Verification';
        $mail->Body    = $bodyContent;

        $mail->send();
        echo 1;
        die();
    }
    catch (Exception $e) {
      echo 0;
      die();
    }
}catch(PDOException $e){
	echo 0;
	die();
}
?>
