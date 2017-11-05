<?php
	session_start();

	if(!isset($_GET['id'])){
		header("Location: /shop");
		die();
	}

	require_once("../../config/config.php");

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('SELECT * FROM items WHERE item_id=:id');
		$stmt->bindParam(":id", $_GET['id']);
		$stmt->execute();

		if($stmt->rowCount() == 0){
			header("Location: /shop");
		}

		$result = $stmt->fetch();

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

    <title>Zephair - <?php echo $result['item_name']; ?></title>


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
	<link rel="stylesheet" href="item.css">

	<!-- Custom styles for this template -->

    <div class="container body-container">
    	<hr style="max-width:80%">
		<div class="item-container" style="width: 90%; margin: auto; margin-bottom: 30px; margin-top:25px">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<img src="<?php echo $result['image_url']; ?>" alt="<?php echo $result['item_name']; ?>" class="item-image">
				</div>
				<div class="col-md-7 col-sm-12">
					<div class="item-name">
						<span class="item-name-span"><?php echo $result['item_name']; ?></span>
						<span class="item-price-span"><?php echo (float)$result['bitcoin_price'];?> BTC</span>
					</div>

					<div class="item-description">
						<?php echo $result['description']; ?>
					</div>

					<div style="text-align: center">
						<button data-id="<?php echo $_GET['id']?>" class="item-add-to-cart">Add to cart</button>
					</div>
				</div>
			</div>

			<?php

				try {
					$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$stmt = $conn->prepare('SELECT r.review_id, r.item_id, r.user_id, r.stars, r.review, r.timestamp, u.first_name, u.last_name FROM reviews AS r JOIN users AS u ON r.user_id = u.user_id WHERE item_id=:id ORDER BY r.timestamp DESC');
					$stmt->bindParam(":id", $_GET['id']);
					$stmt->execute();

					$numreviews = $stmt->rowCount();

				}
				catch(PDOException $e){
					echo "Database error";
				}

			?>

			<div class="row" style="margin-top: 40px;">
				<h4 style="margin-left: 30px">Customer reviews</h4>
			</div>
			<hr style="min-width: 100%; border-width: 1px;">

			<?php
				if(isset($_SESSION['user_id'])){
			?>
					<form method="POST" action="writereview.php" id="submitreviewform">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
					<div class='review_write'>
						<b>Write a review:</b>
						<div class="input-group">
      				<span class="input-group-addon">
        				<i data-val="1" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
								<i data-val="2" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
								<i data-val="3" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
								<i data-val="4" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
								<i data-val="5" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
								<input type="hidden" name="stars" id="stars-selected" value="0" />
      				</span>
      				<textarea style="min-height: 62px" name="review" type="text" class="form-control" id="review-text"></textarea>
							<span class="input-group-addon input-group-addon-btn">
								<button class="submit-review-btn" type="submit">Write Review</button>
							</span>
    				</div>
					</div>
					<div id="submitreviewerror">You must give this review stars</div>
					</form>
					<hr style="min-width: 100%; border-width: 1px;">
			<?php
				}
			?>


			<div class="reviews_container">
			<?php
				foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $review){
			?>
					<?php

					echo "<div class='review_container'><div><span class='review_stars'>";
					$i=0;
					while($i < 5){
						if($i < $review['stars']){
							echo "<i class='fa fa-star star-filled' aria-hidden='true'></i>";
						}else{
							echo "<i class='fa fa-star-o star-empty' aria-hidden='true'></i>";
						}
						$i+=1;
					}
					echo "</span>";
					echo "<span class='review_head'>By ". $review['first_name']. " ". $review['last_name']. " on ". date("F jS, Y", strtotime($review['timestamp'])). "</span></div>";
					echo "<div class='review_text'>". $review['review']. "</div></div>";
					?>

			<?php
				}
			?>
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


	<script src="item.js"></script>

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
