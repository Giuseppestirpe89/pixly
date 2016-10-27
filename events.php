<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="js/thumbnail-slider.css" rel="stylesheet" type="text/css" />
   <link href="css/photos.css" rel="stylesheet" type="text/css" />
   <link href="js/photos.js" rel="stylesheet" type="text/css" />
   <script src="js/thumbnail-slider.js" type="text/javascript"></script>
   <title>Pixly </title>
   <!-- Bootstrap Core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/social.css" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="css/scrolling-nav.css" rel="stylesheet">
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
   <!-- Navigation -->
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
         <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            <a class="navbar-brand page-scroll" href="#page-top">Home</a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#events">Events</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Location</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="contact.php">Contact</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="admin.php">Admim</a>
                    </li>
                </ul>
            </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
   </nav>
   <!-- Intro Section -->
   <section id="intro" class="intro-section3">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h1>Electric Picnic 2016</h1>
               
               <!-- photos section -->
               <section id="photos">
                  <div class='wrap'>
                     <div class='content'>

                        <h2>Add a picture!</h2>
                        <div id='popup'>
                           <form action="upload.php" method="post" enctype="multipart/form-data">
                              Select image to upload:
                              <input type="file" name="fileToUpload" id="fileToUpload">
                              <input type="submit" value="Upload Image" name="submit">
                           </form>
                        </div>
                     </div>
                  </div>
                  <a class='button glyphicon glyphicon-plus' href='#'></a>
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