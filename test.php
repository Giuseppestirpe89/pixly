  <?php
    include('includes/connect.php');
    session_start();
    
    
    if (isset($_POST['submit'])){
    $passedRegex = TRUE;
    $subjectUsername = stripslashes(trim($_POST['username']));
    if (preg_match ('%^[A-Za-z0-9\.\' \-]{2,20}$%',$subjectUsername)) {
        $formusername = escape_data($subjectUsername);
    } else {
        //If criteria is not met $passedRegex is set to false so the SQL will not be sent to the SQL server
        $passedRegex = FALSE;
        echo '<p><font color="red" size="+1">PPlease enter a valid username or password!</font></p>';
    }
    
    $subjectPassword = stripslashes(trim($_POST['password']));
    if (preg_match ('%^[A-za-z0-9]{3,20}$%', $subjectPassword)) {
        $formpassword = escape_data($_POST['password']);
    } else {
        $passedRegex = FALSE;
        echo '<p><font color="red" size="+1">Please enter a valid username or password!</font></p>';
    }
    
    $query = "SELECT * FROM users WHERE username = $formusername"; 
    
   /*
    * mysql_query() was chosen over the other connection functions as itonly allows one query to be sent to the DB
    * if a second query was introduced via SLQ injection the second query would not exacute 
    */
   
    $result = mysql_query($query); 

    while ($row = mysql_fetch_assoc($result)) {
        $dbUsername=$row['username'];
        $dbPassword=$row['password'];
        
        if($formusername == $dbUsername && password_verify($formpassword, $dbPassword)){
            $_SESSION['user']=$dbUsername;
            header("Location: ../index.php");
        }else{
            echo "nope";
        }
    }
    }
    ?>
               <div>
                <form  method='post'>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>

                    <button type="submit" name = "submit" class="btn btn-default">Submit</button>
                    <a href="profiles/newUser.php">
                        <p>Dont have a account?</p>
                    </a>
                </form>
            </div>