$('#review-modal').modal('show');
$(".write-review-star").hover(
	function(){
    $(this).parent().children(".write-review-star").removeClass('fa-star').addClass('fa-star-o');
    $(this).removeClass('fa-star-o').addClass('fa-star');
    var hoverlist = $(this).parent().children(".write-review-star").slice(0, $(this).attr('data-val'));
    for(var i = 0; i <= $(this).attr('data-val')-1; i+=1){
      $(hoverlist[i]).removeClass('fa-star-o').addClass('fa-star');
    }
	},
	function(){
    var starlist = $(this).parent().children(".write-review-star");
    if($($(this).parent().children(".stars-selected")[0]).val() > 0){
      $(this).parent().children(".write-review-star").removeClass('fa-star').addClass('fa-star-o');
      $(this).parent().children(".write-review-star").slice(0, $($(this).parent().children(".stars-selected")[0]).val()).removeClass('fa-star-o').addClass('fa-star');
    }else{
      $(this).parent().children(".write-review-star").removeClass('fa-star').addClass('fa-star-o');
    }
	}
);

$(".write-review-star").click(function(){
  $($(this).parent().parent().siblings()[1]).hide();
	$($(this).parent().children(".write-review-star")[4]).prevAll().removeClass('fa-star').addClass('fa-star-o');
	$($(this).parent().children(".write-review-star")[4]).removeClass('fa-star').addClass('fa-star-o');
	$($(this).parent().children(".stars-selected")[0]).val($(this).attr('data-val'));
	$(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
	$(this).removeClass('fa-star-o').addClass('fa-star');
});

$(".review-text").keyup(function(){
	if($(this).val().trim() != ""){
    $($(this).parent().siblings(".submitreviewerror")[0]).hide();
	}else{
    $($(this).parent().siblings(".submitreviewerror")[0]).html("You must give this review text");
    $($(this).parent().siblings(".submitreviewerror")[0]).show();
	}
});

window.addEventListener("load", function(){
	var forms = document.getElementsByClassName("submitreviewform");
  for(var i = 0; i < forms.length; i += 1){
    forms[i].addEventListener("submit", function(event){
      if(checkFormValid($(this))){
        var $this = $(this);
        $.ajax({
          type: 'POST',
          url: 'utils/writereview.php',
          data: $(this).serialize(),
          success: function(resp){
            if(resp == 1){
              console.log($($this).siblings());
              $($this).css('display', 'none');
              $($($this).siblings()[0]).css('display', 'block');
            }
          }
        });
      }
        event.preventDefault();
        event.stopPropagation();
      }, false);
  }
}, false);


function checkFormValid(form){
	if($($(form).find(".stars-selected")[0]).val() == 0){
    $($(form).find(".submitreviewerror")[0]).html("You must give this review stars");
    $($(form).find(".submitreviewerror")[0]).show();
		return false;
	}
	if($($(form).find(".review-text")[0]).val() == ""){
    $($(form).find(".submitreviewerror")[0]).html("You must give this review text");
    $($(form).find(".submitreviewerror")[0]).show();
		return false;
	}

  $($(form).find(".submitreviewerror")[0]).hide();
	return true;
};
