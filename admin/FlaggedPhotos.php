
<?php 

    /*
     *----------------- Displays the individual flagged images, and displays the list of reported images to review----------------------------------
     * - Checks user has permission to view contents of the page
     * - loops out the flagged image to be reviewed
     *----------------------------------------------------------------------------------------------------------------------------------------------
     */

    session_start(); 
    include('../includes/connect.php');
    
    //Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
    
    //gets the URL
    $url = $_SERVER['REQUEST_URI'];
    
    //Reads eveything after the ? 
    $filePath = substr($url, strpos($url, "?") + 1); 
    
    //Scrubs the url of any dangerious charicters that could be entered by the end user
    $filePath = stripslashes(trim($filePath));
    $filePath = escape_data($filePath);
    
    //handels the whitespace placholder in the URL
    $filePath =  str_replace("%20"," ",$filePath);

?>

<html>
    <head>
        <?php include('../includes/profileHead.php');?>
    </head>
    <body>
    <?php
        include ('../includes/profileHeader.php');?>
        <!-- Intro Section -->
        <section>
            <div class="container">
                <div style="height:79px"></div>    
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Admin Console</h2>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                    <li class="active">Photo</li>
                </ol>
                <?php
                    //loops out the image for review from the DB
                    $query = "SELECT * FROM reportedImages WHERE id = '$filePath'";   
                    $result = mysql_query($query); 
                    while ($row = mysql_fetch_assoc($result)) {
                        //loops out image and appends the filrpath of the image  to the ens of the URL after the ?.
                        echo "<a title='Image 1' href='#'><img class='thumbnail img-responsive center-block' src='../event/".$row['src']."'></a>";
                        $filePath = $row['src'];
                    }
                ?>
                <br
                <!--Directes the user to deletephoto.php and appends the filepathe to the end of the URL to be read-->
                <a href="deletePhoto.php?<?php echo $filePath; ?>"><button type="button" class="btn btn-danger btn-md" >Delete</button></a>
                <a href="releasePhoto.php?<?php echo $filePath; ?>"><button type="button" class="btn btn-success btn-md" >Release</button></a>
                <hr>
            </div>
        </section>
            <?php
            //include("includes/footer.php");
            ?>
        </section>
    </body>
</html>