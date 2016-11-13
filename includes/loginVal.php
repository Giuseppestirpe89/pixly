 <?php
 
    /* 
     * ---LoginVal.php----
     * This page take the posted user details from header.php or profileHeader.php validateds the details and logs the user in by creating a seshion
     */
 
    session_start();
    include('connect.php');
 
    //boolean variable used to trigger the SQL query 
    $passedRegex = TRUE;
    
    /*
     * the "required" class is part of all of the inputs, so the form will not submit without input data
     * If we get input without data its a indication that the HTML on the client side has been altered for we log the error and exit the login script
     * by changing $passedRegex to false, which will not let the connection to the DB open
     */
     
    if(empty($_POST['username']) || empty($_POST['password'])){
        $passedRegex = FALSE;
    }
    
    /*
     *  --Regular Expressions(Regex) are used to check for characters that we dont want entered or that we would not expect to be entered into forms --
     *  We use a custom regular expression for each field as the criteria for each field is different
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  We use preg_match() to search the text, while validating it using regular expressions
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     *  //ref: http://www.newthinktank.com/2011/01/php-security/
     */
     
    $subjectUsername = stripslashes(trim($_POST['username']));
    if (preg_match ('%^[A-Za-z0-9\.\'\-!_]{4,20}$%',$subjectUsername)) {
        $formusername = escape_data($subjectUsername);
    } else {
        //If criteria is not met $passedRegex is set to false so the $formusername will not be sent to the SQL server
        $passedRegex = FALSE;
        header("Location: ../failedLogin.php?char");
        exit();
    }
    
    $subjectPassword = stripslashes(trim($_POST['password']));
    if (preg_match ('%^[A-Za-z0-9\.\'\-!_]{4,20}$%',$subjectPassword)) {
        $formpassword = escape_data($subjectPassword);
        
    } else {
        $passedRegex = FALSE;
        header("Location: ../failedLogin.php?char");
        exit();
    }
    
    /* 
     * Only if the details pass the reggular expressions, $passedRegex remains TRUE and the connection to the DB is run,
     * The sanitised info is then aloud to be sent to the DB in a query
     */
     
    if($passedRegex){
    
        /*
         * as we are using php's password hash we just check for the username, so we can pull the pass word hash from the DB to compair
         */
         
        $query = "SELECT * FROM users WHERE username = '$formusername'";   
        
        /*
         * mysql_query() was chosen over the other connection functions as it only allows one query to be sent to the DB
         * if a second query was introduced via SLQ injection the second query would not exacute 
         */
         
        $result = mysql_query($query); 
        $numRows = mysql_num_rows($result);
        
        /*
         * Before each user can set up account, there chosen username is checked against the DB to ensure that it is unique, so the username becomes a unique identifier
         * Because of this a username query should only have 0 or 1 row effected
         * If more than 1 row is effected that is a indication that SQL could have been injected into query to the DB
         * So we create a security log by calling "/log/logMail.php" and notifies info.pixly --- notes on this script in file
         * this recored all the current server info, client info and what text was entered into the input fields
         * this can then be reviewed in detail to see it was a potential attacker and if we want to blacklist the IP from the server
         * the sql connection is closed and the user redirected
         */
         
        if($numRows > 1){
            //logs a security file
            include("../logs/logsMail.php");
            //closed the sql connection
            mysql_close($connection);
            //redirects user index
            header("Location: ../failedLogin.php?error");
            exit();
        }else{
            while ($row = mysql_fetch_assoc($result)) {
                $dbUsername=$row['username'];
                $dbPassword=$row['password'];
                // here the users password is verified from the originally hashed one from the db
                if($formusername == $dbUsername && password_verify($formpassword, $dbPassword)){
                    $_SESSION['user']=$dbUsername;
                    // stores to session if the user is a premium user (gets extra content)
                    $_SESSION['premium']=$row['Premium'];
                    // adds the users IP address to the session, this will be used for validation at different stages to stop session hijacking - get_client_ip_env() included from connect.php
                    $_SESSION['ip']=get_client_ip_env();
                    // random string is created as a ID
                    $randomID = substr(sha1(rand()), 0, 25);
                    // That Id if given to the users session AND also the users cookie, so they can be compaired
                    $_SESSION['cookieId']=$randomID;
                    //cookies expire within a hour, have a specified path, specifieddomain, are secure, and are httponly
                    setcookie('cookieId', $randomID, time()+3600, "/", "c9users.io", 1, 1);
                    header("Location: ../index.php");
                    exit();
                    
                }else{
                    header("Location: ../failedLogin.php?error");
                    exit();
                }
            }
            header("Location: ../failedLogin.php?error");
            exit();
        }
    //if $passedRegex is false .ie if we get any unexpected data from the user   
    }else{
        
        /*
         * the regex on the clientside in JavaScript is the same as the regex on the serverside in PHP
         * if user input fails the regex on the server side it would mean the regex on the client side may have been altered to allow other charicters through
         * this may be a dilberate move by a attacker to introduce potentialy harmful charicters, scripts or querys to the server side
         * if $passedRegex is false we do not open a connection to the DB
         * we run log.php which records user input, the server and client data
         * we then redirect the user to failedLogin.php
         */
         
         include("../logs/logs.php");
         header("Location: ../failedLogin.php?error");
    }
?>  
    


