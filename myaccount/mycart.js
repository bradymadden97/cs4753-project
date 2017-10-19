$(".cartremoveX").click(function(){
	var t = $(this);
	$.post("removefromcart.php",
	{
		item_id: t.attr('data-remove-id'),
	},
	function(d, s){
		if(d == 1){
			t.parent().parent().css('display', 'none');
		}
	});
});
