 
<?php 
    session_start(); 
    include('../includes/connect.php');
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
                    <li><a href="adminConsole.php">Home</a></li>
                    <li class="active"><a href="adminConsole-Security.php">Security logs</a></li>
                    <li><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                </ul>
                <br>
                <form action action="SecurityLogs.php">
                <?php
                    $dir = "../logs/records";
                   // Open a directory, and read its contents
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                          echo "<a href='SecurityLogs.php?".$file."'>Log: " . $file . " </a><br>";
                         }
                        closedir($dh);
                      }
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