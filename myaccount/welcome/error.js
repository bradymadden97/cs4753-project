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
	
	if(err == "address"){
		if(err_msg == "missing"){
			$("#addressfeedback").text("Address cannot be empty");
			$("#addressfeedback").show();
		}
	}else if(err == "city"){
		if(err_msg == "missing"){
			$("#cityfeedback").text("City cannot be empty");
			$("#cityfeedback").show();
		}
	}else if(err == "state"){
		if(err_msg == "invalid"){
			$("#statefeedback").text("State cannot be unselected");
			$("#statefeedback").show();
		}else if(err_msg == "missing"){
			$("#statefeedback").text("State cannot be unselected");
			$("#statefeedback").show();
		}
	}else if(err == "zip"){
		if(err_msg == "length"){
			$("#zipfeedback").text("Zip code must be 5 digits");
			$("#zipfeedback").show();
		}else if(err_msg == "invalid"){
			$("#zipfeedback").text("Zip code should only contain numbers 0-9");
			$("#zipfeedback").show();
		}else if(err_msg == "missing"){
			$("#zipfeedback").text("Zip code cannot be empty");
			$("#zipfeedback").show();
		}
	}else if(err == "db"){
		$("#dberror").css('display', 'block');
	}
	
};

getUrlParams();