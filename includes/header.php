<!--    
        LOGIN FORM!!
        This modal acts as a loging for and also link to create new accounts
        The login form is sent to includes/loginVal.php where the users info is validated, session created and then redrected to index.php
        If a new account is needed theres a link to profiles/newUser.php
-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log in</h4>
                <!--is hidden when javascript is enabled -->
                <noscript>
                  This page needs JavaScript enabled. 
                  <style>div { display:none; }</style>
                </noscript>
            </div>
            <div class="modal-body">
                <form action='includes/loginVal.php' method='post'>
                    <div class="form-group">
                        <label for="exampleInputEmail1" id="t">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" required autofocus >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required >
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                    <a href="priceplan.php">
                        <p>Dont have a account?</p>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!--END OF LOGIN-->


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
            <a class="fa fa-home navbar-brand page-scroll" href="index.php"> Menu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="contact.php">Contact</a>
                </li>
                <?php
                
                /*
                 * content only becomes available to logged in users 
                 */
                 
                if($_SESSION['user']) { 
                    
                    /*
                     * Admin.php is premium content we cross referance the IP used to start the session with the one the client is now using
                     * it also checks the ID string generated on login that is saved in a cookie and the session against each other
                     */
                     
                    if($_SESSION['premium']=='true' && $_SESSION['ip'] == get_client_ip_env() && $_COOKIE['cookieId'] == $_SESSION['cookieId']) { 
                                    
                    ?>
                    <li>
                        <a class="page-scroll" href="admin.php">Dashboard</a>
                    </li>
                    <?php } ?>
                    
                    
                    <?php 
                    /*
                     * The site administrators can view security logs and vet flagged content
                     */
                    if($_SESSION['premium']=='admin' && $_SESSION['ip'] == get_client_ip_env() && $_COOKIE['cookieId'] == $_SESSION['cookieId']) { 
                    ?>
                    <li>
                    <a class="page-scroll" href="admin.php">Dashboard</a>
                    </li>
                    <li>
                    <a class="page-scroll" href="admin/adminConsole.php">Admin Console</a>
                    </li>
                    <?php } ?>
                    
                    
                    <li>
                        <a class="page-scroll" href="includes/killSession.php">Logout</a>
                    </li>
                <?php  } ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <!--if signed in the "profile button is displayed"-->
                <?php  if($_SESSION['user']) { ?>

                <li><a class="color_animation" href="profiles/<?php echo $_SESSION['user'];?>.php"><span class="glyphicon glyphicon-user white" style="text-color: white"></span>  <?php echo $_SESSION['user'];?></a></li>
                <?php  } ?>
                <li>
                    <!--If the user is logged in the see the 'Add Event' button-->
                    <?php  if($_SESSION['user']) { ?>
                    <a href="eventPages/createEventPage.php" style="padding: 0px;"><button type="button" class="btn btn-info btn-lg">Add Event</button></a>
                    
                    <!--If not they get a login button-->
                    <?php  }else{  ?>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login </button>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog"></div>
                    </div>
                    <?php  }  ?>
                </li>
            </ul>
        </div>
            <!-- /.navbar-collapse -->
    </div>
            <!-- /.container -->
</nav>
