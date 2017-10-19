$(".cartremoveX").click(function(){
	var t = $(this);
	$.post("removefromcart.php",
	{
		item_id: t.attr('data-remove-id'),
	},
	function(d, s){
		console.log(d);
		if(d == 1){
			console.log("hello world");
			t.parent().parent().css('display', 'none');
		}
	});
});