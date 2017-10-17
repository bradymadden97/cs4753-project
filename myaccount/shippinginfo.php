<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$actinfo = $conn->prepare("SELECT address, city, state, zip FROM users WHERE user_id = :uid");
		$actinfo->bindParam(":uid", $_SESSION['user_id']);
		$actinfo->execute();
		
		$info = $actinfo->fetch();
				
	}
	catch(PDOException $e){
		echo "Database Error";
	}

?>

	<style>
	.btn-brand-color{
		color: #ffffff;
		border-color: #f05f40;
		background-color: #f05f40;
		font-size: 18px;
	}
	input{
		display: inline !important;
		width: 50% !important;
	}
	.label{
		text-align: right;
		padding-right: 10px;
		width: 30% !important;
		font-size: 14px;
	}
	#updatebtn{
		margin-top: 20px;
		cursor: pointer;
	}
	
	
	</style>

    <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Shipping Information</h4>
	<div style="padding-right:10%; padding-left:10%; text-align: center">
		<div>
			<label for="inputAddress" class="label">Address</label>
			<input type="text" id="inputAddress" name="address" class="form-control" placeholder="Address" value="<?php echo $info['address'] ?>">
				<div id="addressfeedback" class="invalid-feedback">
					Provide a valid address.
				</div>
		</div>
		<div>
			<label for="inputCity" class="label">City</label>
			<input type="text" id="inputCity" name="city" class="form-control" placeholder="City" value="<?php echo $info['city'] ?>">
				<div id="cityfeedback" class="invalid-feedback">
					Provide a valid city.
				</div>
		</div>
		<div>
			<label for="inputState" class="label">State</label>
			<input type="text" id="inputState" name="state" class="form-control" placeholder="State" value="<?php echo $info['state'] ?>">
				<div id="zipfeedback" class="invalid-feedback">
					Please select a state.
				</div>
		</div>
		<div>
			<label for="inputZip" class="label">Zip</label>
			<input type="number" id="inputZip" name="zip" class="form-control" placeholder="Zip" value="<?php echo $info['zip'] ?>">
				<div id="zipfeedback" class="invalid-feedback">
					Provide a valid zip.
				</div>
		</div>
		
		<button class="btn btn-brand-color" id="updatebtn">Update Shipping Info</button>
	</div>