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
				$("#cart-item-count").html(d["cartcount"]);
				$("#cart-item-count").html(d["cartcount"]);
				$("#cart-item-count").attr("data-count", d["cartcount"]);
				if(document.getElementById("cart-item-count").getAttribute("data-count") > 0){
					document.getElementById("cart-item-count").style.display = "inline";		
				}else{
					document.getElementById("cart-item-count").style.display = "none";
				}
			}
		}
	});
});