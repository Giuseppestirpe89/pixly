<?php
session_start(); 
    include('../includes/connect.php');
    $url = $_SERVER['REQUEST_URI'];
    $filePath = substr($url, strpos($url, "?") + 1); 
    
    $filePath = stripslashes(trim($filePath));
    $filePath = escape_data($filePath);
    $filePath =  str_replace("%20"," ",$filePath);
    list($event, $file) = explode("/", $filePath);
    unlink("../event/$filePath");

 
        /*
         * We write to the 'reportedImages' table in the DB 
         * There are 4 stages to this:
         * 1) we first count the number of rows in the DB   
         * 2) We write the information to DB
         * 3) Then we count the amount of rows in the DB again
         * 4) Finally we make sure that the amount of rows have only incremented by one, as this is the expected result
         *    Any other result is unexpected and is logged, and a admin notified by email
         */
         
        //check to see what the count of rows is after the delete to the DB
        $query = "SELECT * FROM reportedImages";   
        $result = mysql_query($query); 
        $rowsBefore = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $rowsBefore++;
        }
        
        //write to the DB
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
           
            // error: Sorry, there was an error uploading your file.
            //header("Location: ../index.php?1");
            //exit();
        }
        
        
        
       // ---------------------------
        
        $query = "SELECT * FROM images";   
        $result = mysql_query($query); 
        $rowsBefore = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $rowsBefore++;
        }
        
        //write to the DB
        $conn = new mysqli(HOST, USER, PASS, DB);
        $sql = "DELETE FROM images Where imageName = '$file'";
        if ($conn->query($sql) === TRUE) {
            echo "New record has been removed from images <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
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
            //header("Location: ../index.php?2");
            exit();
        }
        
        
        //------------------------------------
        
        $query = "SELECT * FROM events";   
        $result = mysql_query($query); 
        $rowsBefore = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $rowsBefore++;
        }
            
        $iquery = "SELECT * FROM events WHERE eventName = '$eventName'";
        $iresult = mysql_query($iquery); 
        while ($irow = mysql_fetch_assoc($iresult)) {
            $valueBeforeUpdate = $irow['numOfPhotos'];
            $valueAfterUpdate = $valueBeforeUpdate-1;
        }
        $numRows = mysql_num_rows($iresult);
        //echo $numRows;
        if($numRows != 0){
            //logs a security file
            include("../logs/logsMail-1dir.php");
            //closed the sql connection
            echo"forst";
            //redirects user index
            //header("Location: ../failedLogin.php?error");
            exit();
        }
        
        //------------------------------------
        //write to the DB
        $conn = new mysqli(HOST, USER, PASS, DB);
        $sql = "UPDATE events SET numOfPhotos = '$valueAfterUpdate' WHERE eventName = '$event'";
        if ($conn->query($sql) === TRUE) {
            echo "Updated num of photos in events<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $query = "SELECT * FROM events";   
        $result = mysql_query($query); 
        $rowsAfter = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $rowsAfter++;
        }
        echo $rowsBefore."-". $rowsAfter;
        if($rowsBefore != $rowsAfter){
            //logs a security file
            include("../logs/logsMail-1dir.php");
            echo"end";
            //closed the sql connection
            //redirects user index
            //header("Location: ../failedLogin.php?error");
            exit();
        }
        
        
  header("Location: adminConsole-Flagged.php?removed"); 
  

            
?>