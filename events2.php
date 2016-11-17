<?php
    include("includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
?>

   <html lang="en">

   <head>
      <?php
   include("includes/head.php");
?>

            <?php
      include("includes/header.php");
  ?>
        
<link href="css/photos2.css" rel="stylesheet" type="text/css" />
<link href="css/photos3.css" rel="stylesheet" type="text/css" />
 <script src="js/events2.js" type="text/javascript"></script>
 <script src="https://platform.twitter.com/widgets.js"></script>
 <div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


 <!--style for butto nupload -->
<style> 
.btn-circle {
        width: 10px;
        height: 10px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        border-radius: 25px;
      }
</style>
   </head>
   <!--conyainer to upload pictures -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
         <section id="intro" class="intro-section3">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h1>Electric Picnic 2016</h1>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350"></a> </div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/2255EE"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/2255EE"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/777"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/EEE"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 11" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/DDD"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
   
    <hr>
    
    <hr>
  </div>
</div>
<div tabindex="-1" class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 class="modal-title2">Heading</h3>
	</div>
	<div class="modal-body2">
		
	</div>
	<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" style="text-align=center">     
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>&emsp; 
<a class="twitter-follow-button"
  href="https://twitter.com/Pixly"
  data-size="small">Follow us</a> &emsp; Close </button>
	</div>
   </div>
  </div>
</div>
</div>


                  <?php
      include("includes/footer.php");
  ?>
         </section>
         </section>
     
            <!-- jQuery -->
            <script src="js/photos.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Scrolling Nav JavaScript -->
            <script src="js/jquery.easing.min.js"></script>
            <script src="js/scrolling-nav.js"></script>
   </body>

   </html>