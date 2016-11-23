<!--
    index.php is the main page
    it displays the featured pages
    as well the events
-->

<?php
    $url = $_SERVER['REQUEST_URI'];
    include("includes/connect.php");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include("includes/head.php");
        ?>
        <!--script has fade effect on error messeges-->
    <script>
        $( document ).ready(function() {
         $("#prompt").delay(2500).fadeOut("slow");
        });
    </script>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <?php
            include("includes/header.php");
        ?>
        <!--fancy header -->
        <div class="demo-3">
			<div class="content">
                <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                    <h1 class="main-title">Pixly</h1>
                </div>
            </div>
            <!-- Related demos -->
		</div><!-- /container -->
        <script src="js/TweenLite.min.js"></script>
        <script src="js/EasePack.min.js"></script>
        <script src="js/rAF.js"></script>
        <script src="js/demo-3.js"></script>
        
        <!-- Intro Section -->
        <section id="intro" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h2>Featured Event</h2>
                        <div style=height:70px>
                        <?php
                            if (strpos($url, 'inactive') !== false) {
                                echo " <div class='alert alert-danger' id='prompt'>
                                 You have been logged out due to inactivity.
                                 </div>";
                            }
                            
                            if (strpos($url, 'reported') !== false) {
                                echo " <div class='alert alert-danger' id='prompt'>
                                 The Image has been reported.
                                 </div>";
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--start of Premium thumbnails carousel-->
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <li>
                            <a class="thumb" href="img/1.jpg"></a>
                        </li>
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
                        <li>
                            <a class="thumb" href="img/13.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="img/14.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="img/15.jpg"></a>
                        </li>
                    </ul>
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
            <!-- 
            eventBanner.php generates the content for index.php it loops out all the events from the DB
            -->
            <?php
                include("eventBanner.php");
            ?>
        </section>
        <!--<section>-->
        <!-- Footer section -->
        <?php
            include("includes/footer.php");
        ?>
        </section>
    </body>

    </html>