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


//Prevent blurring on button clicks
$("#signupbtn").mousedown(function(e){
	e.stopImmediatePropagation();
    e.preventDefault();
});


//Onsubmit validation
window.addEventListener("load", function(){
	var form = document.getElementById("loginform");
	form.addEventListener("submit", function(event){
		if(checkFormValid() == false){
			event.preventDefault();
			event.stopPropagation();
		}
	}, false);
}, false);

function checkFormValid(){
	var e = $("#inputEmail").val().trim();
	var p = $("#inputPassword").val();
		

	var e_check = validateEmail(e);
	var p_check = validatePassword(p);
	
	return e_check && p_check;
}


//Regex for validations
function validateEmailString(str){
	return str.match(/[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$/i);
};
