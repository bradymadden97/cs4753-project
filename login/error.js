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
	
	if(err == "email"){
		if(err_msg == "missing"){
			$("#emailfeedback").text("Email cannot be empty");
			$("#emailfeedback").show();
		}else if(err_msg == "exists"){
			$("#emailfeedback").html("Account doesn't exist. <a href='/register'>Create account<a>");
			$("#emailfeedback").show();
		}
	}else if(err == "pass"){
		if(err_msg == "missing"){
			$("#passwordfeedback").text("Password cannot be empty");
			$("#passwordfeedback").show();
		}else if(err_msg == "invalid"){
			$("#passwordfeedback").text("Password invalid");
			$("#passwordfeedback").show();
		}
	}else if(err == "db"){
		$("#dberror").css('display', 'block');
	}
	
};

getUrlParams();