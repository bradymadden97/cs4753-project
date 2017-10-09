<?php
	session_start();
	
	/*if(!isset($_SESSION['user_id'])){
		header("Location: /login");
		die();
	}*/
	
	
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zephair - Account Information</title>
	
	
	<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


	<!--Creative css -->
	<link href="../../css/creative.min.css" rel="stylesheet">
  </head>

  <body>
	<?php
		include('../../components/nav.php');
	?>
  	<style>
		<?php
			include('../../components/nav-dark.css');
		?>
	</style>
	
	<!-- Custom styles for this template -->
    <link href="information.css" rel="stylesheet">

    <div id="bodycontainer" class="container">
	
		<div id="dberror" class="alert alert-danger" style="display:none" role="alert">
			<strong>Error:</strong> Our servers experienced an error. Please try again.
		</div>
	<div id="wrapper">
      <form class="form-signin" id="infoform" novalidate action="information.php" method="POST" name="infoform">
        <h4 style="text-align:center;margin-top:30px;margin-bottom:15px" class="form-signin-heading">Welcome to <b style="color:#f05f40">Zephair</b>, <?php echo $_SESSION['first_name']; ?></h4>
		<p id="pleaseinfo" >Please provide your shipping address to finish your registration.</p>
			<div>
				<label for="inputAddress" class="sr-only">Address</label>
				<input type="text" id="inputAddress" name="address" class="form-control" placeholder="Address" required autofocus>
				  <div id="addressfeedback" class="invalid-feedback">
					Provide a valid address.
				  </div>
			</div>
			<div>
				<label for="inputCity" class="sr-only">City</label>
				<input type="text" id="inputCity" name="city" class="form-control" placeholder="City" required>
				  <div id="cityfeedback" class="invalid-feedback">
					Provide a valid city.
				  </div>
			</div>
			<div>
				<label for="inputState" class="sr-only">State</label>
				<select name="state" class="form-control" id="inputState">
				    <option id="defaultState" value="State">State</option>
				    <option value="Alabama">Alabama</option>
				    <option value="Alaska">Alaska</option>
				    <option value="Arizona">Arizona</option>
				    <option value="Arkansas">Arkansas</option>
				    <option value="California">California</option>
				    <option value="Colorado">Colorado</option>
				    <option value="Connecticut">Connecticut</option>
				    <option value="Delaware">Delaware</option>
				    <option value="Florida">Florida</option>
				    <option value="Georgia">Georgia</option>
				    <option value="Hawaii">Hawaii</option>
				    <option value="Idaho">Idaho</option>
				    <option value="Illinois">Illinois</option>
				    <option value="Indiana">Indiana</option>
				    <option value="Iowa">Iowa</option>
				    <option value="Kansas">Kansas</option>
				    <option value="Kentucky">Kentucky</option>
				    <option value="Louisiana">Louisiana</option>
				    <option value="Maine">Maine</option>
				    <option value="Maryland">Maryland</option>
				    <option value="Massachusetts">Massachusetts</option>
				    <option value="Michigan">Michigan</option>
				    <option value="Minnesota">Minnesota</option>
				    <option value="Mississippi">Mississippi</option>
				    <option value="Missouri">Missouri</option>
				    <option value="Montana">Montana</option>
				    <option value="Nebraska">Nebraska</option>
				    <option value="Nevada">Nevada</option>
				    <option value="New Hampshire">New Hampshire</option>
				    <option value="New Jersey">New Jersey</option>
				    <option value="New Mexico">New Mexico</option>
				    <option value="New York">New York</option>
				    <option value="North Carolina">North Carolina</option>
				    <option value="North Dakota">North Dakota</option>
				    <option value="Ohio">Ohio</option>
				    <option value="Oklahoma">Oklahoma</option>
				    <option value="Oregon">Oregon</option>
				    <option value="Pennsylvania">Pennsylvania</option>
				    <option value="Rhode Island">Rhode Island</option>
				    <option value="South Carolina">South Carolina</option>
				    <option value="South Dakota">South Dakota</option>
				    <option value="Tennessee">Tennessee</option>
				    <option value="Texas">Texas</option>
				    <option value="Utah">Utah</option>
				    <option value="Vermont">Vermont</option>
				    <option value="Virginia">Virginia</option>
				    <option value="Washington">Washington</option>
				    <option value="West Virginia">West Virginia</option>
				    <option value="Wisconsin">Wisconsin</option>
				    <option value="Wyoming">Wyoming</option>
				</select>
				<div id="statefeedback" class="invalid-feedback">
					Provide a valid state.
				</div>
			</div>
			<div>
				<label for="inputZip" class="sr-only">Zip Code</label>
				<input type="text" id="inputZip" name="zip" class="form-control" placeholder="Zip Code" required style="margin-bottom:-2px">
				  <div id="zipfeedback" class="invalid-feedback">
					Provide a valid five digit zip code.
				  </div>
			</div>
        <button class="btn btn-lg btn-brand-color btn-block" id="submitinfobtn" type="submit">Continue</button>
      </form>
	  
	  
	  <div id="skipdiv">
	  Want to do this later? <a href="/" id="skip">Skip</a>
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
    <script src="../../js/creative.min.js"></script>
	
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
		$("#inputAddress").focus();
		var temp_in = $("#inputAddress").val();
		$("#inputAddress").val("");
		$("#inputAddress").val(temp_in);
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
		checkStateColor();
	</script>
  </body>
</html>
