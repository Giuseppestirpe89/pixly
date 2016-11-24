 
<?php 

    /*
     *----------------- Displays the individual security logs divided by priority, and displays the list of reported images to review---------------
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
        <!-- gives fade effect to error messeges-->
        <script>
            $( document ).ready(function() {
             $("#prompt").delay(2500).fadeOut("slow");
            });
        </script>
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
                        <div style=height:55px>
                            <!-- displays error messeges if URL contains 'deleted'-->
                            <?php
                                if (strpos($url, 'deleted') !== false) {
                                    echo " <div class='alert alert-danger' id='prompt'>
                                            Deleted!
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
                    <li class="active"><a href="adminConsole-Security.php">Security logs</a></li>
                    <li><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                </ul>
                <br>
                <form action action="SecurityLogs.php">
                <p><strong>Important!</strong></p>
            
                <?php
                    $dir = "../logs/records";
                    $countOfImportantLogs = 0;
                    $countOfUnImportantLogs = 0;
                    
                    // Open a directory, loops each important log out
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            /*
                             * when looping the files I was getting a "." and ".." looping out with the file names
                             * from research this has to go with the directory 
                             * so id it contains a "." we dont loop it
                             */
                            if (strpos($file, '.') == true) {
                                if (strpos($file, 'sql') == true) {
                                    echo "<a href='SecurityLogs.php?".$file."'>Log: " . $file . " </a><br>";
                                    $countOfImportantLogs++;
                                }
                            }
                         }
                        closedir($dh);
                      }
                    }
                    
                    if($countOfImportantLogs == 0){
                        echo "There are no important logs to review at the moment<br>";
                    }
                    
                    echo "<hr> <p><strong>Standard</strong></p>";
                    
                    // Open a directory, loops Standard logs out
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if (strpos($file, '.') == true) {
                                if (strpos($file, 'regex') == true) {
                                 echo "<a href='SecurityLogs.php?".$file."'>Log: " . $file . " </a><br>";
                                 $countOfUnImportantLogs++;
                                }
                            }
                         }
                        closedir($dh);
                      }
                    }
                    
                    if($countOfUnImportantLogs == 0){
                        echo "There are no logs to review at the moment<br>";
                    }

                ?>
                
                </form>
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