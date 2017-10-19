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
					Please select a state.
				</div>
		</div>
		<div>
			<label for="inputZip" class="label">Zip</label>
			<input type="text" id="inputZip" name="zip" class="form-control" placeholder="Zip" value="<?php echo $info['zip'] ?>">
				<div id="zipfeedback" class="invalid-feedback">
					Provide a valid zip.
				</div>
		</div>
		
		<button class="btn btn-brand-color" id="updateshippingbtn">Update Shipping Info</button>
			<div id="shippingfeedback" class="invalid-feedback">
				Shipping information change unsuccessful. Please try again.
			</div>
	</div>
	
	<script>
		<?php if($info['state'] != ""){ ?>
		document.getElementById("inputState").value = "<?php echo $info['state']; ?>";
		<?php }else{ ?>
		document.getElementById("inputState").value = "State";
		<?php } ?>
	</script>