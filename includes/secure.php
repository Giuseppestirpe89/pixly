<?php
//ref: http://www.newthinktank.com/2011/01/php-security/
    require_once("connect.php");

    /*
     *  --regular expressions are used to check for characters that we dont want entered or that we would not expect to be entered into forms --
     *  We use a custom regular expression for each field as the criteria for each field is different
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  We use preg_match() to search the text, while validating it using regular expressions
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     */
    
    if (isset($_POST['submitted'])) {
        
    // Check for a first name.  
    
        if (preg_match ('%^[A-Za-z\.\' \-]{2,15}$%', stripslashes(trim($_POST['first_name'])))) {
            $fn = escape_data($_POST['first_name']);
        } else {
            $fn = FALSE;
            echo '<p><font color="red" size="+1">Please enter your first name!</font></p>';
        }
    
    // Check for a last name.
    
        if (preg_match ('%^[A-Za-z\.\' \-]{2,30}$%', stripslashes(trim($_POST['last_name'])))) {
            $ln = escape_data($_POST['last_name']);
        } else {
            $ln = FALSE;
            echo '<p><font color="red" size="+1">Please enter your last name!</font></p>';
        }
    
    // Check for an email address.
    
        if (preg_match ('%^[A-Za-z0-9._\%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%', stripslashes(trim($_POST['email'])))) {
            $e = escape_data($_POST['email']);
        } else {
            $e = FALSE;
            echo '<p><font color="red" size="+1">Please enter a valid email address!</font></p>';
        }
    
    // Check for a street.
    
        if (preg_match ('%^[A-Za-z0-9\.\' \-]{5,30}$%', stripslashes(trim($_POST['street'])))) {
            $s = escape_data($_POST['street']);
        } else {
            $s = FALSE;
            echo '<p><font color="red" size="+1">Please enter your street address!</font></p>';
        }
    
    // Check for a phone number.
    
        if (preg_match ('%^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$%', stripslashes(trim($_POST['work_phone'])))) {
            $ph = escape_data($_POST['work_phone']);
        } else {
            $ph = FALSE;
            echo '<p><font color="red" size="+1">Please enter a valid phone number!</font></p>';
        }
    
    // Check for a password and match against the confirmed password.
    
        if (preg_match ('%^[A-za-z0-9]{4,20}$%', stripslashes(trim($_POST['password1'])))) {
            if ($_POST['password1'] == $_POST['password2']) {
                $p = escape_data($_POST['password1']);
            } else {
                $p = FALSE;
                echo '<p><font color="red" size="+1">Your password did not match the confirmed password!</font></p>';
            }
        } else {
            $p = FALSE;
            echo '<p><font color="red" size="+1">Please enter a valid password!</font></p>';
        }
    }

?>