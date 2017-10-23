$(".orderdetail").click(function(){
	var order = $(this);
		
	if($(this).attr("data-open") == 'true'){
		$(order).parent().next().css('display', 'none');
		$(order).attr("data-open", "false");
	}else{
		$(order).parent().next().children(":first").html("");
		$.post("utils/getdetails.php",
		{
			item_list: $(this).attr("data-item-list"),
		},
		function(d, s){
			if(d != 0){
				var data = JSON.parse(d);
				$.each(data, function(key, value){
					var a = document.createElement('a');
					$(a).attr('href', "/myaccount/item/?id=" + key);
					$(a).html(value);
					var li = document.createElement('li');
					$(li).html(a);
					$(order).parent().next().children(":first").append(li);
					
					$(order).parent().next().css('display', 'block');
					$(order).attr("data-open", "true");
				});
				
			}		
		});
	}

	return false;
});