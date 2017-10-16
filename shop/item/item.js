$(".item-add-to-cart").click(function(){
	var this_btn = $(this);
	$.post("../addtocart.php",
	{
		id: $(this).attr('data-id')
	},
	function(d, s){
		if(d.hasOwnProperty("redir")){
			window.location.href = decodeURIComponent(d["redir"]);
		}else if(d.hasOwnProperty("added")){
			if(d["added"]){
				this_btn.html("Added!");
			}
		}
	});
});