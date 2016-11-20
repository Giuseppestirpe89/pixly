
<?php 
    session_start(); 
    include('../includes/connect.php');
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
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
                <?php
                    $dir = "../logs/records";
                    $countOfLogs = 0;
                   // Open a directory, and read its contents
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if (strpos($file, '.') == true) {
                                $countOfLogs++;
                            }
                         }
                        closedir($dh);
                      }
                    }
                    echo ("<a href='adminConsole-Security.php'>You have ".$countOfLogs. " security loggs to review</a>");
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