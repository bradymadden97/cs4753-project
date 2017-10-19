<?php

	require_once("../config/config.php");
	
	
	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$actinfo = $conn->prepare("SELECT first_name, last_name, email FROM users WHERE user_id = :uid");
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
	select{
		display: inline !important;
		width: 50% !important;
		padding-left: 7.5px !important;
		cursor: pointer;
		padding-bottom: 5px !important;
	}
	select option{
		color: #495057;
	}
	#defaultState {
		color: grey !important;
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
	#changebtn{
		margin-top: 20px;
		cursor: pointer;
	}
	#updateshippingbtn{
		margin-top: 20px;
		cursor: pointer;
	}
	#sephr{
		margin-top:60px;
		margin-bottom:60px;
	}
	
	
	</style>

    <h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Account Information</h4>
	<div style="padding-right:10%; padding-left:10%; text-align: center">
		<div>
			<label for="inputFirstName" class="label">First Name</label>
			<input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="John" value="<?php echo $info['first_name'] ?>">
				<div id="firstnamefeedback" class="invalid-feedback">
					Provide a valid first name.
				</div>
		</div>
		<div>
			<label for="inputLastName" class="label">Last Name</label>
			<input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Doe" value="<?php echo $info['last_name'] ?>">
				<div id="lastnamefeedback" class="invalid-feedback">
					Provide a valid last name.
				</div>
		</div>
		<div>
			<label for="inputEmail" class="label">Email</label>
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" value="<?php echo $info['email'] ?>" disabled>
		</div>
		
		<button class="btn btn-brand-color" id="updatebtn">Update Account Info</button>
			<div id="updatefeedback" class="invalid-feedback">
				Update unsuccessful. Please try again.
			</div>
	</div>
	
	<hr id="sephr">
	
	<h4 style="text-align:center;margin-top:30px;margin-bottom:30px" class="form-signin-heading">Change Password</h4>
	<div style="padding-right:10%; padding-left:10%; margin-bottom: 30px; text-align: center">
		<div>
			<label for="inputCurrentPassword" class="label">Current Password</label>
			<input type="password" id="inputCurrentPassword" name="current_password" class="form-control" placeholder="******">
				<div id="currentpasswordfeedback" class="invalid-feedback">
					Current password incorrect.
				</div>
		</div>
		<div>
			<label for="inputNewPassword" class="label">New Password</label>
			<input type="password" id="inputNewPassword" name="new_password" class="form-control" placeholder="******">
				<div id="newpasswordfeedback" class="invalid-feedback">
					Provide a valid new password.
				</div>
		</div>
		<div>
			<label for="inputNewPasswordRetype" class="label">Retype New Password</label>
			<input type="password" id="inputNewPasswordRetype" name="new_password_retype" class="form-control" placeholder="******">
				<div id="retypenewpasswordfeedback" class="invalid-feedback">
					Provide a valid new password.
				</div>
		</div>
		
		<button class="btn btn-brand-color" id="changebtn">Change Password</button>
			<div id="changefeedback" class="invalid-feedback">
				Password change unsuccessful. Please try again.
			</div>
	</div>
	