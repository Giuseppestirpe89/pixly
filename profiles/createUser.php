
<?php

    /*
     * -------------------------In createUser.php we create new user profiles----------------------------------------------------
     * - user input is sanitised 
     * - passwords are hashed 
     * - Check if the user name is in the 'users' table on the the DB, and check the expected results from query to the DB
     * - if the username is free, write the user details to the DB, and check the expected results from write to the DB
     * - Create a session for the user
     * - We add the usersname and access level of the user from the DB to the session
     * - We add the IP address of the user to the session
     * - We create a random 25 character long string as a token and add it to the session
     * - We also add the token to a secure/HTTP only cookie and sent it to the clients browser
     * - Create a file named after the username and write the PHP template code to the profile page
     * - save the file to the profiles directory
     * - Redirect the user their new profile page
     * -------------------------------------------------------------------------------------------------------------------------
     */
    
    session_start();
    include("../includes/connect.php");
        
    /*
     *  --Regular Expressions(Regex) are used to check for characters that we dont want entered or that we would not expect to be entered into forms --
     *  We use a custom regular expression for each field as the criteria for each field is different
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  We use preg_match() to search the text, while validating it using regular expressions
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     */
        
    //boolean variable used to trigger the SQL query
    $passedRegex = TRUE;
    
    /*
     * the "required" class is part of all of the inputs, so the form will not submit without input data
     * If we get input without data its a indication that the HTML on the client side has been altered for we log the error and exit the login script
     * by changing $passedRegex to false, which will not let the connection to the DB open
     */
     
     $un = $_POST['username'];
     $pw = $_POST['password'];
     $pwm = $_POST['passwordmatch'];
     $em = $_POST['email'];
     $ac = $_POST['account'];
     if($ac == "premium"){
         $ac = "true";
     }else{
         $ac = "false";
     }
     
    if(empty($un) || empty($pw) || empty($pwm) || empty($em) || empty($ac)){
        $passedRegex = FALSE;
        header("Location: newUser.php?tfmt");
        exit();
    }
    
    if($pw != $pwm){
       header("Location: newUser.php?pmtc"); 
       exit();
    }

    
    $subjectUsername = stripslashes(trim($un));
    if (preg_match ('%^[A-Za-z0-9\.\' \-!_]{4,20}$%',$subjectUsername)) {
        $username = escape_data($subjectUsername);
    } else {
        //If criteria is not met $passedRegex is set to false so the query connection will not open
        $passedRegex = FALSE;
        //we redirect the user back to newUser.php but add info to thr URL yo we can read why the user has been sent back and display the correct error messege
        header("Location: newUser.php?char");
        exit();
    }
    
    $subjectPassword = stripslashes(trim($pw));
    if (preg_match ('%^[A-za-z0-9\.\' \-!_&@$~]{4,20}$%', $subjectPassword)) {
        $password = escape_data($subjectPassword);
    } else {
        $passedRegex = FALSE;
        header("Location: newUser.php?char");
        exit();
    }
    
    $subjectPasswordm = stripslashes(trim($pwm));
    if (preg_match ('%^[A-za-z0-9\.\' \-!_&@$~]{4,20}$%', $subjectPasswordm)) {
        $passwordm = escape_data($subjectPasswordm);
    } else {
        $passedRegex = FALSE;
        header("Location: newUser.php?char");
        exit();
    }
    
    $subjectEmail = stripslashes(trim($em));
    if (preg_match ('%^[A-za-z0-9\.\' \-!_&@.$~]{4,30}$%', $subjectEmail)) {
        $email = escape_data($subjectEmail);
    } else {
        $passedRegex = FALSE;
        header("Location: newUser.php?char");
        exit();
    }
    
    $acc = stripslashes(trim($ac));
    if ($acc == "true" || $acc == "false") {
        $accountType = escape_data($acc);
    } else {
        $passedRegex = FALSE;
        header("Location: newUser.php?char");
        exit();
    }

    /*
     * password_hash() was picked over MD5 as its outdated and unsecure and SHA1 as it dosnt provide the cost functinality that password_hash() does which will defend against brute force attacks
     * password_hash() returns the algorithm, cost and salt as part of the returned hash. Therefore, 
     * all information that's needed to verify the hash is included in it. 
     * This allows the verify function to verify the hash without needing separate storage for the salt or algorithm information.
     * password_hash() also allows us to use Blowfish encryption
     */
     
    $userpasswordhashed = password_hash($password , CRYPT_BLOWFISH,['cost' => 8]);
    
    /* 
     * Only if the details pass the reggular expressions, $passedRegex remains TRUE and the connection to the DB is run,
     * the sanitised info is then sent to the SQL server
     */
     
   if($passedRegex){
         
        /*
         * We run a query to see if the username is already registered in the DB
         */
         
        $query = "SELECT * FROM users WHERE username = '$username'";   
        
        /*
         * mysql_query() was chosen over the other connection functions as it only allows one query to be sent to the DB
         * if a second query was introduced via SLQ injection the second query would not exacute 
         */
         
        $result = mysql_query($query); 
        $numRows = mysql_num_rows($result);
        
        //variable to mark if the username is free or not
        $UserNameFree = true;
        
        /*
         * Before each user can set up account, there chosen username is checked against the DB to ensure that it is unique, so the username becomes a unique identifier
         * Because of this a username query, should only have 1 or 0 row effected
         * If more than 1 row is effected that is a indication that SQL could have been injected into query to the DB and is effecting multible rows
         * So we create a security log by calling "/log/logmail.php" --- notes on this script in file
         * As as intruder could potentialy have penatrated as far as the SQL connection a mail is sent to the Pixly admin to notify them
         * "/log/logmail.php" records all the current server info, client info and what text was entered into the input fields
         * this can then be reviewed in detail to see it was a potential attacker and if we want to blacklist the IP from the server
         */
        
        if($numRows > 1){
            //logs a security file
            include("../logs/logsMail.php");
            //closed the sql connection
            mysql_close($connection);
            //redirects user index
            header("Location: ../failedLogin.php?error");
            
        }else{
            
            /*
             * else 1 or 0 rows are effected is the expected result so we check if the user name matches any existing usernames
             */
             
            while ($row = mysql_fetch_assoc($result)) {
                $dbUsername=$row['username'];
                //if there is a match we redirect to newUser with userE in the url, we can then read that and display the correct error for the user
                if($username == $dbUsername){
                    //we mark the username as not free
                    $UserNameFree = false;
                    header("Location: newUser.php?userE");
                    exit();
                }
            }
        } 
           
        /*
         * --If the username is free--
         * we then log the user details to the DB
         * create a session for the user
         * write a profile file to the directory
         * and redirect the user to the new profile
         */
         
        if($UserNameFree){
            
            //we then log the user details to the DB
            $conn = new mysqli(HOST, USER, PASS, DB);
            $sql = "INSERT INTO users (username, password, email, Premium)
            VALUES ('$username', '$userpasswordhashed','$email','$accountType')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully <br> user: ".$username."<br>pass: ".$userpasswordhashed;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            
            //create a session for the user and sessions the account type
            $_SESSION['user'] = $username;
            $_SESSION['premium'] = $accountType;
            // adds the users IP address to the session, this will be used for validation at different stages to stop session hijacking - get_client_ip_env() included from connect.php
            $_SESSION['ip']=get_client_ip_env();
            // random string is created as a ID
            $randomID = substr(sha1(rand()), 0, 25);
            // That Id if given to the users session AND also the users cookie, so they can be compaired
            $_SESSION['cookieId']=$randomID;
            
            /*
             * A .php profile page is then created, the contents of a standard profile page are populated to the file
             * and saved to the current directory under the users username
             */
             
            //http://www.w3schools.com/php/php_file_create.asp-
            $myfile = fopen($username .".php", "w") or die("Unable to open file!");
            $txt = " 
            <?php session_start(); 
            include('../includes/connect.php');
            ?>
            <html>
                <head>
                    <?php
                    include('../includes/profileHead.php');?>
                </head>
                <body>
                    <?php
                    include ('../includes/profileHeader.php');?>
                    
                    
                     <?php
                    include ('../includes/container.php');?>
              
                    
                    <?php
                    include ('../includes/profileFooter.php');
                   ?>
                </body>
            </html>";
            
            
            fwrite($myfile, $txt);
            fclose($myfile);
            end;
            
            //user then directed to their new profile
            header("Location: ../profiles/".$username.".php");
        }
        
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
        header("Location: newUser.php?error");
    }   
            
?>
    







