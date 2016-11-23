
<?php 

    /*---------- This file displays the admin console to users logged in as admnin where securuty logs and flagged images can be viewed ---------- 
     * - Checks user has permission to view contents of the page
     * - The '/logs/records' directory is read and its contents are summerized by priority, and echoed to the user
     * - A summery of reported images are displayed to the user
     *--------------------------------------------------------------------------------------------------------------------------------------------
     */
    
    session_start(); 
    include('../includes/connect.php');
    
    /*
     * Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
     */
     
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
                   // Open a 'records' directory which contains security logs, and read its contents
                   // summerizes them by priority, logs that were recorded by discrepencies on read/writes to the DB are marked as important
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
                    echo ("<a href='adminConsole-Security.php'>You have ".$importantLogs. " <u>important</u> security loggs to review!</a><br>");
                    echo ("<a href='adminConsole-Security.php'>You have ".$normalLogs. " standard loggs to review</a><br>");
                ?>
                  
                <hr>
                Flagged Images:
                <br><br>
              
                <?php
                // displays a summery of the reported images to be reviewed 
                    $query = "SELECT * FROM reportedImages";   
                    $result = mysql_query($query); 
                    $repotedImages = 0;
                    while ($row = mysql_fetch_assoc($result)) {
                        $repotedImages++;
                    }
                    
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