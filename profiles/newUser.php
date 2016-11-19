
<?php 
    session_start();
    include("../includes/connect.php");
    //saves url so we can referance it for the appeneded errors from createUser.php
    $url = $_SERVER['REQUEST_URI'];
    
    /*
     * --------------------------------In newUser.php a few steps are handeled----------------------------------------------
     * Posts user input to createUser.php to create a user profile
     * This page also handels redirects from the createUser.php page
     * If the user input event name alrady exists or has invailed characters or is empty,
     * A error code is appended to the end of the URL by the createUser.php file
     * This file reads the URL to see what error code was appended and displays the corresponding error messege to teh user
     * ----------------------------------------------------------------------------------------------------------------------
     */
?>
<html>

<head>
    <?php include("../includes/addUserHead.php");?>
</head>

<body>
    <?php
        include("../includes/profileHeader.php");
    ?>
    <br><br><br><br><br><br>
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
                    //  !== false:  true, position is 0, ref http://us2.php.net/manual/en/language.operators.comparison.php
                    if (strpos($url, 'pmtc') !== false) {
                        echo " <div class='alert alert-warning'>
                                Passwords must match.
                                </div>";
                    }
                    if (strpos($url, 'char') !== false) {
                        echo " <div class='alert alert-warning'>
                                One or more fields contains forbidden characters or has too few characters.
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
                    
                    <input type="username" class="form-control" placeholder="Username" name="username"  required autofocus>
                </div>
                <div class="form-group input-lg">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group input-lg">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="passwordmatch" required>
                    <!--<p>Between 4 and 20 characters</p>-->
                </div>
                <div class="form-group input-lg">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <?php
                /*
                 * checks url for "free" or "premium" to know what account to pass tp createUsre.php
                 */
                if (strpos($url, 'premium') !== false) {
                    echo "<input name='account' type='hidden' value='premium'/>";
                }else{
                    echo "<input name='account' type='hidden' value='free'/> ";                   
                }
                ?>
                <button class="btn btn-small  btn-primary center-block">Create Account</button>
            </form>
        </div>
    </div>
</body>

</html>
