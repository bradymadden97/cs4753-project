<?php
	session_start();
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
    <link href="register.css" rel="stylesheet">

    <div class="container">

      <form class="form-signin" id="signupform" novalidate action="register.php" method="POST" name="signupform">
        <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Create a Zephair Account</h4>
			<div>
				<label for="inputFirstName" class="sr-only">First Name</label>
				<input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" required autofocus>
				  <span id="firstnamefeedback" class="invalid-feedback">
					Provide a valid first name.
				  </span>
			</div>
			<div>
				<label for="inputLastName" class="sr-only">Last Name</label>
				<input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" required>
				  <span id="lastnamefeedback" class="invalid-feedback">
					Provide a valid last name.
				  </span>
			</div>
			<div>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required style="margin-bottom:-2px">
				  <span id="emailfeedback" class="invalid-feedback">
					Provide a valid email address.
				  </span>
			</div>
			<div>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required style="margin-bottom:-2px">
				  <span id="passwordfeedback" class="invalid-feedback">
					Provide a valid password with at least 6 characters.
				  </span>
			</div>
			<div>
				<label for="inputPasswordCheck" class="sr-only">Re-type Password</label>
				<input type="password" id="inputPasswordCheck" name="password_retype" class="form-control" placeholder="Re-type Password" required>
				  <span id="passwordcheckfeedback" class="invalid-feedback">
					Provide a valid password with at least 6 characters.
				  </span>
			</div>
        <button class="btn btn-lg btn-brand-color btn-block" id="signupbtn" type="submit">Create Account</button>
      </form>
	  
	  
	  <div id="tologindiv">
	  Already have an account? <a href="/login" id="tologin">Log in</a>
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
	
	<script src="register.js"></script>
  </body>
</html>
