<!--http://www.w3schools.com/php/php_file_create.asp-->
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
        if (preg_match ('%^[A-Za-z0-9\.\' \-]{2,20}$%', stripslashes(trim($_POST['username'])))) {
            $username = escape_data($_POST['username']);
        } else {
            //If criteria is not met $passedRegex is set to false so the SQL will not be sent to the SQL server
            $passedRegex = FALSE;
            echo '<p><font color="red" size="+1">Please enter username!</font></p>';
        }
        
        if (preg_match ('%^[A-za-z0-9]{4,20}$%', stripslashes(trim($_POST['password'])))) {
            $password = escape_data($_POST['password']);
        } else {
            $passedRegex = FALSE;
            echo '<p><font color="red" size="+1">Please enter a valid password!</font></p>';
        }
        
        // ref:http://php.net/manual/en/function.password-hash.php
        //http://php.net/manual/en/function.crypt.php
        // $mysalt = [
        //     'cost' => 11,
        //     'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        // ];
        // $Epassword =  password_hash($rawPassword, PASSWORD_BCRYPT, $mysalt)."\n";
        
        // if all input meet criteria of regular expressions the sanitised data it written to the DB 
        
        
        
       if($passedRegex){
            $conn = new mysqli(HOST, USER, PASS, DB);
            $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$password')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully <br> user: ".$username."<br>pass: ".$password;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
       }    
       
       $_SESSION['user'] = $username;
        
        //makes file
        //http://www.w3schools.com/php/php_file_create.asp-
        $myfile = fopen($username .".php", "w") or die("Unable to open file!");
        $txt = "
        <?php session_start(); 
        include('../includes/connect.php');?>
        <html>
            <head>
                <?php
                include('../includes/head.php');?>
            </head>
            <body>
                <?php
                include ('../includes/profileHeader.php');
                ?>
                <br>
                <br>
                <h1>hi user!</h1>
                <?php
                include ('../includes/footer.php');
               ?>
            </body>
        </html>";
        fwrite($myfile, $txt);
        fclose($myfile);
        end;
        //https://bestbook-donwhelan.c9users.io/restaurants/newuser.php
        //echo "<a href='edit profile.php'>Your new profile is now available to view here</a>";
        header("Location: ../profiles/".$username.".php");
            
?>
    







