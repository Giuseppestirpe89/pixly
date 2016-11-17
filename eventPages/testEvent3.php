<!--
    index.php is the main page
    it displays the featured pages
    as well the events
-->

<?php
    
    include("../includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
    //gets the name of the PHP file so it can be referanced for the SQL query
    $thisFile = $url;
    $file = basename($thisFile);         
    $filename = basename($thisFile, ".php");
    $filename = "testEvent3";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include("../includes/profileHead.php");
        ?>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <?php
            include("../includes/profileHeader.php");
        ?>
        <link href="../css/photos3.css" rel="stylesheet">
        <!--<script type="text/javascript" src="js/photos2.js"></script>-->
        <!-- Intro Section -->
        <section id="intro" class="intro-section">
           <div class="container">
              <div class="row">
                 <div class="container">
                    <div class="row">
                        <?php
                            $query = "SELECT * FROM images WHERE event = '$filename' ORDER BY likes DESC";
                            $result = mysql_query($query); 
                            // outer while loop extracts all images
                            while ($row = mysql_fetch_assoc($result)) { 
                              echo "<div class='col-lg-3 col-sm-4 col-xs-6'><a title='Image 1' href='#'><img class='thumbnail img-responsive' src='../event/".$row['event']."/".$row['imageName']."'></a></div>";
                            }
                        ?>
                       <hr>
                       <hr>
                    </div>
                   
                 </div>
                 <div tabindex="-1" class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <button class="close" type="button" data-dismiss="modal">×</button>
                             <h3 class="modal-title">Heading</h3>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                             <button class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                       </div>
                    </div>
                 </div>
                 
                  <!-- html for the upload model when clicked-->
                     <!--users can only upload to events id signed in or they have token, otherwise they will have to sign up for a account-->
                     <?php if($_SESSION['user'] || strpos($url, 'testtoken')){ ?>
                     <button type="button" class="btn btn-primary btn-circle" id="openUpload"><i class="glyphicon glyphicon-list"></i></button><br>
                     <?php }else{ ?>
                     <p>want to uplaod photos! create a account here</p>
                     <a href="../priceplan.php"><button type="button" class="btn btn-primary">Create account</button></a><br>
                     <?php } ?>

                     <?php 
                     // TEST PHP TO GENERATE TOKEN
                        $token="testtoken";
                        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                        $qrToken = $actual_link."?".$token;
                     ?>
                     
                     <a id="downloadLnk" download="YourFileName.jpg">
                     <!--ref: https://developers.google.com/chart/infographics/docs/qr_codes-->
			            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $qrToken; ?>&choe=UTF-8"/>
			            </a>
			            
			            <!--Opens QR code in new tab so it can be view or downloaded as a PNG-->
			            <script>
                       var img = document.images[0];
                       img.onclick = function() {
                         var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
                        window.open(url);
                       };
                     </script>
              </div>
           </div>
        </section>
        <section>
            
        </section>


        <section>
        <!-- Footer section -->
        <?php
            // include("../includes/profileFooter.php");
        ?>
        </section>
    </body>

    </html>