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