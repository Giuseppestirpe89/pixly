<!-- 
        --In createUser.php a few steps are handeled--
        * user input is sanitised 
        * passwords are hashed 
        * their details a writen to the DB
        * A session is created for the user
        * Their profile page is created
        * They are directed to their new profile page
-->
<?php
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
     
    if(empty($un) || empty($pw) || empty($pwm) || empty($em)){
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
        //If criteria is not met $passedRegex is set to false so the query will not be sent to the SQL server
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
    if (preg_match ('%^[A-za-z0-9\.\' \-!_&@.$~]{4,20}$%', $subjectEmail)) {
        $email = escape_data($subjectEmail);
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
        $conn = new mysqli(HOST, USER, PASS, DB);
        $sql = "INSERT INTO users (username, password, email)
        VALUES ('$username', '$userpasswordhashed','$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <br> user: ".$username."<br>pass: ".$userpasswordhashed;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        
        //session for user in then started
        $_SESSION['user'] = $username;
        
        /*
         * A .php profile page is then created, the contents of a standard profile page are populated to the file
         * and saved to the current directory under the users username
         */
        //http://www.w3schools.com/php/php_file_create.asp-
        $myfile = fopen($username .".php", "w") or die("Unable to open file!");
        $txt = " 
        <?php session_start(); 
        include('../includes/connect.php');?>
        <html>
            <head>
                <?php
                include('../includes/profileHead.php');?>
            </head>
            <body>
                <?php
                include ('../includes/profileHeader.php');
                ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1>hi user!</h1>
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
    







