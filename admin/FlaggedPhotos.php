
<?php 
    session_start(); 
    include('../includes/connect.php');
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        header("Location: ../includes/killSession.php?inactive");
    }
    
    $url = $_SERVER['REQUEST_URI'];
    $urlID = substr($url, strpos($url, "?") + 1);  
    $urlID = stripslashes(trim($urlID));
    $urlID = escape_data($urlID);
    $urlID =  str_replace("%20"," ",$urlID);
  $first = current(explode("?", $urlID));
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
                    <li><a href="adminConsole-Flagged.php">Flagged Photos</a></li>
                    <li class="active">Photo</li>
                </ol>
                <?php
                    $query = "SELECT * FROM reportedImages WHERE id = '$urlID'";   
                    $result = mysql_query($query); 
                    while ($row = mysql_fetch_assoc($result)) {
                    echo "<a title='Image 1' href='#'><img class='thumbnail img-responsive center-block' src='../event/".$row['src']."'></a>";
                    $filePath = $row['src'];


                    }
                ?>
                <br>
                <a href="deletePhoto.php?<?php echo $filePath; ?>"><button type="button" class="btn btn-danger btn-md" >Delete</button></a>
                <a href="releasePhoto.php?<?php echo $filePath; ?>"><button type="button" class="btn btn-success btn-md" >Release</button></a>
                <hr>
            </div>
        </section>
            <?php
            //include("includes/footer.php");
            ?>
        </section>
    </body>
</html>