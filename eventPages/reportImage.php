<!--
    index.php is the main page
    it displays the featured pages
    as well the events
-->

<?php
    session_start();
    include("../includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
    //gets the name of the PHP file so it can be referanced for the SQL query
    $thisFile = $url;
    //discatenates the url string to just the name of the file
    $file = basename($thisFile);         
    $filename = basename($thisFile, ".php");
    $variable = substr($thisFile, 0, strpos($thisFile, "."));
    $filename2 =  str_replace("/eventPages/","",$variable);
    $filename =  str_replace("%20","-",$filename2);
    //ref: http://stackoverflow.com/questions/11405493/get-everything-after-a-certain-character
    $filepath = substr($url, strpos($url, "?") + 1);    
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include("../includes/profileHead.php");
        ?>
        <!--fades out error messege-->
        <script>
        $( document ).ready(function() {
         $("#prompt").delay(2500).fadeOut("slow");
        });
        </script>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <?php
            include("../includes/profileHeader.php");
        ?>
        <div style="height:100px"></div>
       
        <section>
            <h2 class="text-center">Are you sure you want to report this image?</h2>
            <?php 
                echo "
                <div>
                <a title='Image 1' href='#'><img class='thumbnail img-responsive center-block' src='../event/".$filepath."'></a>
                <a href='report.php?".$filepath."'><button type='button' class='btn btn-danger btn-md center-block' >Report</button></a>
                </div> 
                <br>
                <hr>"
                
            ;?>
        </section>

        
        <!-- Footer section -->
        <?php
            // include("../includes/profileFooter.php");
        ?>
        </section>
         <script src="../js/photos.js"></script>
         <!-- Bootstrap Core JavaScript -->
            <script src="../js/bootstrap.min.js"></script>
            <!-- Scrolling Nav JavaScript -->
            <script src="../js/jquery.easing.min.js"></script>
            <script src="../js/scrolling-nav.js"></script>
    </body>

    </html>