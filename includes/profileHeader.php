<!--LOGIN FORM-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log in</h4>
            </div>
            <div class="modal-body">
                <form action='../includes/loginVal.php' method='post' >
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>
                <a href="../profiles/newUser.php"><p>Dont have a account?</p></a>
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
            <a class="navbar-brand page-scroll" href="../index.php">Menu</a>
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
                    <a class="page-scroll" href="#location">Location</a>
                </li>
                <li>
                    <a class="page-scroll" href="../contact.php">Contact</a>
                </li>
                <?php  if($_SESSION['user']) { ?>
                <li>
                    <a class="page-scroll" href="../admin.php">Admin</a>
                </li>
                 <li>
                    <a class="page-scroll" href="../includes/killSession.php">Logout <?php echo $_SESSION['user'];?></a>
                </li>
                 <?php  } ?> 
        
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Button for sign in model-->
               
                <?php  if($_SESSION['user']) { ?>

                <li><a class="color_animation" href="<?php echo $_SESSION['user'];?>.php"><span class="glyphicon glyphicon-user white" style="text-color: white"></span> PROFILE</a></li>
                <?php  } ?>
                 <li>    
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login </button>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                </li>
            </ul>
            </div>
            <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
</nav>