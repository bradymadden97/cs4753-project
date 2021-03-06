<?php
	session_start();

	require_once("../config/config.php");

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('SELECT item_name, item_id, bitcoin_price, image_url FROM items');
		$stmt->execute();



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

    <title>Zephair - Shop</title>


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
	<link rel="stylesheet" href="shop.css">

	<!-- Custom styles for this template -->

    <div class="container body-container">
    	<hr style="max-width:80%">
		<div class="items-container" style="width: 80%; margin: auto; margin-bottom: 30px">
			<div class="row">
				<?php
				try {
					$stmt2 = $conn->prepare('SELECT COUNT(*) AS total, SUM(stars) AS stars FROM reviews WHERE item_id = :iid');
					foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $resrow){
						$stmt2->bindParam(":iid", $resrow['item_id']);
						$stmt2->execute();
						$review = $stmt2->fetch();
				?>
						<div class="item col-md-4 col-sm-12 sr-button" id="item-<?php echo $resrow['item_id']; ?>" >
							<a class="item-link" href="/shop/item/?id=<?php echo $resrow['item_id']; ?>">
								<div style="padding-right: 15px; padding-left:15px">
									<div style="text-align:center; margin-top:10px;">
											<img src="<?php echo $resrow['image_url']; ?>" alt="<?php echo $resrow['item_name']; ?>" class="item-image">
									</div>
									<div style="margin-top: 10px; padding-right: 12px; padding-left: 12px; overflow:hidden">
										<span class="item-name"><?php echo $resrow['item_name']; ?></span>
										<span class="item-stars">
											<?php
												$i = 0;
												$stars = round($review['stars'] / $review['total']);
												while($i < 5){
													if($i < $stars){
														echo '<i data-val="1" class="fa fa-star" aria-hidden="true"></i>';
													}else{
														echo '<i data-val="1" class="fa fa-star-o" aria-hidden="true"></i>';
													}
													$i += 1;
												}
											?>
										</span>
										<span class="item-price"><?php echo (float)$resrow['bitcoin_price']; ?> BTC</span>
									</div>
								</div>
							</a>
							<div style="text-align:center; margin-bottom: 10px; margin-top: 10px; z-index: 10">
								<button data-id="<?php echo $resrow['item_id']?>" class="item-add-to-cart">Add to cart</button>
							</div>
						</div>
				<?php
					}
					}
					catch(PDOException $e){
						echo $e;
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
    <script src="../js/creative.min.js"></script>

	<script src="shop.js"></script>

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
