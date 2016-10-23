
<!--
    Slug page
    THIS IS A WORKING PROTOTYPE OF THE INDEX PAGE THAT IS DYNAMICALLY POPULATED FROM THE DB
    !! DO NOT ALTER, MOVE OR DELETE!!
-->

<?php
    include("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include("includes/head.php");
        ?>
    </head>
    <!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
    
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
        <?php
            include("includes/header.php");
        ?>
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
            <!-- 
                eventBanner.php generates the content for index.php it loops out all the events from the DB
            -->
            <?php
                include("eventBanner.php");
            ?>
        </section>
        
        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Location</h1>
                    </div>
                </div> <br /> <br />
                <!--map id uset for the function on line 39 -->
                <div id="map" style="width:50%%;height:500px"></div>
                <br />
            </div>
            <!-- Footer section -->
            <?php
                include("includes/footer.php");
            ?>
    </body>

</html>