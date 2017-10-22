<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$mycart = $conn->prepare("SELECT c.item_id, c.quantity, c.time_added, i.item_name, i.bitcoin_price, i.image_url FROM cart AS c JOIN items AS i ON c.item_id = i.item_id WHERE c.user_id = :uid");
		$mycart->bindParam(":uid", $_SESSION['user_id']);
		$mycart->execute();
		
		$number_items = 0;
		$total_price = 0;
						
	}
	catch(PDOException $e){
		echo "Database Error";
	}

?>




<link href="mycart.css" rel="stylesheet">

<div class="row">
	<div class="col-sm-12 col-md-8">
		<?php
			$rowcount = 0;
			foreach($mycart->fetchAll(PDO::FETCH_ASSOC) as $cart){
				$rowcount += 1;
				$number_items += 1;
				$total_price += $cart['bitcoin_price'];
		?>
		
			<div class="cartitem row">
			
				<div class="col-xs-8 cartrowmain">
					<span class="cartitemimagespan">
						<a class="cartitemimagelink" href="/shop/item/?id=<?php echo $cart['item_id']; ?>">
							<img href="/shop/item/?id=<?php echo $cart['item_id']; ?>" class="cartitemimage" src="<?php echo $cart['image_url']; ?>" alt="<?php echo $cart['item_name']; ?>">
						</a>
					</span>
					<a class="cartitemlink" href="/shop/item/?id=<?php echo $cart['item_id']; ?>">
						<?php echo $cart['item_name']; ?>
					</a>
				</div>
				
				<div class="col-xs-3 cartrowinfo">
					<span class="cartitemprice"><?php echo (float)$cart['bitcoin_price']; ?> BTC</span>
				</div>
				
				<div class="col-xs-1 cartremovecol">
					<button data-remove-id=<?php echo $cart['item_id']; ?> class="cartremoveX">X</button>
				</div>
			
			</div>
		
		
		<?php
			}
		?>	
		
		<div id="emptycartdiv" style="<?php if($rowcount != 0){ ?>display:none; <?php } ?> text-align:center">
			<h5 style="margin-top: 20px">Your cart is empty! <a href='/shop'>Shop</a></h5>	
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div id="checkoutbox">
			<h6 id="checkoutheader">Checkout</h6>
				<hr class="checkouthr">
			<div id="checkoutitemsandprice">
				<span id="checkoutnumitems"><?php echo $number_items; ?></span> items: <span id="checkoutprice"><?php echo $total_price; ?> BTC</span>
			</div>
				<hr class="checkouthr">
			<button class="btn" id="checkoutbtn">Place Order</button>
		
		</div>	
	</div>
</div>