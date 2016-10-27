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
            $formpassword = escape_data($_POST['password']);
        } else {
            $passedRegex = FALSE;
            echo '<p><font color="red" size="+1">Please enter a valid password!</font></p>';
        }
    
    $query = "SELECT * FROM users";
    $result = mysql_query($query); 

    
    
    $_SESSION['user']=$dbUsername;
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
    


?>  
    


