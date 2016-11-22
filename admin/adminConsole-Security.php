 
<?php 
    session_start(); 
    include('../includes/connect.php');
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
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
        <?php include ('../includes/profileHeader.php');?>
        <section>
            <div class="container">
                <div style="height:79px">
                </div>    
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Admin Console</h2>
                        <div style=height:55px>
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
                   // Open a directory, and read its contents
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
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
        <?php
            //include("includes/footer.php");
        ?>
        </section>  
    </body>
</html>