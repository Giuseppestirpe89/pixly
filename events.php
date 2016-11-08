<html lang="en">
<head>
  <?php
            include("includes/head.php");
        ?>
</head>

 <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <?php
            include("includes/header.php");
        ?>
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
                        <h2>Add a picture!</h2>
                           <form action="upload.php" method="post" enctype="multipart/form-data">
                              Select image to upload:
                              <input type="file" name="fileToUpload" id="fileToUpload">
                              <input type="submit" value="Upload Image" name="submit">
                           </form>
                        </div>
                     </div>
                  </div>
                  <a class='button glyphicon glyphicon-plus'></a>
               </section>
            </div>
         </div>
      </div>
      </div>
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