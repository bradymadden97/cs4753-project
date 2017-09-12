<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signup</title>

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
		include('../nav.php');
	?>
	<!--Override Navbar CSS -->
	<link href="../css/nav-dark.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="register.css" rel="stylesheet">

    <div class="container">

      <form class="form-signin" id="signupform">
        <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Sign up for Canned Air</h4>
        <label for="inputFirstName" class="sr-only">First Name</label>
		<input type="text" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
		<label for="inputLastName" class="sr-only">Last Name</label>
		<input type="text" id="inputLastName" class="form-control" placeholder="Last Name" required>
		<label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<label for="inputPasswordCheck" class="sr-only">Re-type Password</label>
        <input type="password" id="inputPasswordCheck" class="form-control" placeholder="Re-type Password" required>

        <button class="btn btn-lg btn-brand-color btn-block" id="signupbtn" type="submit">Sign up</button>
      </form>
	  
	  
	  <div id="tologindiv">
	  Already have an account? <a href="/login" id="tologin">Log in</a>
	  </div>

    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<script src="register.js"></script>
  </body>
</html>
