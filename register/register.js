//Remove error messages when typing begins
$("#inputFirstName").blur(function(){
	if($("#inputFirstName").val().trim() != ""){
		$("#firstnamefeedback").hide();
	}else{
		$("#firstnamefeedback").text("First name cannot be empty");
		$("#firstnamefeedback").show();
	}
});
$("#inputLastName").blur(function(){
	if($("#inputLastName").val().trim() != ""){
		$("#lastnamefeedback").hide();
	}else{
		$("#lastnamefeedback").text("Last name cannot be empty");
		$("#lastnamefeedback").show();
	}
});
$("#inputEmail").blur(function(){
	if($("#inputEmail").val().trim() != ""){
		$("#emailfeedback").hide();
	}else{
		$("#emailfeedback").text("Email cannot be empty");
		$("#emailfeedback").show();
	}
});
$("#inputPassword").blur(function(){
	if($("#inputPassword").val().trim() != ""){
		$("#passwordfeedback").hide();
	}else{
		$("#passwordfeedback").text("Password cannot be empty");
		$("#passwordfeedback").show();
	}
});
$("#inputPasswordCheck").blur(function(){
	if($("#inputPasswordCheck").val().trim() != ""){
		$("#passwordcheckfeedback").hide();
	}else{
		$("#passwordcheckfeedback").text("Password cannot be empty");
		$("#passwordcheckfeedback").show();
	}
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
