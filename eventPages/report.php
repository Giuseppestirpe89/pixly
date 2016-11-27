<?php

    /*
     *------- takes the filepath in the url that was added in the reportImage.php file and creates a record in the 'reportedImages' table -----------
     * - Reads the URL and decatinates the URL string to get just the image filepath
     * - Scrubs the text for dangerous charecter 
     * - Breakes the filepath into image name and directory
     * - Checks the database before the record is added
     * - Adds the record
     * - Checks the database after the record is added and checks that we get the expexted results
     * - Records and notifies administrators if we get a unexpected result
     * - Redirects user to the event page with "?reported" appended to the url, so the reported promt appears for user feed back
     *------------------------------------------------------------------------------------------------------------------------------------------------
     */

    session_start();
    include("../includes/connect.php");
    
    // gets the filepath from the url
    $url = $_SERVER['REQUEST_URI'];
    $urlfilepath = substr($url, strpos($url, "?") + 1);    

    //text from the url can be manipulated so its scrubbed
    $trimmedPfilepath = stripslashes(trim($urlfilepath));
    $escapedFilepath = escape_data($trimmedPfilepath);
    
    // handels whitespace
    $filepath =  str_replace("%20"," ",$escapedFilepath);
    
    
    list($event, $file) = explode("/", $filepath);
        
    /*
     * We write to the 'reportedImages' table in the DB 
     * There are 4 stages to this:
     * 1) we first count the number of rows in the DB   
     * 2) We write the information to DB
     * 3) Then we count the amount of rows in the DB again
     * 4) Finally we make sure that the amount of rows have only incremented by one, as this is the expected result
     *    Any other result is unexpected and is logged, and a admin notified by email
     */
     
    //check to see what the count of rows is after the write to DB
    $sql = "Select id FROM reportedImages";
    $result = mysql_query($sql); 
    $rowsBefore = mysql_num_rows($result);
    
    //write to the DB
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "INSERT INTO reportedImages (src)
    VALUES ('$filepath')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
    //check to see what the count of rows is after the write to DB
    $sql = "Select id FROM reportedImages";
    $result = mysql_query($sql); 
    $rowsAfter = mysql_num_rows($result);
    
    /*
     * if anything other than one row being added happens which is the expected result
     * we close the connection, log a security incedent and email alert the admin
     */
     
    if($rowsBefore != $rowsAfter-1){
        include("../logs/logsMail-1dir.php");
        $conn->close();
        // error: Sorry, there was an error uploading your file.
        header("Location: ../index.php");
        exit();
    }
    
    // Redirects user to the event page with "?reported" appended to the url, so the reported promt appears for user feed back
    header("Location: ../eventPages/".$event.".php?reported");

?>