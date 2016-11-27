
<?php 

    /*
     * ---------------------- this is the Admin console it displays a dashboard of summerised repoted images and security loggs ---------------------------------
     * - Checks user has permission to view contents of the page
     * - Counts the amount of standard and important security logs and displays a count of both
     * - Counts the amount of reported images and displays a count of them
     *-----------------------------------------------------------------------------------------------------------------------------------------------------------
     */
     
    session_start(); 
    include('../includes/connect.php');
    
    //Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
?>
<html>
    <head>
        <?php include('../includes/profileHead.php');?>
    </head>
    <body>
        <?php include ('../includes/profileHeader.php');?>

        <section>
            <div class="container">
                <div style="height:79px">
                </div>    
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Admin Console</h2>
                         <div style=height:55px></div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="adminConsole.php">Home</a></li>
                    <li><a href="adminConsole-Security.php">Security logs</a></li>
                    <li><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                </ul>
                <br>
                Security Logs:<br><br>
                <?php
                    $dir = "../logs/records";
                    $countOfLogs = 0;
                    $importantLogs = 0;
                    
                    /* 
                     * Open the reported directory, and read its contents
                     * Counts the the importand and standered files by readining the filenames 
                     */
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if (strpos($file, '.') == true) {
                                $countOfLogs++;
                            }
                            if (strpos($file, 'sql') == true) {
                                $importantLogs++;
                            }
                         }
                         
                         
                        closedir($dh);
                      }
                    }
                    
                    $normalLogs = $countOfLogs - $importantLogs;
                    
                    // displays the count of each and hyperlinks the count the adminConsole-Security.php file
                    echo ("<a href='adminConsole-Security.php'>You have ".$importantLogs. " <u>important</u> security loggs to review!</a><br>");
                    echo ("<a href='adminConsole-Security.php'>You have ".$normalLogs. " standard loggs to review</a><br>");
                ?>
                  
                <hr>
                Flagged Images:
                <br><br>
                <?php
                    //counts the ammount of reported images
                    $query = "SELECT * FROM reportedImages";   
                    $result = mysql_query($query); 
                    $repotedImages = 0;
                    while ($row = mysql_fetch_assoc($result)) {
                        $repotedImages++;
                    }
                    //displays the count of images and hyperlinks to the adminConsole-Flagged.php file
                    echo ("<a href='adminConsole-Flagged.php'>You have ".$repotedImages. " images to review</a>");
                ?>
                <hr>
            </div>
        </section>
        <?php
            //include("includes/footer.php");
        ?>
        </section>
    </body>
</html>