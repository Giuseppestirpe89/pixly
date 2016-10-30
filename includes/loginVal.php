 <?php
    include('connect.php');
    session_start();
    
    /*
     *  --Regular Expressions(Regex) are used to check for characters that we dont want entered or that we would not expect to be entered into forms --
     *  We use a custom regular expression for each field as the criteria for each field is different
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  We use preg_match() to search the text, while validating it using regular expressions
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     */
 
    $passedRegex = TRUE;
    $subjectUsername = stripslashes(trim($_POST['username']));
    if (preg_match ('%^[A-Za-z0-9\.\' \-]{2,20}$%',$subjectUsername)) {
        $formusername = escape_data($subjectUsername);
    } else {
        //If criteria is not met $passedRegex is set to false so the SQL will not be sent to the SQL server
        $passedRegex = FALSE;
        echo '<p><font color="red" size="+1">Please enter username!</font></p>';
    }
    
    $subjectPassword = stripslashes(trim($_POST['password']));
    if (preg_match ('%^[A-za-z0-9]{3,20}$%', $subjectPassword)) {
        $formpassword = escape_data($subjectPassword);
        
        
    } else {
        $passedRegex = FALSE;
        echo '<p><font color="red" size="+1">Please enter a valid password!</font></p>';
    }
    
    /*
     * as we are using phps password hash we just check for the username, so we can pull the pass word hash from the DB to compair
     */
    $query = "SELECT * FROM users WHERE username = '$formusername'"; 
    


    /* 
     * Only if the details pass the reggular expressions, $passedRegex remains TRUE and the connection to the DB is run,
     * The sanitised info is then aloud to be sent to the DB in a query
     */
    if($passedRegex){
        
        /*
         * mysql_query() was chosen over the other connection functions as itonly allows one query to be sent to the DB
         * if a second query was introduced via SLQ injection the second query would not exacute 
         */
        $result = mysql_query($query); 
        $numRows = mysql_num_rows($result);
        
        /*
         * Before each user can set up account, there chosen username is checked against the DB to ensure that it is unique, so the username becomes a unique identifier
         * Because of this a username query should only have one row effected
         * If more than 1 row is effected that is a indication that SQL could have been injected into query to the DB
         * So we create a security log by calling "/log/log.php" --- notes on this script in file
         * this recored all the current server info, client info and what text was entered into the input fields
         * this can then be reviewed in detail to see it was a potential attacker and if we want to blacklist the IP from the server
         */
         
        if($numRows < 1){
            //logs a security file
            include("../logs/logs.php");
            //closed the sql connection
            mysql_close($connection);
            //redirects user index
            header("Location: ../index.php");
            
        }else{
            while ($row = mysql_fetch_assoc($result)) {
                $dbUsername=$row['username'];
                $dbPassword=$row['password'];
                // here the users password is verified from the originally hashed one from the db
                if($formusername == $dbUsername && password_verify($formpassword, $dbPassword)){
                    $_SESSION['user']=$dbUsername;
                    header("Location: ../index.php");
                }else{
                    echo "nope";
                }
            }
        }
    //if $passedRegex is false    
    }else{
        
        /*
         * the regex on the clientside in JavaScript is the same as the regex on the serverside in PHP
         * if user input fails the regex on the server side it would mean the regex on the client side may have been altered to allow other charicters through
         * this may be a dilberate move by a attacker to introduce potentialy harmful charicters, scripts or querys to the server side
         * if if $passedRegex is false we do not open a connection to the DB
         * we run log.php which records user input, the server and client data and notifies info.pixly
         * we then redirect the user to index.php
         */
         include("../logs/logs.php");
         header("Location: ../index.php");
    }
?>  
    


