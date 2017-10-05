function validateAddress(a){
	if(a != ""){
		$("#addressfeedback").hide();
		return true;
	}else{
		$("#addressfeedback").text("Address cannot be empty");
		$("#addressfeedback").show();
	}
	return false;	
};

function validateCity(c){
	if(c != ""){
		$("#cityfeedback").hide();
		return true;
	}else{
		$("#cityfeedback").text("City cannot be empty");
		$("#cityfeedback").show();
	}
	return false;
};

function validateZip(z){
	if(z != ""){
		if(validateZipCode(z)){
			if(z.length <= 5){
				$("#zipfeedback").hide();
				return true;
			}else{
				$("#zipfeedback").text("Zip code can only be 5 numbers");
				$("#zipfeedback").show();				
			}
		}else{
			$("#zipfeedback").text("Zip code should only contain numbers 0-9");
			$("#zipfeedback").show();
		}
	}else{
		$("#zipfeedback").text("Zip code cannot be empty");
		$("#zipfeedback").show();
	}
	return false;
};


//Validate on keyup/ blur
$("#inputAddress").blur(function(){
	var a = $("#inputAddress").val().trim();
	validateAddress(a);
});
$("#inputAddress").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputAddress").val().trim();
		validateAddress(p);
	}
});

$("#inputCity").blur(function(){
	var c = $("#inputCity").val().trim();
	validateCity(ln);
});
$("#inputCity").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var c = $("#inputCity").val().trim();
		validateCity(c);
	}
});

$("#inputZip").blur(function(){
	var p = $("#inputZip").val().trim();
	validateZip(p);
});
$("#inputZip").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputZip").val().trim();
		validateZip(p);
	}
});

//Prevent blurring on button clicks
$("#submitinfobtn").mousedown(function(e){
	e.stopImmediatePropagation();
    e.preventDefault();
});


//Onsubmit validation
window.addEventListener("load", function(){
	var form = document.getElementById("infoform");
	form.addEventListener("submit", function(event){
		if(checkFormValid() == false){
			event.preventDefault();
			event.stopPropagation();
		}
	}, false);
}, false);

function checkFormValid(){
	var a = $("#inputAddress").val().trim();
	var c = $("#inputCity").val().trim();
	var z = $("#inputZip").val().trim();
		
	
	var a_check = validateAddress(a);
	var c_check = validateCity(c);
	var z_check = validateZip(z);
	
	return a_check && c_check && z_check;
}


//Regex for validations
function validateZipCode(str){
	return str.match(/[0-9]+$/i);
};
