<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$myorders = $conn->prepare("SELECT o.order_price, o.item_list, o.transaction_date, o.paid, o.invoice_id FROM orders as o WHERE user_id = :uid ORDER BY o.transaction_date DESC");
		$myorders->bindParam(":uid", $_SESSION['user_id']);
		$myorders->execute();
						
	}
	catch(PDOException $e){
		echo "Database Error";
	}

?>



<div class="row">
	<div class="col-sm-12 col-md-8">
		<?php
			$previous_loop_date = "";
			foreach($myorders->fetchAll(PDO::FETCH_ASSOC) as $order){
				$dateformat = date_create_from_format('Y-m-d G:i:s', $order['transaction_date']);
				$current_loop_date = date_format($dateformat, 'F jS, Y');
		?>
			<?php if($current_loop_date != $previous_loop_date){ ?>
				<div class="orderdate row">
					<?php
						$previous_loop_date = $current_loop_date;
						echo $current_loop_date;					
					?>
				</div>
			<?php } ?>
		
			<div class="orderitem row">
			
				<?php echo floatval($order['order_price']). $order['paid'] ; ?>
			
			</div>
		
		
		<?php
			}
		?>	
	</div>
</div>