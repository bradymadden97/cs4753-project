<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 - Not Found</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


	<!--Creative css -->
	<link href="/css/creative.min.css" rel="stylesheet">
  </head>

  <body style="height:auto">

	<?php
		include('/components/nav.php');
	?>
	<style>
		<?php
			include('/components/nav-dark.css');
		?>
	</style>
    <div style="text-align:center;margin-top:100px" class="container">
		<h1>404. That's an error.</h1>
		
		<div style="margin-top: 30px">
			<b><span id="cur-url"></span></b> does not exist or has been moved. <br>Go <a href="/">home</a>.
		</div>

    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#cur-url").text(window.location.pathname);
		});
	</script>
  </body>
</html>
