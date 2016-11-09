
<?php 
    session_start();
    include("../includes/connect.php");
    //saves url so we can referance it for the appeneded errors from createUser.php
    $url = $_SERVER['REQUEST_URI'];
?>
<html>

<head>
    <?php include("../includes/head.php");?>
</head>

<body>
    <?php
        include("../includes/profileHeader.php");
    ?>
    <br><br><br>
    <div class="container">
        <div class="row" >
            <form class="form-signin" action='createUser.php' method='post'>
                <hr class="colorgraph">
                <div class="form-group">
                    <h2 class="form-signin-heading">Please create an account</h2>
                </div>
                <?php
                /*
                 * in creatUser before we redirect back here we append a error code to the URL
                 * we read this sp we know why the user has been redirected and display the appropriate error messege
                 */
                    if (strpos($url, 'pmtc') !== false) {
                        echo " <div class='alert alert-warning'>
                                Passwords must match.
                                </div>";
                    }
                    if (strpos($url, 'char') !== false) {
                        echo " <div class='alert alert-warning'>
                                One or more fields contains forbidden characters.
                                </div>";
                    }
                    if (strpos($url, 'error') !== false) {
                        echo " <div class='alert alert-warning'>
                                Invalid details.
                                </div>";
                    }
                    if (strpos($url, 'userE') !== false) {
                        echo " <div class='alert alert-warning'>
                                Username already exists.
                                </div>";
                    }
                    if (strpos($url, 'tfmt') !== false) {
                        echo " <div class='alert alert-warning'>
                                All fields must be filled in.
                                </div>";
                    }
                 ?>    
                <div class="form-group input-lg">
                    
                    <input type="username" class="form-control" placeholder="Username" name="username"  autofocus>
                </div>
                <div class="form-group input-lg">
                    <input type="password" class="form-control" placeholder="Password" name="password" >
                </div>
                <div class="form-group input-lg">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="passwordmatch" >
                    <!--<p>Between 4 and 20 characters</p>-->
                </div>
                <div class="form-group input-lg">
                    <input type="email" class="form-control" placeholder="Email" name="email" >
                </div>
                <button class="btn btn-small  btn-primary center-block">Create Account</button>
            </form>
        </div>
    </div>
</body>

</html>
