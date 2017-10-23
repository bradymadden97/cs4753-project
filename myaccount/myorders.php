<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$myorders = $conn->prepare("SELECT o.order_price, o.item_list, o.transaction_date, o.state, o.paid, o.invoice_id FROM orders as o WHERE user_id = :uid ORDER BY o.transaction_date DESC");
		$myorders->bindParam(":uid", $_SESSION['user_id']);
		$myorders->execute();
						
	}
	catch(PDOException $e){
		echo "Database Error";
	}

?>

<link href="css/myorders.css" rel="stylesheet">

<div class="row">
	<div class="col-sm-12 col-md-10 orderlist">
		<div class="orderdategroup">
		<?php
			$previous_loop_date = "";
			foreach($myorders->fetchAll(PDO::FETCH_ASSOC) as $order){
				$dateformat = date_create_from_format('Y-m-d G:i:s', $order['transaction_date']);
				$current_loop_date = date_format($dateformat, 'F jS, Y');
		?>
		<?php if($current_loop_date != $previous_loop_date){ ?>
		</div>
		<div class="orderdategroup">
			<div class="orderdate row">
				<b>
					<?php
						$previous_loop_date = $current_loop_date;
						echo $current_loop_date;				
					?>
				</b>
			</div>
		<?php } ?>
			<div class="orderitem row">
				<div class="col-md-5">
					<?php 
						$list_items = explode(",", $order['item_list']);
						if(count($list_items) == 1){
							echo count($list_items) . " item";
						}else{
							echo count($list_items) . " items";
						}
						
						echo "<a href='#' class='orderdetail'>Details</a>";
					?>				
			
				
				</div>
				<div class="col-md-3">
					<?php
						echo "<span class='orderpricespan'>". floatval($order['order_price'])." BTC </span>";
					?>
				</div>
				<div class="col-md-4">
					<?php
						if($order['state'] == 'new'){
							echo '<span class="orderdangerspan">Unpaid</span>';
							echo '<a class="btn orderpayinvoice" href="https://test.bitpay.com/invoice?id='. $order['invoice_id']. '">Pay now</a>';
						}else if($order['state'] == 'expired'){
							echo '<span class="orderdangerspan">Order Expired</span>';
						}else if($order['state'] == 'paid'){
							echo '<span class="orderprocessingspan">Paid: processing</span>';
						}else if($order['state'] == 'complete' || $order['state'] == 'confirmed'){
							echo '<span class="ordercompletespan">Paid: complete</span>';
						}else{
							echo '<span class="orderdangerspan">Payment Error</span>';
						}
					?>
				</div>			
			</div>
		<?php
			}
		?>
		</div>
	</div>
</div>