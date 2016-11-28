<?php $QRtoken =  '16bb2a25b62c87f6b4a8b2781';?>
<?php

    /*
     *--------- this file is the template for the event pages, its contents are copied into new files and that then renamed to the event name, which creats events on the webserver------------------
     * - Decatinates the url into its individual parts
     * - If URL contains a trigger string it displays the corosponding error messege
     * - Loops out the images in that album in order of most liked 
     * - If URL contains a trigger string from the report button loops out the photos again with a report option below each image
     * - Shows a uplaod button if the user is logged in or if the url contains the correct Token string 
     * - If neither of these are present it displayes a create account button
     * - Displayes the QR code
     * ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     */
     
    session_start();
    include("../includes/connect.php");
    
    /*
     * decatinates the url into its individual parts
     */
     
    $url = $_SERVER['REQUEST_URI'];
    //gets the name of the PHP file so it can be referanced for the SQL query
    $thisFile = $url;
    //discatenates the url string to just the name of the file
    $file = basename($thisFile);     
    //removes the .php
    $filename = basename($thisFile, ".php");
    $variable = substr($thisFile, 0, strpos($thisFile, "."));
    //extracts the image file pathe from the url    
    $filename2 =  str_replace("/eventPages/","",$variable);
    //handels whitespace in the url
    $filename =  str_replace("%20","-",$filename2);
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
        <br> <br> <br>
        <link href="../css/photos3.css" rel="stylesheet">
        <!-- Intro Section -->
        <section id="intro" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <h1><?php echo $filename; ?></h1>
                        <div style = "height:70px">
                        <?php
                            /*
                             * - reads the url
                             * - if URL contains the correct string displayes the corrosponding error messege, which fads after 2.5 seconds
                             */
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
                            if (strpos($url, 'reported') !== false) {
                                    echo " <div class='alert alert-danger' id='prompt'>
                                            This Image has been reported.
                                            </div>";
                            }
                            
                        ?>
                        </div>
                        <div class="row">
                            <!--ref: http://bootsnipp.com/snippets/7XVM2-->
                            <?php
                            
                                /*
                                 * - loops out images in order of most liked
                                 * - nested if within that look that reads the URL
                                 * - if the URL containg the report image string appended to it 
                                 * - loops out the images with a 'report image' option at the end
                                 */
                                 
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
                    <?php 
                        if($_SESSION['user'] || strpos($url, $QRtoken)){ 
                    ?>
                    <button type="button" class="btn btn-primary btn-circle" id="openUpload"><i class="glyphicon glyphicon-list"></i></button><br>
                    <?php 
                        }else{ 
                    ?>
                    <p>Want to uplaod photos! create a account here</p>
                    <a href="../priceplan.php"><button type="button" class="btn btn-primary">Create account</button></a><br>
                    
                    <?php
                        } 
                    ?>

                    <?php 
                        // gets the full url
                        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                        // concatanates the $QRtoken to the end of the actual full url so traffic from the qy code do not have to create accounts
                        $QRlink = $actual_link."?".$QRtoken;
                    ?>
                    <a href="<?php echo $url."?reportimage"?>"><span>report image</span></a>
                    <br><br>
                    <a id="downloadLnk" download="YourFileName.jpg">
                        <!--
                            ref: https://developers.google.com/chart/infographics/docs/qr_codes
                            creates the qr code for the event with the token appended to the end
                        -->
    		            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $QRlink; ?>&choe=UTF-8"/>
		            </a>
		            <br><br><br><br><br><br>
		            <!--
		                Opens QR code in new tab so it can be view or downloaded as a PNG
		            -->
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
        <br><br><br><br><br><br><br>
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