<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="js/thumbnail-slider.css" rel="stylesheet" type="text/css" />
   <script src="js/thumbnail-slider.js" type="text/javascript"></script>
   <style>
      .carousel-inner>.item>img,
      .carousel-inner>.item>a>img {
         width: 25%;
         margin: auto
      }
      
    </style>
   <title> Pixly &copy; </title>
   <!-- Bootstrap Core CSS -->
   <script type="text/javascript" src="js/jquery.placeholder.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/social.css" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="css/scrolling-nav.css" rel="stylesheet">
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!--google apis for the map -->
   <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
   <!--javascript to get map id and dispaly on contact section -->
   <script type="text/javascript">
      // When the window has finished loading create our google map below
      google.maps.event.addDomListener(window, 'load', init);

      function init() {
         // Basic options for a simple Google Map
         // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
         var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 14,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(53.3470497, -6.2444561), // Dublin
            scrollwheel: false,
         };
         // Get the HTML DOM element that will contain your map 
         // We are using a div with id="map" seen below in the <body>
         var mapElement = document.getElementById('map');
         // Create the Google Map using our element and options defined above
         var map = new google.maps.Map(mapElement, mapOptions);
         // Let's also add a marker 
         var marker = new google.maps.Marker({
            position: new google.maps.LatLng(53.3486893, -6.2453144),
            map: map,
            title: 'NCI'
         });
      }
   </script>
   </script>
 <!-- Navigation -->
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
         <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            <a class="navbar-brand page-scroll" href="#page-top">Menu</a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
               <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
               <li class="hidden">
                  <a class="page-scroll" href="#page-top"></a>
               </li>
               <li>
                  <a class="page-scroll" href="#events">Events</a>
               </li>
               <li>
                  <a class="page-scroll" href="#about">About</a>
               </li>
               <li>
                  <a class="page-scroll" href="#contact">Contact</a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
   </nav>
   <!-- Intro Section -->
   <section id="intro" class="intro-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h1>Feautured Events</h1>
            </div>
         </div>
      </div>
      <!--start of thumbnails carousel-->
      <div id="thumbnail-slider">
         <div class="inner">
            <ul>
               <li>
                  <a class="thumb" href="img/2.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/3.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/4.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/5.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/6.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/7.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/8.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/9.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/10.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/11.jpg"></a>
               </li>
               <li>
                  <a class="thumb" href="img/12.jpg"></a>
               </li>
            </ul>
         </div>
      </div>
      </div>
   </section>
   <!-- About Section -->
   <section id="events" class="about-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h1>Selection of Main Events</h1>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="col-xs-12">
            <h3>Mysteryland</h3>
            <div class="well">
               <div id="myCarousel" class="carousel slide">
                  <!-- Carousel items line 1-->
                  <div class="carousel-inner">
                     <div class="item active">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                  </div>
                  <!--/carousel-inner--><a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
               </div>
               <!--/myCarousel-->
            </div>
            <!--/well-->
         </div>
      </div>
      <div class="container">
         <div class="col-xs-12">
            <h3>Electric Picnic</h3>
            <div class="well">
               <div id="myCarousel2" class="carousel slide">
                  <!-- Carousel items line 2-->
                  <div class="carousel-inner">
                     <div class="item active">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                  </div>
                  <!--/carousel-inner--><a class="left carousel-control" href="#myCarousel2" data-slide="prev">‹</a>
                  <a class="right carousel-control" href="#myCarousel2" data-slide="next">›</a>
               </div>
               <!--/myCarousel-->
            </div>
            <!--/well-->
         </div>
      </div>
      <div class="container">
         <div class="col-xs-12">
            <h3>Tomorrowland</h3>
            <div class="well">
               <div id="myCarousel3" class="carousel slide">
                  <!-- Carousel items line 1-->
                  <div class="carousel-inner">
                     <div class="item active">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                     <div class="item">
                        <div class="row">
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic2.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic3.png" alt="Image" class="img-responsive"></a>
                           </div>
                           <div class="col-xs-3">
                              <a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                           </div>
                        </div>
                        <!--/row-->
                     </div>
                     <!--/item-->
                  </div>
                  <!--/carousel-inner--><a class="left carousel-control" href="#myCarousel3" data-slide="prev">‹</a>
                  <a class="right carousel-control" href="#myCarousel3" data-slide="next">›</a>
               </div>
               <!--/myCarousel-->
            </div>
            <!--/well-->
         </div>
      </div>
   </section>
   <!-- Services Section -->
   <section id="about" class="services-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h1>About</h1>
               <p>Lorem ipsum dolor sit amet, in soluta senserit appellantur nec, pro graece percipitur at, ei veri repudiare conclusionemque qui. Oportere salutandi democritum pro te. Cum nulla pertinax intellegat ea. Vis in movet nostrud contentiones,
                  vix ex nihil officiis probatus. Eos errem utinam signiferumque id, at detracto adolescens voluptatum eam. Iusto intellegat id sea, verterem phaedrum pro et. An aliquid omittam verterem vel. Quod enim ei nec, no fugit fabellas verterem
                  nec. Viris nihil eu cum, veritus rationibus sententiae id per, te nullam dicunt eum. Mel quis munere iriure ut.An luptatum quaerendum pri, purto vituperata pro te. Ullum postulant te duo, aperiri albucius an pro. Ut vim everti noluisse
                  delectus. Sanctus euripidis moderatius pro cu, ne vix postea audiam, adhuc persequeris eos ut. Labore possim adipiscing usu at. Indoctum comprehensam usu id. Ex cum assum verear sensibus.Probo vivendum adipisci ius an, sit populo vidisse
                  cu. Fierent constituto contentiones nec ne, ei eum justo error. Tamquam scripserit instructior qui ea, usu cu latine ocurreret definitionem. Eam epicurei deseruisse in, vis ea eius causae. Usu soluta principes laboramus ex. Cu est munere
                  mediocritatem, prima tincidunt voluptatibus eum cu, prima comprehensam et vis.Ubique luptatum maiestatis mei te, nec solum recteque te. Virtute consectetuer ei vix. Cu tale eripuit ponderum quo. Has brute pericula contentiones cu, at
                  mel errem cetero. Duis utinam duo te
               </p>
               <br /> <br /><br /> <br /><br /> <br />
            </div>
            <div class="container content">
               <div class="heading">
                  <h2>Our <strong>Great Team</strong></h2>
                  <p>To try the most advanced business</p>
               </div>

               <!-- //end heading -->
               <div class="row">
                  <div class="col-sm-3">
                     <div class="team-members">
                        <div class="team-avatar">
                           <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member1.png" alt="">
                        </div>
                        <div class="team-desc">
                           <h4> Don whelan</h4>
                           <span>Security Expert</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="team-members">
                        <div class="team-avatar">
                           <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member1.png" alt="">
                        </div>
                        <div class="team-desc">
                           <h4>Giuseppe Stirpee</h4>
                           <span>Web Developer</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="team-members">
                        <div class="team-avatar">
                           <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member2.png" alt="">
                        </div>
                        <div class="team-desc">
                           <h4>Shane O'Mahony</h4>
                           <span>Cloud Expert</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="team-members">
                        <div class="team-avatar">
                           <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member3.png" alt="">
                        </div>
                        <div class="team-desc">
                           <h4>Patrick King</h4>
                           <span>Marketin and Pubblication</span>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- //end row -->
            </div>
         </div>
      </div>
   </section>
   <!-- Contact Section -->
   <section id="contact" class="contact-section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h1>Contact Section</h1>
            </div>
         </div> <br /> <br />
         <!--map id uset for the function on line 39 -->
         <div id="map" style="width:50%%;height:500px"></div>
         <br /> 
      </div>
      <!-- Footer section -->
      <div class="footer">
         <div class="row">
            <div class="btn-group btn-group-justified">
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-twitter fa-5x"></span>
                     <p>Twitter</p>
                  </button>
               </div>
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-facebook fa-5x"></span>
                     <p>Facebook</p>
                  </button>
               </div>
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-youtube fa-5x"></span>
                     <p>Youtube</p>
                  </button>
               </div>
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-google-plus fa-5x"></span>
                     <p>Google+</p>
                  </button>
               </div>
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-instagram fa-5x"></span>
                     <p>Instagram</p>
                  </button>
               </div>
               <div class="btn-group">
                  <button type="button" class="btn btn-nav">
                     <span class="fa fa-pinterest fa-5x"></span>
                     <p>Pinterest</p>
                  </button>
               </div>
            </div>
         </div>
         <h3> www.pixly.com &copy;</h3>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Scrolling Nav JavaScript -->
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/scrolling-nav.js"></script>
</body>

</html>