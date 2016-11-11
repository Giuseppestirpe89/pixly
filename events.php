<?php
    include("includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
?>

   <html lang="en">

   <head>
      <?php
   include("includes/head.php");
?>

            <?php
      include("includes/header.php");
  ?>
        
        <link href="css/photos2.css" rel="stylesheet" type="text/css" />
 <!--style for butto nupload -->
<style> 
.btn-circle {
        width: 10px;
        height: 10px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        border-radius: 25px;
      }
</style>

   </head>
   <!--conyainer to upload pictures -->
   <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  
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
                                          <form action="upload.php" method="post" enctype="multipart/form-data">
                                             <input type="file" class="btn btn-success start" name="fileToUpload" id="fileToUpload"> </br>
                                             <p>Select image to upload:</P>
                                             <input type="submit" class="btn btn-warning cancel" value="Upload Image" name="submit">
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

         <section id="intro" class="intro-section3">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h1>Electric Picnic 2016</h1>

                     <!-- photos section -->
                     <section id="photos">
                        <div class='wrap'>
                           <div class='content'>
                              <div class="popup">
                              </div>
                           </div>
                        </div>
                        <!--<a class='button glyphicon glyphicon-plus'></a>-->
                     </section><br><br>
                     <!-- html for the upload model when clicked-->
                     <!--users can only upload to events id signed in or they have token, otherwise they will have to sign up for a account-->
                     <?php if($_SESSION['user'] || strpos($url, 'testtoken')){ ?>
                     <button type="button" class="btn btn-primary btn-circle" id="openUpload"><i class="glyphicon glyphicon-list"></i></button><br>
                     <?php }else{ ?>
                     <p>want to uplaod photos! create a account here</p>
                     <a href="profiles/newUser.php"><button type="button" class="btn btn-primary">Create account</button></a><br>
                     <?php } ?>
                     <!--https://developers.google.com/chart/infographics/docs/qr_codes-->
                     <?php 
                        $token="testtoken";
                        $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                        $qrToken = $actual_link."?".$token;
                        
                     ?>
                     <!--ref: https://developers.google.com/chart/infographics/docs/qr_codes-->
			            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $qrToken; ?>&choe=UTF-8"/>
			            
                     <br>
                     <br>
                  </div>
               </div>
            </div>
                  <?php
      include("includes/footer.php");
  ?>
         </section>

         </section>
     
            <!-- jQuery -->
            <script src="js/photos.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Scrolling Nav JavaScript -->
            <script src="js/jquery.easing.min.js"></script>
            <script src="js/scrolling-nav.js"></script>
   </body>

   </html>