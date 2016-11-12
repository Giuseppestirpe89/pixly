
<?php
    session_start();
    include("includes/connect.php");
    $url = $_SERVER['REQUEST_URI'];
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
                  /*
                   * failed attempts are redirected back to this file from loginVal.php
                   * the url is appended with error,char or pmtc which we read to know what error to display
                   * the URL can be manipulated by the und user so we try not to pass information through it
                   * but in this case all the information does is select a error messege so there is no security risk involved
                   */
                   
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