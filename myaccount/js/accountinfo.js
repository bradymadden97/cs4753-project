function validateFirstName(fn){
	if(fn != ""){
		if(validateName(fn)){
			$("#firstnamefeedback").hide();
				return true;
			}else{
				$("#firstnamefeedback").text("First name can only contain letters and hyphens");
				$("#firstnamefeedback").show();
			}
		}else{
			$("#firstnamefeedback").text("First name cannot be empty");
			$("#firstnamefeedback").show();
		}
			return false;
};
function validateLastName(ln){
	if(ln != ""){
		if(validateName(ln)){
			$("#lastnamefeedback").hide();
				return true;
		}else{
			$("#lastnamefeedback").text("Last name can only contain letters and hyphens");
			$("#lastnamefeedback").show();
		}
	}else{
		$("#lastnamefeedback").text("Last name cannot be empty");
		$("#lastnamefeedback").show();
	}
	return false;
};
function validateCurrentPassword(p){
	if(p != ""){
		if(p.length >= 6){
			$("#currentpasswordfeedback").hide();
			return true;
		}else{
			$("#currentpasswordfeedback").text("Password not at least 6 characters");
			$("#currentpasswordfeedback").show();
		}
	}else{
		$("#currentpasswordfeedback").text("Password cannot be empty");
		$("#currentpasswordfeedback").show();
	}
	return false;
};
function validateNewPassword(p){
	if(p != ""){
		if(p.length >= 6){
			$("#newpasswordfeedback").hide();
			return true;
		}else{
			$("#newpasswordfeedback").text("Password not at least 6 characters");
			$("#newpasswordfeedback").show();
		}
	}else{
		$("#newpasswordfeedback").text("Password cannot be empty");
		$("#newpasswordfeedback").show();
	}
	return false;
};

function validatePasswordCheck(p){
	if(p != ""){
		if(p == $("#inputNewPassword").val()){
			$("#retypenewpasswordfeedback").hide();
			return true;
		}else{
			$("#retypenewpasswordfeedback").text("Passwords don't match");
			$("#retypenewpasswordfeedback").show();
		}
	}else{
		$("#retypenewpasswordfeedback").text("Password cannot be empty");
		$("#retypenewpasswordfeedback").show();
	}
	return false;
};





$("#inputFirstName").blur(function(){
	var fn = $("#inputFirstName").val().trim();
	validateFirstName(fn);
});
$("#inputFirstName").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputFirstName").val();
		validateFirstName(p);
	}
});

$("#inputLastName").blur(function(){
	var ln = $("#inputLastName").val().trim();
	validateLastName(ln);
});
$("#inputLastName").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var ln = $("#inputLastName").val();
		validateLastName(ln);
	}
});

$("#inputCurrentPassword").blur(function(){
	var p = $("#inputCurrentPassword").val();
	validateCurrentPassword(p);
});
$("#inputCurrentPassword").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputCurrentPassword").val();
		validateCurrentPassword(p);
	}
});

$("#inputNewPassword").blur(function(){
	var p = $("#inputNewPassword").val();
	validateNewPassword(p);
});
$("#inputNewPassword").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputNewPassword").val();
		validateNewPassword(p);
	}
});

$("#inputNewPasswordRetype").blur(function(){
	var p = $("#inputNewPassword").val();
	validateNewPassword(p);
});
$("#inputNewPasswordRetype").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputNewPasswordRetype").val();
		validatePasswordCheck(p);
	}
});

$("#updatebtn").mousedown(function(e){
	e.stopImmediatePropagation();
	e.preventDefault();
});


$("#updatebtn").click(function(){
	$("#updatefeedback").hide();
	if(checkupdatevalid()){
		$.post("utils/updateaccountinfo.php",
		{
			first_name: $("#inputFirstName").val().trim(),
			last_name: $("#inputLastName").val().trim(),
		},
		function(d, s){
			if(d == 1){
				$("#updatebtn").addClass('successupdate');
				$("#updatebtn").html("Updated!");

				setTimeout(function(){
					$("#updatebtn").removeClass('successupdate');
					$("#updatebtn").html("Update Account Info");
				}, 3000);
			}else{
				$("#updatefeedback").show();
			}

		});
	}
});

$("#changebtn").click(function(){
	$("#changefeedback").hide();
	if(checkpasswordvalid()){
		$.post("utils/updatepassword.php",
		{
			current_password: $("#inputCurrentPassword").val(),
			new_password: $("#inputNewPassword").val(),
			new_password_retype: $("#inputNewPasswordRetype").val(),
		},
		function(d, s){
			if(d == 2){
				$("#changebtn").addClass('successupdate');
				$("#changebtn").html("Password Changed!");

				$("#inputCurrentPassword").val("");
				$("#inputNewPassword").val("");
				$("#inputNewPasswordRetype").val("");

				setTimeout(function(){
					$("#changebtn").removeClass('successupdate');
					$("#changebtn").html("Change Password");
				}, 3000);
			}else if(d == 1){
				$("#currentpasswordfeedback").text("Current password is incorrect");
				$("#currentpasswordfeedback").show();

			}else{
				$("#changefeedback").show();
			}

		});
	}
});


function checkupdatevalid(){
	var fn = $("#inputFirstName").val().trim();
	var ln = $("#inputLastName").val().trim();


	var fn_check = validateFirstName(fn);
	var ln_check = validateLastName(ln);

	return fn_check && ln_check;
}

function checkpasswordvalid(){
	var cp = $("#inputCurrentPassword").val();
	var np = $("#inputNewPassword").val();
	var npr = $("#inputNewPasswordRetype").val();


	var cp_check = validateCurrentPassword(cp);
	var np_check = validateNewPassword(np);
	var npr_check = validatePasswordCheck(npr);

	return cp_check && np_check && npr_check;
}
//Regex for validations
function validateName(str){
	return str.match(/^([A-z \-\.]+)$/i);
};

$("#resendemaildiv").click(function(){
	$.post("utils/resendverificationemail.php",
	{
		email: $("#inputEmail").val(),
	},
	function(d, s){
		if(d == 1){
			$("#emailresendsuccess").css("display", "block");
			setTimeout(function(){
				$("#emailresendsuccess").css("display", "none");
			}, 5000);
		}else{
			$("#emailresendfail").css("display", "block");
			setTimeout(function(){
				$("#emailresendfail").css("display", "none");
			}, 5000);
		}

	});
});
