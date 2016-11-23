<?php $QRtoken =  '08efd14978135592aa42e5cd9';?><!--
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
    $filename =  str_replace("/eventPages/","",$variable);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include("../includes/profileHead.php");
        ?>
       <script>
        $( document ).ready(function() {
         $("#prompt").delay(2500).fadeOut("slow");
        });</script>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <?php
            include("../includes/profileHeader.php");
        ?>
                <div class="modal" id="uploadModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" style="overflow: hidden">
                        <div class="modal-dialog">
                           <div class="modal-content" style="text-align:center">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title" id="myModalLabel">Add new file</h4>

                              </div>
                              <div class="modal-body" id="modal-body">
                                 <div id="upload">
                                    <div class="fileupload-buttonbar">
                                       <div>
                                          <h2>Add a picture!</h2>
                                          <form action="../upload.php" method="post" enctype="multipart/form-data">
                                             <input type="file" class="btn btn-success start" name="fileToUpload" id="fileToUpload"> </br>
                                             <p>Select image to upload:</P>
                                             <input type="submit" class="btn btn-warning cancel" value="Upload Image" name="submit">
                                             <input name='event' type='hidden' value='<?php echo $filename; ?>'/>
                                             </form>
                                       </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                    <!--<table class="table table-striped">
                        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
                    </table>-->
                                    <ol class="files upload-files-list"></ol>
                                    <!--files go here-->
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
        <link href="../css/photos3.css" rel="stylesheet">
        <!-- Intro Section -->
        <section id="intro" class="intro-section">
           <div class="container">
              <div class="row">
                 <div class="container">
                 <h1><?php echo $filename; ?></h1>
                <div style = "height:70px">
                <?php
                    if (strpos($url, 'E1') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    File is not an image.
                                    </div>";
                    }
                    if (strpos($url, 'E2') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    Sorry, file already exists.
                                    </div>";
                    }
                    if (strpos($url, 'E3') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    Sorry, your file is too large.
                                    </div>";
                    }
                    if (strpos($url, 'E4') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                                    </div>";
                    }
                    if (strpos($url, 'E5') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    Sorry, your file was not uploaded.
                                    </div>";
                    }
                    if (strpos($url, 'E6') !== false) {
                            echo " <div class='alert alert-danger' id='prompt'>
                                    Sorry, there was an error uploading your file.
                                    </div>";
                    }
                    
                ?>
                 </div>
                    <div class="row">
                        <!--ref: http://bootsnipp.com/snippets/7XVM2-->
                        <?php
                            $query = "SELECT * FROM images WHERE event = '$filename' ORDER BY likes DESC";
                            $result = mysql_query($query); 
                            // outer while loop extracts all images
                            while ($row = mysql_fetch_assoc($result)) { 
                               if (strpos($url, 'reportimage') !== false) {
                                    echo " 
                                    <div class='col-lg-3 col-sm-4 col-xs-6'>
                                    <a title='Image 1' href='#'>
                                     <img class='thumbnail img-responsive' src='../event/".$row['event']."/".$row['imageName']."'>
                                    </a>
                                    <a href='reportImage.php?".$row['event']."/".$row['imageName']."'>report</a>
                                    </div>";
                                }else{
                                    echo "
                                    <div class='col-lg-3 col-sm-4 col-xs-6'>
                                    <a title='Image 1' href='#'>
                                     <img class='thumbnail img-responsive' src='../event/".$row['event']."/".$row['imageName']."'>
                                    </a>
                                    </div>";
                                }
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
                 <br><br>
                 
                  <!-- html for the upload model when clicked-->
                     <!--users can only upload to events id signed in or they have token, otherwise they will have to sign up for a account-->
                     <?php if($_SESSION['user'] || strpos($url, 'testtoken')){ ?>
                     <button type="button" class="btn btn-primary btn-circle" id="openUpload"><i class="glyphicon glyphicon-list"></i></button><br>
                     <?php }else{ ?>
                     <p>Want to uplaod photos! create a account here</p>
                     <a href="../priceplan.php"><button type="button" class="btn btn-primary">Create account</button></a><br>
                     <?php } ?>

                     <?php 
                     // TEST PHP TO GENERATE TOKEN
                        $token="testtoken";
                        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                        $qrToken = $actual_link."?".$token;
                     ?>
                     <a href="<?php echo $url."?reportimage"?>"><span>report image</span></a>
                     <br><br>
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
            <br><br><br>
        </section>
        <section>
        <!-- Footer section -->
        <?php
             include("../includes/profileFooter.php");
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