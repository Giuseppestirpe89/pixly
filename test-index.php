<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
         include("includes/head.php");
      ?>
   </head>
   <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
   <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
                              <div class="col-xs-3"><a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                           </div>
                           <!--/row-->
                        </div>
                        <!--/item-->
                        <div class="item">
                           <div class="row">
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg"  alt="Image" class="img-responsive"></a>
                              </div>
                           </div>
                           <!--/row-->
                        </div>
                        <!--/item-->
                        <div class="item">
                           <div class="row">
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg"  alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg"  alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                              <div class="col-xs-3"><a href="#x" class="thumbnail"><img src="img/pic4.jpg" alt="Image" class="img-responsive"></a>
                              </div>
                           </div>
                           <!--/row-->
                        </div>
                        <!--/item-->
                     </div>
                     <!--/carousel-inner--> <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                     <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                  </div>
                  <!--/myCarousel-->
               </div>
               <!--/well-->
            </div>
         </div>
      </section>
      
   </body>
      