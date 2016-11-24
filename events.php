
<?php

    /*--------------------------------- loads the main index page ----------------------------------
     * - includeds the eventBanner which loads the imaged
     * ---------------------------------------------------------------------------------------------
     */
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
      
        <!-- Intro Section -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                     
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
         
        </section>
        <!-- About Section -->
        <section >
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