
<?php 
session_start(); 
include('../includes/connect.php');
?>
<html>
    <head>
        <?phpinclude('../includes/profileHead.php');?>
    </head>
    <body>
        <?phpinclude ('../includes/profileHeader.php');?>

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
                          $countOfLogs++;
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