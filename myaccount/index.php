<?php
	session_start();

	require_once("../config/config.php");

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!isset($_SESSION['user_id'])){
			if(isset($_GET['verified']) && isset($_GET['vemail'])){
				header("Location:/login?verified=". $_GET['verified']."&vemail=".$_GET['vemail']);
				die();
			}
			header("Location:/login");
			die();
		}

		$stmt = $conn->prepare('SELECT first_name, last_name, email FROM users WHERE user_id = :uid');
		$stmt->bindParam(":uid", $_SESSION['user_id']);
		$stmt->execute();

		$res = $stmt->fetch();
	}
	catch(PDOException $e){
		echo "Database error";
	}




?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zephair - My Account</title>


	<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


	<!--Creative css -->
	<link href="../css/creative.min.css" rel="stylesheet">
  </head>

  <body>
	<?php
		include('../components/nav.php');
	?>
	<style>
		<?php
			include('../components/nav-dark.css');
		?>
	</style>
	<link rel="stylesheet" href="css/account.css">

	<!-- Custom styles for this template -->

    <div class="container body-container">
    	<hr style="max-width:80%">
		<div class="items-container" style="width: 90%; margin: auto; margin-bottom: 30px">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="nav flex-column nav-pills" id="myaccount-pills" role="tablist">
						<a class="nav-link pills" data-frag="account" id="pill-account-information" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-expanded="true">Account Information</a>
						<a class="nav-link pills" data-frag="shipping" id="pill-shipping-information" data-toggle="pill" href="#shipping" role="tab" aria-controls="shipping" aria-expanded="true">Shipping Information</a>
						<a class="nav-link pills" data-frag="cart" id="pill-my-cart" data-toggle="pill" href="#cart" role="tab" aria-controls="cart" aria-expanded="true">My Cart</a>
						<a class="nav-link pills" data-frag="orders" id="pill-my-orders" data-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-expanded="true">My Orders</a>
					</div>
				</div>

				<div class="col-md-9 col-sm-12">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="view-account-information">
							<div id="verifytrue" class="alert alert-success" style="display:none;text-align:center" role="alert">
								<strong>Success!</strong> Your email <b><?php echo $_SESSION['email']; ?></b> has been verified.
							</div>
							<div id="verifyfalse" class="alert alert-danger" style="display:none;text-align:center" role="alert">
								<strong>Error:</strong> Invalid email verification code.
							</div>
							<div id="emailresendsuccess" class="alert alert-success" style="display:none;text-align:center" role="alert">
								<strong>Success!</strong> A verification email has been sent to <b><?php echo $_SESSION['email']; ?></b>
							</div>
							<div id="emailresendfail" class="alert alert-danger" style="display:none;text-align:center" role="alert">
								<strong>Error:</strong> There was an error sending an email to <?php echo $_SESSION['email']; ?>.
							</div>
							<?php
								include('accountinfo.php');
							?>
						</div>
						<div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="view-shipping-information">
							<?php
								include('shippinginfo.php');
							?>
						</div>
						<div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="view-my-cart">
							<?php
								include('mycart.php');
							?>
						</div>
						<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="view-my-orders">
							<?php
								include('myorders.php');
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.3.6/scrollreveal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

	<!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>

	<script src="js/account.js"></script>

		<!-- Edit scrollspy nav switch -->
	<script>
	$(window).scroll(function() {
		if ($("#mainNav").offset().top > 1) {
		  $("#mainNav").addClass("navbar-shrink");
		} else {
		  $("#mainNav").removeClass("navbar-shrink");
		}
	});
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	});
	</script>

	<script src="js/accountinfo.js"></script>
	<script src="js/shippinginfo.js"></script>
	<script src="js/mycart.js"></script>
	<script src="js/myorders.js"></script>

  </body>
</html>
