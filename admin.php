<?php
    include("includes/connect.php");
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Pixly admin</title>
    <!-- Admin CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-theme.css" rel="stylesheet">
    <link href="../css2/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css2/font-awesome.min.css" rel="stylesheet" />
    <link href="../css2/style.css" rel="stylesheet">
    <link href="../css/social.css" rel="stylesheet">
    <link href="./css2/style-responsive.css" rel="stylesheet" />
    <!-- javascript -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/ChartAjax.js"></script>

    <?php
            include("includes/head.php");
        ?>
  </head>
  
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <?php
            include("includes/header.php");
        ?>
      <!-- Intro Section -->
      <!-- container section start -->
      <section id="container" class="">
        <!--main content start-->
        <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_piechart"></i> Stats</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                  <li><i class="icon_piechart"></i>Chart</li>
                </ol>
              </div>
            </div>
            <div class="row">
              <!-- chart canvas start -->
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    <h3>General Chart</Char>
                  </header>
                  <div class="panel-body">
                    <div class="tab-pane" id="chartjs">
                      <div class="row">
                        <!-- Radar -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Radar
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                        <!-- Bar -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Bar
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas2" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Line -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Line
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas3" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                        <!-- Polar Area -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Polar Area
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas4" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                      </div>
                      <div class="row">
                        <!-- Pie -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Pie
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas5" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                        <!-- Doughnut -->
                        <div class="col-lg-6">
                          <section class="panel">
                            <header class="panel-heading">
                              Doughnut
                            </header>
                            <div class="panel-body text-center">
                              <canvas id="mycanvas6" height="200" width="350"></canvas>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </section>
            </div>
            <!-- chart canvas finish -->
            </div>
          </section>

          <!-- Footer section -->
          <?php
                include("includes/footer.php");
            ?>
        </section>
  </body>
  </html>
