<?php
	session_start();

	require_once('../config/config.php');

	try {
		if(!isset($_POST['email'])){
			header("Location:index.php?err=email&type=missing");
			die();
		}

		$_SESSION['temp-email'] = $_POST['email'];

		if(!isset($_POST['pass'])){
			header("Location:index.php?err=pass&type=missing");
			die();
		}


		$db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $db->prepare("SELECT COUNT(*), user_id, first_name, last_name, email, pass FROM users WHERE email = :email");
		$stmt->bindParam(":email", $_POST['email']);
		$stmt->execute();

		$res = $stmt->fetch();

		if($res[0] != 1){
			header("Location:index.php?err=email&type=exists");
			die();
		}else{
			$isPassword = password_verify($_POST['pass'], $res[5]);

			if(!$isPassword){
				header("Location:index.php?err=pass&type=invalid");
				die();
			}else{
				$stmt = $db->prepare("UPDATE users SET last_login = now() WHERE email = :email");
				$stmt->bindParam(":email", $_POST['email']);
				$stmt->execute();

				$next = $_SESSION['next'];
				$next_id = $_SESSION['next_id'];

				$verified_append = "";
				if(isset($_SESSION['next_show_verified_email'])){
					if($_SESSION['next_show_verified_email'] == $res[4]){
						$verified_append = "?verified=true"
					}
				}

				session_destroy();
				session_start();

				$_SESSION['next'] = $next;
				$_SESSION['next_id'] = $next_id;

				$_SESSION['user_id'] = $res[1];
				$_SESSION['first_name'] = $res[2];
				$_SESSION['last_name'] = $res[3];
				$_SESSION['email'] = $res[4];

				if($next == "atc"){
					unset($_SESSION['next']);
					unset($_SESSION['next_id']);

					header("Location:/shop/item/?id=".$next_id);
					die();

				}

				header("Location:/myaccount".$verified_append);
				die();
			}
		}
	} catch(PDOException $e) {
		header("Location:index.php?err=db");
		die();
	}
?>
