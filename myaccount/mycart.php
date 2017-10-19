<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$mycart = $conn->prepare("SELECT c.item_id, c.quantity, c.time_added, i.item_name, i.bitcoin_price, i.image_url FROM cart AS c JOIN items AS i ON c.item_id = i.item_id WHERE c.user_id = :uid");
		$mycart->bindParam(":uid", $_SESSION['user_id']);
		$mycart->execute();
						
	}
	catch(PDOException $e){
		echo "Database Error";
	}

?>




<style>
	#checkoutbox{
		border: 1px solid #f05f40;
		border-radius: 5px;
		text-align: center;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 10px;
		padding-right: 10px;
		background-color: white;
	}
	
	#checkoutheader{
		padding-bottom: 5px;
	}

	#checkoutbtn{
		background-color: #f05f40;
		color: white;
		cursor: pointer;
	}
	
	.checkouthr{
		border-width: 1px;
		max-width: 100% !important;
		width: 66%;		
		padding-bottom: 7.5px;
	}
	
	#checkoutitemsandprice{
		font-size: 14px;
		
	}
	
	#checkoutprice {
		color: #31c731;
	}
	
	.cartitem{
		border: 1px solid #d3d3d3;
		border-radius: 5px;
		margin-bottom: 2px;
		background-color: white;
		padding-bottom: 10px;
	}
	
	.cartitemlink{
		margin-left: 10px;
		text-decoration: none;
		color: #495057;
		font-size: 16px;
	}
	
	.cartitemimagelink{
		border: 0px;
		color: rgba(0,0,0,0) !important;
	}
	
	
	.cartitemimage{
		width: 100px;
		background-size: contain;
		border-radius: 2.5px;
		
		margin-top: 5px;
		margin-left: 5px;
		margin-right: 7.5px;
		cursor: pointer;
	}



</style>

<div class="row">
	<div class="col-sm-12 col-md-8">
		<?php
			foreach($mycart->fetchAll(PDO::FETCH_ASSOC) as $cart){
		?>
		
			<div class="cartitem">
				<span class="cartitemimagespan">
					<a class="cartitemimagelink" href="/shop/item/?id=<?php echo $cart['item_id']; ?>">
						<img href="/shop/item/?id=<?php echo $cart['item_id']; ?>" class="cartitemimage" src="<?php echo $cart['image_url']; ?>" alt="<?php echo $cart['item_name']; ?>">
					</a>
				</span>
				
				<a class="cartitemlink" href="/shop/item/?id=<?php echo $cart['item_id']; ?>">
					<?php echo $cart['item_name']; ?>
				</a>
			
			</div>
		
		
		<?php
			}
		?>	
	</div>
	<div class="col-sm-12 col-md-4">
		<div id="checkoutbox">
			<h6 id="checkoutheader">Checkout</h6>
				<hr class="checkouthr">
			<div id="checkoutitemsandprice">
				<span id="checkoutnumitems">0</span> items: <span id="checkoutprice">0.00 BTC</span>
			</div>
				<hr class="checkouthr">
			<button class="btn" id="checkoutbtn">Place Order</button>
		
		</div>	
	</div>
</div>