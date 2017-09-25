//Remove error messages when typing begins
$("#inputFirstName").keyup(function(){
	$("#firstnamefeedback").hide();
});
$("#inputLastName").keyup(function(){
	$("#lastnamefeedback").hide();
});
$("#inputEmail").keyup(function(){
	$("#emailfeedback").hide();
});
$("#inputPassword").keyup(function(){
	$("#passwordfeedback").hide();
});
$("#inputPasswordCheck").keyup(function(){
	$("#passwordcheckfeedback").hide();
});


//Validating password and retype password
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

//Onsubmit validation
window.addEventListener("load", function(){
	var form = document.getElementById("signupform");
	form.addEventListener("submit", function(event){
		if(form.checkValidity() == false){
			event.preventDefault();
			event.stopPropagation();
		}
		form.classList.add("was-validated");
	}, false);
}, false);
