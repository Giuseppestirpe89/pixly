
<?php
    session_start();
    include("includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
    
    /*
     *------------- This page take redirects from failed loggin attempts from the includes/loginVal.php ------------------------
     * In the loginVal.php page when a users details are rejected, the user is redirected here
     * Appended to the URL from loginVal.php is a error code
     * We read that error code and use it to display the correct error messege to the user
     * We give the user the nesseserry text fields to retry their login attampt
     *---------------------------------------------------------------------------------------------------------------------------
     */
                   
?>

<!DOCTYPE html>
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
        <br><br><br><br>
        <section>
        <div class="container">
            <div class="row" style="margin-top:20px">
                <hr class="colorgraph">
                <form class="form-signin " action='includes/loginVal.php' method='post'>
        		<div class="form-group">
                <h2 class="form-signin-heading"> 
                    Please Log in!
                  
                </div>
                <?php 

                    //we use "!== false" instead of "true" as "false" values can be satisfied by a handful of values, such as an empty array, an empty string, a NULL, integer 0, etc.
                    if (strpos($url, 'error') !== false) {
                        echo " <div class='alert alert-warning'>
                                Username or password invalid.
                                </div>";
                    }
                    if (strpos($url, 'char') !== false) {
                        echo "Opps!</h2> <div class='alert alert-warning'>
                                Username or password contains forbidden characters.
                                </div>";
                    }
                    if (strpos($url, 'pmtc') !== false) {
                        echo "Opps!</h2> <div class='alert alert-warning'>
                                Passwords must match.
                                </div>";
                    }
                ?>
                <div class="form-group">
                    <input type="username" class="form-control input-lg" placeholder="Username" name="username"required autofocus>
                </div>
                <div class="form-group">
                    <input type="password"  class="form-control input-lg" placeholder="Password" name="password" required>
                </div>
                <div class="form-group text-center">
                <a href="priceplan.php">
                    <p>Dont have a account?</p>
                </a>
                </div>
                <button class="btn btn-lg  btn-primary center-block">Submit</button>
                </form>
            </div>
        </div>
        </section>
        <br><br><br><br><br><br><br>
        <section>    
            <?php
                include("includes/footer.php");
            ?>
        </section>
    </body>
</html>