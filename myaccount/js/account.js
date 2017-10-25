$(".pills").click(function(){
	window.location.hash = $(this).attr("data-frag");
});


function loadTab(){
	var frag = "account";
	if(window.location.hash !== ""){
		frag = window.location.hash.substring(1);
	}

	$('.pills[data-frag="' + frag + '"]').tab('show');
};

loadTab();

function getUrlParams(){
	var params = window.location.search.substring(1).split('&');
	var rejoin = ""
	var i;
	var val = "";
	var val_msg = ""
	var wasVerified = false;

	for( i = 0; i < params.length; i ++ ){
		var kv = params[i].split('=');
		if(kv[0] == 'verified' && kv[1] == 'true'){
			showVerifiedEmail();
			wasVerified = true;
		}else if(kv[0] != "vemail"){
			rejoin += kv[0] + "=" + kv[1] + "&";
		}
	}

	if(wasVerified){
		var rooturl = window.location.href.split("?");
		if(rejoin.length > 0){
			rooturl[0] += "?";
		}
		var newurl = rooturl[0] +  rejoin + window.location.hash;
		history.pushState(null, null, newurl);
	}
};

function showVerifiedEmail(){
	$("#verifytrue").css("display", "block");
	setTimeout(function(){
		$("#verifytrue").css('display', 'none');
	}, 5000);
}

getUrlParams();
