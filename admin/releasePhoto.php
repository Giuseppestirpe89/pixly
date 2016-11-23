<?php
    
    /*
     *--------------------- This file releases the photo from the flagged photo log -----------------------------------------------
     * We read the URL and take the filepath that was appended to the end of it in the adminConsole-Flagged.php file
     * We use that to be the key value used to delete the recored from the database
     * we check the delete in the db for the expected result, and log erregular ones.
     * Finally we redirect the admin user to adminConsole-Flagged.php and display at "released messege"
     *-----------------------------------------------------------------------------------------------------------------------------
     */

    session_start(); 
    include('../includes/connect.php');
    
    //gets the URL
    $url = $_SERVER['REQUEST_URI'];
    
    //Reads eveything after the ? 
    $filePath = substr($url, strpos($url, "?") + 1); 
    
    //Scrubs the url of any dangerious charicters that could be entered by the end user
    $filePath = stripslashes(trim($filePath));
    $filePath = escape_data($filePath);
    
    //handels the whitespace placholder in the URL
    $filePath =  str_replace("%20"," ",$filePath);
    
    //divides the event from the file in the filepath
    list($event, $file) = explode("/", $filePath);

    /*
     * We delete the row containing th eimage from the 'reportedImages' Table
     * There are 4 stages to this:
     * 1) we first count the number of rows in the DB   
     * 2) We DELETE the information from the DB
     * 3) Then we count the amount of rows in the DB again
     * 4) Finally we make sure that the amount of rows have only de-incremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and an admin notified by email
     */
     
    //check to see what the count of rows is before the delete from the DB
    $sql = "SELECT * FROM reportedImages";
    $result = mysql_query($sql); 
    $rowsBefore = mysql_num_rows($result);
    
    //DELETE FROM the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "DELETE FROM reportedImages Where
    src = '$filePath'";
    
    if ($conn->query($sql) === TRUE) {
        echo "record has been removed from reportedImages<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
    //check to see what the count of rows is after the delete from the DB
    $sql = "SELECT * FROM reportedImages";
    $result = mysql_query($sql); 
    $rowsAfter = mysql_num_rows($result);
    
    /*
     * if anything other than one row being deleted happens which is the expected result
     * we close the connection, log a security incedent and email alert the admin
     */
     
    if($rowsBefore != $rowsAfter+1){
        include("../logs/logsMail-1dir.php");
        // error: Sorry, there was an error uploading your file.
        header("Location: ../index.php?1");
        exit();
    }

    header("Location: adminConsole-Flagged.php?released"); 
            
?>