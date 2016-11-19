<!--    
        LOGIN FORM!!
        The login form is sent to includes/loginVal.php where the users info is validated, session created and then redrected to index.php
        If a new account is needed theres a link to profiles/newUser.php
-->


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
            <a class="fa fa-home navbar-brand page-scroll" href="../index.php"> Menu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="../events.php">Events</a>
                </li>
                <li>
                    <a class="page-scroll" href="../contact.php">Contact</a>
                </li>
                <?php
                //Content only becomes available to users logged in
                if($_SESSION['user']) { 
                            /*
                             * Admin.php is premium content we cross referance the IP used to start the session with the one in the current client request to ensure it is the same user
                             * it also checks the ID string generated on login that is saved in a cookie and the session against each other
                             */
                            if($_SESSION['premium']=='true' && $_SESSION['ip'] == get_client_ip_env() && $_COOKIE['cookieId'] == $_SESSION['cookieId']) { 
                ?>
                <li>
                    <a class="page-scroll" href="../admin.php">Admin</a>
                </li>
                            <?php } ?>
                <li>
                    <a class="page-scroll" href="../includes/killSession.php">Logout <?php echo $_SESSION['user'];?></a>
                </li>
                <?php  } ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Button for sign in model-->

                <?php  if($_SESSION['user']) { ?>

                <li><a class="color_animation" href="../profiles/<?php echo $_SESSION['user'];?>.php"><span class="glyphicon glyphicon-user white" style="text-color: white"></span> PROFILE</a></li>
                <?php  }  ?>
                <li>
                    <?php  if($_SESSION['user']) { ?>
                    <a href="../eventPages/createEventPage.php" style="padding: 0px;"><button type="button" class="btn btn-info btn-lg">Add Event</button></a>
                    <?php  }else{  ?>
                    <a href="../failedLogin.php" style="padding: 0px;"><button type="button" class="btn btn-info btn-lg">Login</button></a>
                    <?php  }  ?>
                </li>
            </ul>
        </div>
            <!-- /.navbar-collapse -->
    </div>
            <!-- /.container -->
</nav>
