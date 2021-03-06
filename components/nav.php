<!-- Navigation -->
<?php

	require_once(realpath(__DIR__ . '/..' . '/config/config.php'));

	$cartcount = 0;
	try {
		$navdb = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$navdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		if(isset($_SESSION['user_id'])){
			$cartfind = $navdb->prepare('SELECT COUNT(*) FROM cart WHERE user_id = :uid');
			$cartfind->bindParam(":uid", $_SESSION['user_id']);
			$cartfind->execute();

			$cartcount = $cartfind->fetchColumn();
		}

	}
	catch(PDOException $e){
		echo $e;
	}




?>
<!-- Include Navbar CSS file -->
<style rel="text/css">
<?php include(dirname(__FILE__).'/nav.css'); ?>
</style>


<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
		<a class="navbar-brand js-scroll-trigger" href="/">
			<img src="https://s3.amazonaws.com/cs4753-project/logo.png" height="50px" alt="Zephair">
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<?php
					if(isset($_SESSION['email'])){
						if($_SESSION['email'] == 'zephair.merchant@gmail.com'){
				?>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger nav-margin-10px" href="/admin"><span>Admin</span></a>
					</li>
				<?php
						}
					}
				?>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger nav-margin-10px" href="/about"><span>About</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger nav-margin-10px" href="/shop"><span>Shop</span></a>
				</li>
				<?php
					if(!isset($_SESSION['user_id'])){
				?>
				<li class="nav-item">
					<a class="btn-solid-color nav-link js-scroll-trigger" href="/register"><span class="nav-margin-10px btn-padding-20 btn-lookalike">Sign up</span></a>
				</li>
				<li class="nav-item">
					<a class="btn-outline nav-link js-scroll-trigger" href="/login"><span class="nav-margin-10px btn-padding-20 btn-lookalike">Login</span></a>
				</li>
				<?php
					}else{
				?>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="/myaccount"><span class="nav-margin-10px" id="hellonav">My Account</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger cartnav nav-margin-10px" href="/myaccount#cart">
						<span>
							<i class="fa fa-shopping-cart mycart" aria-hidden="true"></i>
							Cart
						</span>

						<span id="cart-item-count" data-count="<?php echo $cartcount; ?>" style="display:none" ><?php echo $cartcount; ?></span>
					</a>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</nav>

<script>
	if(document.getElementById("cart-item-count").getAttribute("data-count") > 0){
		document.getElementById("cart-item-count").style.display = "inline";
	}else{
		document.getElementById("cart-item-count").style.display = "none";
	}
</script>
