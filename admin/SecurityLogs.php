 
            <?php session_start(); 
            include('../includes/connect.php');
            
            $url = $_SERVER['REQUEST_URI'];
            $whatIWant = substr($url, strpos($url, "?") + 1);    
            
            ?>
            <html>
                <head>
                    <?php
                    include('../includes/profileHead.php');?>
                </head>
                <body>
                    <?php
                    include ('../includes/profileHeader.php');?>
        <!-- Intro Section -->
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
                
               <ol class="breadcrumb">
  <li><a href="adminConsole.php">Security logs</a></li>
  <li class="active">Data</li>
</ol>
                
<?php
$handle = @fopen("../logs/records/$whatIWant", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

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