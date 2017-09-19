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
