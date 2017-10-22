$("#inputState").change(function(){
	checkStateColor();
	var s = $("#inputState").val();
	validateState(s);
});

function checkStateColor(){
	if($("#inputState").val() == "State"){
		$("#inputState").css('color', 'grey');
	}else{
		$("#inputState").css('color', '#495057');
	}
};

checkStateColor();

function validateAddress(a){
	if(a != ""){
		if(validateAddressString(a)){
			$("#addressfeedback").hide();
			return true;
		}else{
			$("#addressfeedback").text("Invalid address characters");
			$("#addressfeedback").show();
		}
	}else{
		$("#addressfeedback").text("Address cannot be empty");
		$("#addressfeedback").show();
	}
	return false;	
};

function validateCity(c){
	if(c != ""){
		if(validateCityString(c)){
			$("#cityfeedback").hide();
			return true;
		}else{
			$("#cityfeedback").text("Invalid city characters");
			$("#cityfeedback").show();
		}
	}else{
		$("#cityfeedback").text("City cannot be empty");
		$("#cityfeedback").show();
	}
	return false;
};

function validateState(s){
	if(s != "State"){
		$("#statefeedback").hide();
		return true;
	}else{
		$("#statefeedback").text("State cannot be unselected");
		$("#statefeedback").show();
	}
	return false;
};

function validateZip(z){
	console.log(z);
	if(z != ""){
		if(validateZipCode(z)){
			if($("#inputZip").is(":focus")){
				if(z.length > 5){
					$("#zipfeedback").text("Zip code can only be 5 numbers");
					$("#zipfeedback").show();
				}else{
					$("#zipfeedback").hide();
					return true;
				}
			}else{
				if(z.length == 5){
					$("#zipfeedback").hide();
					return true;
				}else{
					$("#zipfeedback").text("Zip code must be 5 numbers");
					$("#zipfeedback").show();
				}
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
	validateCity(c);
});
$("#inputCity").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var c = $("#inputCity").val().trim();
		validateCity(c);
	}
});

$("#inputState").blur(function(){
	var s = $("#inputState").val();
	validateState(s);
});

$("#inputZip").blur(function(){
	var p = $("#inputZip").val();
	validateZip(p);
});
$("#inputZip").bind('keyup', function(e){
	var key = e.keyCode || e.which;
	if(key != 9){
		var p = $("#inputZip").val();
		validateZip(p);
	}
});


//Prevent blurring on button clicks
$("#updateshippingbtn").mousedown(function(e){
	e.stopImmediatePropagation();
    e.preventDefault();
});

$("#updateshippingbtn").click(function(){
	$("#shippingfeedback").hide();
	if(checkshippingvalid()){
		$.post("utils/updateshippinginfo.php",
		{
			address: $("#inputAddress").val().trim(),
			city: $("#inputCity").val().trim(),
			state: $("#inputState").val().trim(),
			zip: $("#inputZip").val(),
		},
		function(d, s){
			if(d == 1){
				$("#updateshippingbtn").addClass('successupdate');
				$("#updateshippingbtn").html("Updated!");
				
				setTimeout(function(){
					$("#updateshippingbtn").removeClass('successupdate');
					$("#updateshippingbtn").html("Update Shipping Info");
				}, 3000);
			}else{
				$("#shippingfeedback").show();			
			}
			
		});
	}
});


function checkshippingvalid(){
	var a = $("#inputAddress").val().trim();
	var c = $("#inputCity").val().trim();
	var s = $("#inputState").val();
	var z = $("#inputZip").val().trim();
		
	
	var a_check = validateAddress(a);
	var c_check = validateCity(c);
	var s_check = validateState(s);
	var z_check = validateZip(z);
	
	return a_check && c_check && s_check && z_check;
}


//Regex for validations
function validateZipCode(str){
	return str.match(/[0-9]+$/i);
};

function validateAddressString(str){
	return str.match(/[A-z \-0-9#&\(\)\.]+$/i);
};

function validateCityString(str){
	return str.match(/[A-z \-&\.]+$/i);
};
