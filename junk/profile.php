<?php
    
    include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Profile </title>
    <!-- Bootstrap CSS -->    
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css2/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css2/elegant-icons-style.css" rel="stylesheet" />
    <link href="css2/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />
    <link href="css2/profilepage.css" rel="stylesheet" />
  </head>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Profile </a>
            <!--logo end-->
      </header>      
      <!--header end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="icon_documents_alt"></i>Pages</li>
						<li><i class="fa fa-user-md"></i>Profile</li>
					</ol>
				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4>Jane Doe </h4>               
                              <div class="follow-ava">
                                  <img src="img/profile-avatar.jpg" alt="">
                              </div>
                              <h6>Web</h6>
                            </div>

                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Picture Collection
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">

                                  <!-- profile -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                                Hello I’m Jane Doe, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>First Name </span>: Jane  </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Last Name </span>: Doe</p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span>Birthday</span>: 27 August 1989</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Country </span>: Ireland</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Occupation </span>: UI Designer</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>:janedoe@mailname.com</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: (+6283) 456 789</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Phone </span>:  (+021) 956 789123</p>
                                              </div>
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Picture Collection</h1>
                                              <form class="form-horizontal" role="form">                                                  
                                                 <ul id="rig">
                                                <li>
                                                    <a class="rig-cell" href="#">
                                                        <img class="rig-img" src="img/user22.png" />
                                                        <span class="rig-overlay"></span>
                                                        <span class="rig-text">Electric</span>
                                                    </a>
                                                </li>
                                                   <li>
                                                    <a class="rig-cell" href="#">
                                                        <img class="rig-img" src="img/user22.png" />
                                                        <span class="rig-overlay"></span>
                                                        <span class="rig-text">Lorem Ipsum Dolor</span>
                                                    </a>
                                                </li>
                                                   <li>
                                                    <a class="rig-cell" href="#">
                                                        <img class="rig-img" src="img/user22.png" />
                                                        <span class="rig-overlay"></span>
                                                        <span class="rig-text">Lorem Ipsum Dolor</span>
                                                    </a>
                                                </li>
                                                   <li>
                                                    <a class="rig-cell" href="#">
                                                        <img class="rig-img" src="img/user22.png" />
                                                        <span class="rig-overlay"></span>
                                                        <span class="rig-text">Lorem Ipsum Dolor</span>
                                                    </a>
                                                </li>
                                                   <li>
                                                    <a class="rig-cell" href="#">
                                                        <img class="rig-img" src="img/user22.png" />
                                                        <span class="rig-overlay"></span>
                                                        <span class="rig-text">Lorem Ipsum Dolor</span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js2/jquery.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js2/jquery.scrollTo.min.js"></script>
    <script src="js2/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="js2/scripts.js"></script>

</body>

  </body>
</html>
