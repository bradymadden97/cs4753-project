function getUrlParams(){
	var params = window.location.search.substring(1).split('&');
	var i;
	var err = "";
	var err_msg = ""
	
	for( i = 0; i < params.length; i ++ ){
		var kv = params[i].split('=');
		if(kv[0] == 'err'){
			err = kv[1];
		}else if(kv[0] == 'type'){
			err_msg = kv[1];
		}
	}
	
	if(err == "fn"){
		if(err_msg == "nonalpha"){
			$("#firstnamefeedback").text("First name can only contain letters and hyphens");
			$("#firstnamefeedback").show();
		}else if(err_msg == "missing"){
			$("#firstnamefeedback").text("First name cannot be empty");
			$("#firstnamefeedback").show();
		}
	}else if(err == "ln"){
		if(err_msg == "nonalpha"){
			$("#lastnamefeedback").text("Last name can only contain letters and hyphens");
			$("#lastnamefeedback").show();
		}else if(err_msg == "missing"){
			$("#lastnamefeedback").text("Last name cannot be empty");
			$("#lastnamefeedback").show();
		}
	}else if(err == "email"){
		if(err_msg == "missing"){
			$("#emailfeedback").text("Email cannot be empty");
			$("#emailfeedback").show();
		}else if(err_msg == "exists"){
			$("#emailfeedback").html("Account already exists. Is this you? <a href='/login'>Log in<a>");
			$("#emailfeedback").show();
		}
	}else if(err == "pass"){
		if(err_msg == "missing"){
			$("#passwordfeedback").text("Password cannot be empty");
			$("#passwordfeedback").show();
			$("#passwordcheckfeedback").text("Password cannot be empty");
			$("#passwordcheckfeedback").show();
		}else if(err_msg == "short"){
			$("#passwordfeedback").text("Password not at least 6 characters");
			$("#passwordfeedback").show();
		}else if(err_msg == "match"){
			$("#passwordcheckfeedback").text("Passwords don't match");
			$("#passwordcheckfeedback").show();
		}
	}else if(err == "db"){
		$("#dberror").css('display', 'block');
	}
	
};

getUrlParams();