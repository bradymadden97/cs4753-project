$(".cartremoveX").click(function(){
	var t = $(this);
	$.post("utils/removefromcart.php",
	{
		item_id: t.attr('data-remove-id'),
	},
	function(d, s){
		if(d != 0){
			t.parent().parent().css('display', 'none');
			var dd = JSON.parse(d);
			$("#cart-item-count").html(dd["cart_items"]);
			$("#cart-item-count").attr("data-count", dd["cart_items"]);
			$("#checkoutnumitems").html(dd["cart_items"]);
			$("#checkoutprice").html((dd["total_cost"] * 1).toString() + " BTC");
			if(document.getElementById("cart-item-count").getAttribute("data-count") > 0){
				document.getElementById("cart-item-count").style.display = "inline";
				document.getElementById("emptycartdiv").style.display = "none";
			}else{
				document.getElementById("cart-item-count").style.display = "none";
				document.getElementById("emptycartdiv").style.display = 'block';
			}
		}
	});
});

window.addEventListener("load", function(){
	var form = document.getElementById("checkoutform");
	form.addEventListener("submit", function(event){
		if($("cart-item-count").attr("data-count") > 0){
			event.preventDefault();
			event.stopPropagation();
		}
	}, false);
}, false);
