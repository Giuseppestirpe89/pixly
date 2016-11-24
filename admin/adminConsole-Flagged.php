 
<?php 

    /*
     *-------------------------------------------------- Displays the individual flagged images to review------------------------------------------
     * - Checks user has permission to view contents of the page
     * - loops out the files from the logged directory and groups them by priority
     *----------------------------------------------------------------------------------------------------------------------------------------------
     */
     
    session_start(); 
    include('../includes/connect.php');
    
    //Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
    $url = $_SERVER['REQUEST_URI'];
    
?>
<html>
    <head>
        <?php include('../includes/profileHead.php');?>
        <script>
            $( document ).ready(function() {
             $("#prompt").delay(2500).fadeOut("slow");
            });
        </script>
    </head>
    <body>
        <?php include ('../includes/profileHeader.php'); ?>
        <section>
            <div class="container">
                <div style="height:79px">
                </div>    
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Admin Console</h2>
                        <div style="height:55px">
                        <!-- displays error messeges if URL contains 'deleted' or 'released'-->
                        <?php
                            if (strpos($url, 'removed') !== false) {
                                    echo " <div class='alert alert-danger' id='prompt'>
                                     The Image has been removed.
                                     </div>";
                            }
                            if (strpos($url, 'released') !== false) {
                                echo " <div class='alert alert-success' id='prompt'>
                                 The Image has been released.
                                 </div>";
                            }
                        ?>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <ul class="nav nav-tabs">
                    <li><a href="adminConsole.php">Home</a></li>
                    <li><a href="adminConsole-Security.php">Security logs</a></li>
                    <li class="active"><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                </ul>
                <br>
                <?php
                    $flaggedImages = false;
                    //loops out filepaths of flagged images to be reviewed        
                    $query = "SELECT * FROM reportedImages";   
                    $result = mysql_query($query); 
                    $flagcount = 0;
                    while ($row = mysql_fetch_assoc($result)) {
                        //links to FlaggedPhotos.php and appends the image ID to the end of the URL
                        echo "<a href='FlaggedPhotos.php?".$row['id']."'>id :".$row['id']." - image: ".$row['src']."</a><br>";
                        $flagcount++;
                        $flaggedImages = true;
                        
                    }
                    if($flagcount == 0){
                        echo"There are no images flagged at this time";
                    }
                    
                    // we dont check for expected results here ar there is no user input inserted into the SQL Query
                ?>
                <hr>
            </div>
        </section>
        <section>
        <?php
            //include("includes/footer.php");
        ?>
        </section>
    </body>
</html> 
