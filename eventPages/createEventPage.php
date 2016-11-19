
<?php 
    session_start();
    include("../includes/connect.php");
    //saves url so we can referance it for the appeneded errors from createUser.php
    $url = $_SERVER['REQUEST_URI'];
?>
<html>

<head>
    <?php include("../includes/addUserHead.php");?>
    <!--script has fade effect on error messeges-->
    <script>
        $( document ).ready(function() {
         $("#prompt").delay(2500).fadeOut("slow");
        });
    </script>
    
</head>

<body>
    <?php
        include("../includes/profileHeader.php");
    ?>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row" >
            <form class="form-signin" action='CreateEvent.php' method='post'>
                <hr class="colorgraph">
                <div class="form-group">
                    <h2 class="form-signin-heading">Please create an event</h2>
                </div>
                <div style = "height:70px">
                <?php
                
                /*
                 * in creatEvent.php before we redirect back here we append a error code to the URL
                 * we read this so we know why the user has been redirected and display the appropriate error messege
                 */
                    //  !== false:  true, position is 0, ref http://us2.php.net/manual/en/language.operators.comparison.php
                    if (strpos($url, 'userE') !== false) {
                        echo " <div class='alert alert-warning' id='prompt'>
                                Event name already exists.
                                </div>";
                    }
                    if (strpos($url, 'mt') !== false) {
                        echo " <div class='alert alert-warning' id='prompt'>
                                Event name must be filled in.
                                </div>";
                    }
                    if (strpos($url, 'char') !== false) {
                        echo " <div class='alert alert-warning' id='prompt'>
                                invalid characters
                                </div>";
                    }
                    
                 ?>  
                 </div>
                <div class="form-group input-lg">
                    
                    <input type="eventName" class="form-control" placeholder="event name" name="eventName"  required autofocus>
                </div>
                
                <button class="btn btn-small  btn-primary center-block">Create Event</button>
            </form>
        </div>
    </div>
</body>

</html>
