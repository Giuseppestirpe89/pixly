function getRandomSize(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

var allImages = "";
var folder = "/getimages.php";

$.ajax({
    url : folder,
    success: function (data) {
      json = ($.parseJSON(data));
      
      $.each(json, function(data1, value) {
        $("#photos").append( "<img src='../event/Mysteryland/"+ value +"'>" );
        console.log(value);
      });
      
      
        // $(data).find("a").attr("href", function (i, val) {
        //     if( val.match(/\.(jpe?g|png|gif)$/) ) { 
        //         $(".content").append( "<img src='"+ folder + val +"'>" );
                
        //     } 
        // });
    }
});



$('#photos').append(allImages);

$('a').on('click', function(){
  $('.wrap, a').toggleClass('active');
  
  return false;
});



// for (var i = 0; i < 25; i++) {
//   var width = getRandomSize(200, 400);
//   var height =  getRandomSize(200, 400);
//   allImages += '<img src="../event/Mysteryland/'+getRandomSize(1, 6)+'.jpg" alt="pretty kitty">';