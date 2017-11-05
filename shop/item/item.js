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

$(".write-review-star").hover(
	function(){
		$($(".write-review-star")[4]).prevAll().removeClass('fa-star').addClass('fa-star-o');
		$($(".write-review-star")[4]).removeClass('fa-star').addClass('fa-star-o');

		$(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
		$(this).removeClass('fa-star-o').addClass('fa-star');
	},
	function(){
		var stars = $(".write-review-star");
		if($("#stars-selected").val() > 0){
			$(this).prevAll().removeClass('fa-star').addClass('fa-star-o');
			$(this).removeClass('fa-star').addClass('fa-star-o');

			$($(stars)[$("#stars-selected").val() - 1]).prevAll().removeClass('fa-star-o').addClass('fa-star');
			$($(stars)[$("#stars-selected").val() - 1]).removeClass('fa-star-o').addClass('fa-star');
		}else{
			$(this).prevAll().removeClass('fa-star').addClass('fa-star-o');
			$(this).removeClass('fa-star').addClass('fa-star-o');
		}
	}
);

$(".write-review-star").click(function(){
	$("#submitreviewerror").hide();
	$($(".write-review-star")[4]).prevAll().removeClass('fa-star').addClass('fa-star-o');
	$($(".write-review-star")[4]).removeClass('fa-star').addClass('fa-star-o');
	$("#stars-selected").val($(this).attr('data-val'));
	$(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
	$(this).removeClass('fa-star-o').addClass('fa-star');
});

$("#review-text").keyup(function(){
	if($("#review-text").val().trim() != ""){
		$("#submitreviewerror").hide();
	}else{
		$("#submitreviewerror").html("You must give this review text");
		$("#submitreviewerror").show();
	}
});

window.addEventListener("load", function(){
	var form = document.getElementById("submitreviewform");
	form.addEventListener("submit", function(event){
		if(checkFormValid() == false){
			event.preventDefault();
			event.stopPropagation();
		}
	}, false);
}, false);

function checkFormValid(){
	if($("#stars-selected").val() == 0){
		$("#submitreviewerror").html("You must give this review stars");
		$("#submitreviewerror").show();
		return false;
	}
	if($("#review-text").val().trim() == ""){
		$("#submitreviewerror").html("You must give this review text");
		$("#submitreviewerror").show();
		return false;
	}

	$("#submitreviewerror").hide();
	return true;
};
