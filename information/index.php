<?php
	session_start();
	
	$temp_fn = "";
	$temp_ln = "";
	$temp_email = "";
	
	if(isset($_GET['err'])){
		if(isset($_SESSION['temp_first_name'])){
			$temp_fn = $_SESSION['temp_first_name'];
		}
		if(isset($_SESSION['temp_last_name'])){
			$temp_ln = $_SESSION['temp_last_name'];
		}
		if(isset($_SESSION['temp_email'])){
			$temp_email = $_SESSION['temp_email'];
		}
	}else{
		$_SESSION['temp_first_name'] = "";
		$_SESSION['temp_last_name'] = "";
		$_SESSION['temp_email'] = "";
	}
	

	
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zephair - Create Account</title>
	
	
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
    <link href="information.css" rel="stylesheet">

    <div id="bodycontainer" class="container">
	
		<div id="dberror" class="alert alert-danger" style="display:none" role="alert">
			<strong>Error:</strong> Our servers experienced an error. Please try again.
		</div>
	<div id="wrapper">
      <form class="form-signin" id="signupform" novalidate action="information.php" method="POST" name="signupform">
        <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Create a Zephair Account</h4>
			<div>
				<label for="inputFirstName" class="sr-only">Address</label>
				<input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="Address" value="<?php echo $temp_fn; ?>" required autofocus>
				  <div id="firstnamefeedback" class="invalid-feedback">
					Provide a valid first name.
				  </div>
			</div>
			<div>
				<label for="inputLastName" class="sr-only">City</label>
				<input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="City" value="<?php echo $temp_ln; ?>" required>
				  <div id="lastnamefeedback" class="invalid-feedback">
					Provide a valid last name.
				  </div>
			</div>
			<div>
				<label for="inputEmail" class="sr-only">State</label>
				<input type="email" id="inputEmail" name="email" class="form-control" placeholder="State" value="<?php echo $temp_email; ?>" required style="margin-bottom:-2px">
				  <div id="emailfeedback" class="invalid-feedback">
					Provide a valid email address.
				  </div>
			</div>
			<div>
				<label for="inputPassword" class="sr-only">Zip Code</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Zip Code" required style="margin-bottom:-2px">
				  <div id="passwordfeedback" class="invalid-feedback">
					Provide a valid password with at least 6 characters.
				  </div>
			</div>
        <button class="btn btn-lg btn-brand-color btn-block" id="signupbtn" type="submit">Create Account</button>
      </form>
	  
	  
	  <div id="tologindiv">
	  Want to do this later? <a href="../" id="tologin">Skip</a>
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
	
	<script src="information.js"></script>
	<script src="error.js"></script>
	<script>
		var a_elements = document.getElementsByTagName('a');
		for(var i = a_elements.length - 1; i >= 0; i--){
			$(a_elements[i]).mousedown(function(e){
				e.stopImmediatePropagation();
				e.preventDefault();
			});
		}
	</script>
	<!-- Set auto-infocus text ahead of cursor always -->
	<script>
		$("#inputFirstName").focus();
		var temp_in = $("#inputFirstName").val();
		$("#inputFirstName").val("");
		$("#inputFirstName").val(temp_in);
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
  </body>
</html>
