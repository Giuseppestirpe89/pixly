$(document).ready(function() {
$('.thumbnail').click(function(){
      $('.modal-body2').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title2').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body2');
  	$('#myModal2').modal({show:true});
});
});