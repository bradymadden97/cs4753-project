<?php
	session_start();

	if(isset($_GET['verified'])){
		if(isset($_GET['vemail'])){
			if($_GET['verified']){
				$_SESSION['next_show_verified_status'] = $_GET['verified'];
				$_SESSION['next_show_verified_email'] = $_GET['vemail'];
			}
		}
	}

	if(isset($_GET['next'])){
		$_SESSION['next'] = $_GET['next'];
	}

	if(isset($_GET['id'])){
		$_SESSION['next_id'] = $_GET['id'];
	}

	$preset_email = "";
	if(isset($_GET['email'])){
		$preset_email = urldecode($_GET['email']);
	}

	if(isset($_SESSION['temp-email'])){
		$preset_email = $_SESSION['temp-email'];
	}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zephair - Log in</title>


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


	<!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

    <div id="bodycontainer" class="container">
	<div id="wrapper">

		<form class="form-signin" id="loginform" novalidate action="login.php" method="POST" name="loginform">
        <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Log in to Zephair</h4>
			<div>
				<label for="inputEmail" class="sr-only">Email</label>
				<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" value="<?php echo $preset_email; ?>" required autofocus>
				  <div id="emailfeedback" class="invalid-feedback">
					Provide a valid email.
				  </div>
			</div>
			<div>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
				  <div id="passwordfeedback" class="invalid-feedback">
					Provide a valid password.
				  </div>
			</div>
        <button class="btn btn-lg btn-brand-color btn-block" id="loginbtn" type="submit">Log in</button>
      </form>
	  <div id="tosignupdiv">
	  Don't have an account? <a href="/register" id="tosignup">Create Account</a>
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
	<script src="login.js"></script>
	<script src="error.js"></script>
	<script>
		$("#inputEmail").focus();
		var temp_in = $("#inputEmail").val();
		$("#inputEmail").val("");
		$("#inputEmail").val(temp_in);
	</script>

	<!-- Edit scrollspy nav switch -->
	<script>
	$(window).scroll(function() {
		if ($("#mainNav").offset().top > 1) {
		  $("#mainNav").addClass("navbar-shrink");
		} else {
		  $("#mainNav").removeClass("navbar-shrink");
		}
	});
	</script>

	<script>
		var a_elements = document.getElementsByTagName('a');
		for(var i = a_elements.length - 1; i >= 0; i--){
			$(a_elements[i]).mousedown(function(e){
				e.stopImmediatePropagation();
				e.preventDefault();
			});
		}
	</script>

  </body>
</html>
