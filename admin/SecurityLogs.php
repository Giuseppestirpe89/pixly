
<?php 

    /*----------------------------Shows the Administrator the logged incedents in full detail ----------------------
     * - checks the users level of access before displaying content
     * - the file name was passed in the URL from adminConsole-Security.php
     * - this is read and then used to feed into a fopen() to read the file
     * - the file its displayed to the user
     * - and given the option to delete the log or return back to adminConsole-Security.php
     *---------------------------------------------------------------------------------------------------------------
     */

    session_start(); 
    include('../includes/connect.php');
    
    //Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
    
    //get url
    $url = $_SERVER['REQUEST_URI'];
    //reads everything after the ?.
    $whatIWant = substr($url, strpos($url, "?") + 1);    
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
                    <li><a href="adminConsole-Security.php">Security logs</a></li>
                    <li class="active">Data</li>
                </ol>
                <?php
                
                    //Opens Filename - taken from url
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
                <br>
                <a href="deleteLog.php?<?php echo $whatIWant; ?>"><button type="button" class="btn btn-danger btn-md" >Delete</button></a>
                <hr>
            </div>
        </section>
            <?php
            //include("includes/footer.php");
            ?>
        </section>
    </body>
</html>