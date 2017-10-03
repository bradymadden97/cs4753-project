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

function validateEmail(e){
	if(e != ""){
		if(validateEmailString(e)){
			$("#emailfeedback").hide();
			return true;
		}else{
			$("#emailfeedback").text("Invalid email format");
			$("#emailfeedback").show();
		}
	}else{
		$("#emailfeedback").text("Email cannot be empty");
		$("#emailfeedback").show();
	}
	return false;
};

function validatePassword(p){
	if(p != ""){
		if(p.length >= 6){
			$("#passwordfeedback").hide();
			return true;
		}else{
			$("#passwordfeedback").text("Password not at least 6 characters");
			$("#passwordfeedback").show();
		}
	}else{
		$("#passwordfeedback").text("Password cannot be empty");
		$("#passwordfeedback").show();
	}
	return false;
};

function validatePasswordCheck(p){
	if(p != ""){
		if(p == $("#inputPassword").val()){
			$("#passwordcheckfeedback").hide();
			return true;
		}else{
			$("#passwordcheckfeedback").text("Passwords don't match");
			$("#passwordcheckfeedback").show();
		}
	}else{
		$("#passwordcheckfeedback").text("Password cannot be empty");
		$("#passwordcheckfeedback").show();
	}
	return false;
};



//Validate on keyup/ blur
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

$("#inputEmail").blur(function(){
	var e = $("#inputEmail").val().trim();
	validateEmail(e);
});

$("#inputPassword").blur(function(){
	var p = $("#inputPassword").val();
	validatePassword(p);
});
$("#inputPassword").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputPassword").val();
		validatePassword(p);
	}
});

$("#inputPasswordCheck").blur(function(){
	var p = $("#inputPasswordCheck").val();
	validatePasswordCheck(p);
});
$("#inputPasswordCheck").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputPasswordCheck").val();
		validatePasswordCheck(p);
	}
});

//Blocking submit button if passwords arent equal
$("#inputPassword").keyup(function(){
	if($("#inputPassword").val() !== $("#inputPasswordCheck").val()){
		$("#signupbtn").prop('disabled', true);
	}else{
		$("#signupbtn").prop('disabled', false);
	}
});
$("#inputPasswordCheck").keyup(function(){
	if($("#inputPassword").val() !== $("#inputPasswordCheck").val()){
		$("#signupbtn").prop('disabled', true);
	}else{
		$("#signupbtn").prop('disabled', false);
	}
});
$("#inputPassword").blur(function(){
	if($("#inputPassword").val() !== $("#inputPasswordCheck").val()){
		$("#signupbtn").prop('disabled', true);
	}else{
		$("#signupbtn").prop('disabled', false);
	}
});
$("#inputPasswordCheck").blur(function(){
	if($("#inputPassword").val() !== $("#inputPasswordCheck").val()){
		$("#signupbtn").prop('disabled', true);
	}else{
		$("#signupbtn").prop('disabled', false);
	}
});

function checkFormValid(){
	var fn = $("#inputFirstName").val().trim();
	var ln = $("#inputLastName").val().trim();
	var e = $("#inputEmail").val().trim();
	var p = $("#inputPassword").val();
	var pp = $("#inputPasswordCheck").val();
		
	
	var fn_check = validateFirstName(fn);
	var ln_check = validateLastName(ln);
	var e_check = validateEmail(e);
	var p_check = validatePassword(p);
	var pp_check = validatePasswordCheck(pp);
	
	return fn_check && ln_check && e_check && p_check && pp_check;
}

//Onsubmit validation
window.addEventListener("load", function(){
	var form = document.getElementById("signupform");
	form.addEventListener("submit", function(event){
		if(checkFormValid() == false){
			event.preventDefault();
			event.stopPropagation();
		}
	}, false);
}, false);


//Regex for validations
function validateName(str){
    return str.match(/^([A-z \-]+)$/i);
};
function validateEmailString(str){
	return str.match(/[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$/i);
};
