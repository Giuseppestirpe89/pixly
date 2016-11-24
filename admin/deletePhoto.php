<?php


    /*
     *----------------This paged deletes images from the DB and webserver, it is triggered by the 'delete' button on FlaggedPhotos.php-----------------------------
     * - Checks user has permission to view contents of the page
     * - It takes the file path from the user and decatenate it into the event name and file name
     * - Passes the URL infor through escape_data() to remove dangerous charecters
     * - Deletes the image from the event/'event name'/ directory 
     * - Deletes the record of itsself from the 'reportedImages' table, and checks for the expected results of that delete
     * - Deletes the record of the image from the 'images' table, and checks for the expected results of that delete
     * - Decrements the 'numOfPhotos' value in the 'events' table  *numOfPhotos used in eventbanner.php to chose how many frames to load
     * - Redirect the Admin to the adminConsole-Flagged.php
     *-------------------------------------------------------------------------------------------------------------------------------------------------------------
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
    
    //divides the event from the file in the filepath
    list($event, $file) = explode("/", $filePath);
    
    //deletes the image from the webserver 
    unlink("../event/$filePath");

 
    /*------------------------------------------------------------------------------------------------------------------
     * Delete the record of itsself from the 'reportedImages' table, and checks for the expected results of that delete
     *------------------------------------------------------------------------------------------------------------------
     * 1) Count the number of rows in the DB   
     * 2) Delete the row from the DB
     * 3) Count the amount of rows in the DB again
     * 4) Finally make sure that the amount of rows have only decremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     *------------------------------------------------------------------------------------------------------------------
     */
     
    //check to see what the count of rows is before the delete to the DB
    $query = "SELECT * FROM reportedImages";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
    
    //Delete from the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "DELETE FROM reportedImages Where src = '$filePath'";
    if ($conn->query($sql) === TRUE) {
        echo "record has been removed from reportedImages<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
    //check to see what the count of rows is after the delete from the DB
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
        header("Location: adminConsole-Flagged.php"); 
        exit();
    }
    
    
    
   /*------------------------------------------------------------------------------------------------------------------
     * Deletes the record of the image from the 'images' table, and checks for the expected results of that delete
     *------------------------------------------------------------------------------------------------------------------
     * 1) Count the number of rows in the DB   
     * 2) Delete the row from the DB
     * 3) Count the amount of rows in the DB again
     * 4) Finally make sure that the amount of rows have only decremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     *------------------------------------------------------------------------------------------------------------------
     */
    
    //check to see what the count of rows is before the delete to the DB
    $query = "SELECT * FROM images";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
    
    //Delete from the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "DELETE FROM images Where imageName = '$file'";
    if ($conn->query($sql) === TRUE) {
        echo "New record has been removed from images <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //check to see what the count of rows is after the delete from the DB    
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
        header("Location: adminConsole-Flagged.php"); 
        exit();
    }
    
    /*----------------------------------------------------------------------------------------------------------------------------------------------------
     * Decrements the 'numOfPhotos' value in the 'events' table  *numOfPhotos used in eventbanner.php to chose how many frames to load
     *----------------------------------------------------------------------------------------------------------------------------------------------------
     * 1) Count the amount of rows in the DB 
     * 2) Get the value 'numOfPhotos' from the 'events' table, to do this we use $eventName. Which comes from the URL which can be manipulated,
     *    So we check the expected result after this query
     * 3) Decrement the value 'numOfPhotos'
     * 4) Update 'numOfPhotos' from the 'events' table with the decremented value
     * 5) Count the amount of rows in the DB after the read and updade
     * 6) Finally make sure that the amount of rows have not been altered, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     *----------------------------------------------------------------------------------------------------------------------------------------------------
     */
    
    //Count the amount of rows in the DB 
    $query = "SELECT * FROM events";   
    $result = mysql_query($query); 
    $rowsBefore = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsBefore++;
    }
      
    //Get the value 'numOfPhotos' from the 'events' table, to do this we use $eventName    
    $iquery = "SELECT * FROM events WHERE eventName = '$eventName'";
    $iresult = mysql_query($iquery); 
    //Decrement the value 'numOfPhotos'
    while ($irow = mysql_fetch_assoc($iresult)) {
        $valueBeforeUpdate = $irow['numOfPhotos'];
        $valueAfterUpdate = $valueBeforeUpdate-1;
    }
    
    //check the expected number of rows are effected
    $numRows = mysql_num_rows($iresult);
    if($numRows != 0){
        //logs a security file
        include("../logs/logsMail-1dir.php");
        header("Location: adminConsole-Flagged.php");
        exit();
    }
    
    //Update 'numOfPhotos' from the 'events' table with the decremented value
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "UPDATE events SET numOfPhotos = '$valueAfterUpdate' WHERE eventName = '$event'";
    if ($conn->query($sql) === TRUE) {
        echo "Updated num of photos in events<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //Count the amount of rows in the DB after the read and updade
    $query = "SELECT * FROM events";   
    $result = mysql_query($query); 
    $rowsAfter = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $rowsAfter++;
    }

    //Check the before and after rows to ensure the reults of the query are as expected
    if($rowsBefore != $rowsAfter){
        //logs a security file
        include("../logs/logsMail-1dir.php");
        //redirects user 
        header("Location: adminConsole-Flagged.php");
        exit();
    }
    
  //Redirect the Admin to the adminConsole-Flagged.php append 'removed' so it shows the correct message on page load
  header("Location: adminConsole-Flagged.php?removed"); 
           
?>