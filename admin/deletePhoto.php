<?php

    /*-------------------- This file deletes flagged images that have been vetted by a administrator ---------------------
     * - Checks user has permission to view contents of the page
     * - Scrubs the URL of harmful charecters
     * - Decatinates the URL into useful information
     * - Deletes the photo from the directory its stored in on the webserver
     * - Delets file from 'reportedImages', checks for expected results
     * - Delets file from 'images', checks for expected results
     * - Count ammount of images from 'events'
     * - Decrment that value
     * - Update the numOfPhotos in 'events' to the Decrmented value
     * - Redirect the user
     *--------------------------------------------------------------------------------------------------------------------
     */
     
    session_start(); 
    include('../includes/connect.php');
    
    //Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
    
    //gets the URL
    $url = $_SERVER['REQUEST_URI'];
    
    //Reads eveything after the ? 
    $filePath = substr($url, strpos($url, "?") + 1); 
    
    //Scrubs the url of any dangerious charicters that could be entered by the end user
    $filePath = stripslashes(trim($filePath));
    $filePath = escape_data($filePath);
    
    //handels the whitespace placholder in the URL
    $filePath =  str_replace("%20"," ",$filePath);
    
    //seperates the image name from the directory its stored in
    list($event, $file) = explode("/", $filePath);
    
    //deletes the photo from the directory its stored in on the webserver
    unlink("../event/$filePath");


    /* ------------------Delets file from 'reportedImages', checks for expected results --------------------------
     * We remove the record in the 'reportedImages' table in the DB 
     * 1) we first count the number of rows in the DB   
     * 2) We delete the information from the DB
     * 3) Then we count the amount of rows in the DB again
     * 4) Finally we make sure that the amount of rows have only decremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     */
     
    //check to see what the count of rows is before the delete 
    $query = "SELECT * FROM reportedImages";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
    
    //remove from the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "DELETE FROM reportedImages Where src = '$filePath'";
    
    if ($conn->query($sql) === TRUE) {
        echo "record has been removed from reportedImages<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
    //check to see what the count of rows is after the write to DB
    $query = "SELECT * FROM reportedImages";   
    $result = mysql_query($query); 
    $rowsAfter = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsAfter++;
    }
    
    /*
     * if anything other than one row being deleted happens which is the expected result
     * we close the connection, log a security incedent and email alert the admin
     */
     
    if($rowsBefore != $rowsAfter+1){
        include("../logs/logsMail-1dir.php");
       
        //error: Sorry, there was an error uploading your file.
        header("Location: ../index.php?1");
        exit();
    }
    
    
    
    /* ---------------------- Delets file from 'images', checks for expected results--------------------------------
     * We remove the record in the 'images' table in the DB 
     * 1) we first count the number of rows in the DB   
     * 2) We delete the information from the DB
     * 3) Then we count the amount of rows in the DB again
     * 4) Finally we make sure that the amount of rows have only decremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     */
    
    // count rows before
    $query = "SELECT * FROM images";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
    
    //delete from the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "DELETE FROM images Where imageName = '$file'";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record has been removed from images <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //count rows after
    $query = "SELECT * FROM images";   
            $result = mysql_query($query); 
            $rowsAfter = 0;
            while ($row = mysql_fetch_assoc($result)) {
                $rowsAfter++;
            }
    
    $conn->close();
    
    /*
     * if anything other than one row being deleted happens which is the expected result
     * we close the connection, log a security incedent and email alert the admin
     */
     
    if($rowsBefore != $rowsAfter+1){
        include("../logs/logsMail-1dir.php");
        echo $rowsAfter.'count'.$rowsBefore;
        // error: Sorry, there was an error uploading your file.
        header("Location: ../index.php?2");
        exit();
    }
    
    
    /* ----------- Count ammount of images from 'events' and Decrment that value ----------------
     * - we first count the number of rows in the DB   
     * - Decrment the value of that count
     * - check the expected number of rows are effected
     */
    
    //count num of rows
    $query = "SELECT * FROM events";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
        
    $iquery = "SELECT * FROM events WHERE eventName = '$eventName'";
    
    $iresult = mysql_query($iquery); 
    
    // Decrment the value of that count
    while ($irow = mysql_fetch_assoc($iresult)) {
        $valueBeforeUpdate = $irow['numOfPhotos'];
        $valueAfterUpdate = $valueBeforeUpdate-1;
    }
    
    $numRows = mysql_num_rows($iresult);
    
    //check the expected number of rows are effected
    if($numRows != 0){
        //logs a security file
        include("../logs/logsMail-1dir.php");
        //redirects user index
        header("Location: ../failedLogin.php?error");
        exit();
    }
    
    
    /* ---------------------- Update the numOfPhotos in 'events' to the Decrmented value --------------------------------
     * - updated the numOfPhotos in 'events'
     * - count the rows after the deletion
     * - compair the count to before the deletion
     * - if there is discreption log a securtiy event and notify a administrator
     */
     
    $conn = new mysqli(HOST, USER, PASS, DB);
    //updated the numOfPhotos in 'events'
    $sql = "UPDATE events SET numOfPhotos = '$valueAfterUpdate' WHERE eventName = '$event'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Updated num of photos in events<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $query = "SELECT * FROM events";   
    $result = mysql_query($query); 
    $rowsAfter = 0;
    //count the rows after the deletion
    while ($row = mysql_fetch_assoc($result)) {
        $rowsAfter++;
    }
    
    //compair the count to before the deletion
    if($rowsBefore != $rowsAfter){
        //logs a security file
        include("../logs/logsMail-1dir.php");
        //redirects user index
        header("Location: ../failedLogin.php?error");
        exit();
    }
        
   //   redirect the user with a trigger string appended to the url  
   header("Location: adminConsole-Flagged.php?removed"); 
  
?>