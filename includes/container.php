<section id="container" class="">
<!--header start-->
<!--main content start-->
<section id="main-content">
   <section class="wrapper">
      <div class="row">
         <div class="col-lg-12">
            <div style=height:25px>
               
            </div>
            <div style=height:25px>
            <?php
                 if (strpos($url, 'updated') !== false) {
                     echo " <div class='alert alert-success' id='prompt'>
                             updated!
                            </div>";
                 }
            ?>
            </div>
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
         </div>
      </div>
      <div class="row">
         <!-- profile-widget -->
         <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
               <div class="panel-body">
                  <div class="col-lg-2 col-sm-2">
                     <h4> <?php echo $username;?></h4>
                     <div class="follow-ava">
                        <img src="../img/profile-avatar2.jpg" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- page start-->
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
               <header class="panel-heading tab-bg-info">
                  <ul class="nav nav-tabs">
                     <li class="active">
                        <a data-toggle="tab" href="#profile">
                        <i class="icon-user"></i> Profile
                        </a>
                     </li>
                  </ul>
               </header>
               <div class="panel-body">
                  <div class="tab-content">
                     <!-- profile -->
                     <div id="profile" class="tab-pane active">
                        <section class="panel">
                           <div class="bio-graph-heading">
                              <?php echo $username."'s Details" ?>
                           </div>
                           <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                 <div class="bio-row">
                                    <p><span>Username: </span> <?php echo $username; ?> </p>
                                 </div>
                                 
                                 <?php
                                    $query = "SELECT * FROM users WHERE username = '$username'";
                                    
                                    /*
                                     * mysql_query() was chosen over the other connection functions as it only allows one query to be sent to the DB
                                     * if a second query was introduced via SLQ injection the second query would not exacute 
                                     */
                                    
                                    $result = mysql_query($query); 
    
                                    // outer while loop extracts all images
                                    while ($row = mysql_fetch_assoc($result)) {
                                        $email = $row['email'];
                                        
                                    }
                                 ?>
                                <div class="bio-row">
                                <p><span>Username: </span> <?php echo $email; ?> </p>
                                </div>
                              </div>
                           </div>
                           <div class="bio-graph-heading">
                              <?php echo $username."'s Albums" ?>
                           </div>
                           <div class="panel-body bio-graph-info">
                               <?php include ("../profilePageBanner.php"); ?>
                           </div>
                        </section>
                        <section>
                        </section>
                     </div>
                     <!-- edit-profile -->
  
                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- page end-->
   </section>
</section>