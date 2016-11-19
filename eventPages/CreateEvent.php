<?php
    session_start();
    include("../includes/connect.php");
    
    $passedRegex = TRUE;  
    
    $formEventname = $_POST['eventName'];    
    
    if(empty($formEventname)){
        $passedRegex = FALSE;
        header("Location: createEventPage.php?mt");
        exit();
    }
    
    $trimmedFormEventname = stripslashes(trim($formEventname));
    if (preg_match ('%^[A-Za-z0-9\.\' \-!_]{3,25}$%',$trimmedFormEventname)) {
        $eventname = escape_data($trimmedFormEventname);
    } else {
        //If criteria is not met $passedRegex is set to false so the query connection will not open
        $passedRegex = FALSE;
        header("Location: createEventPage.php?char");
        exit();
    }
    
    if($passedRegex){
        
        $query = "SELECT * FROM events WHERE eventName = '$eventname'";   
        
        /*
         * mysql_query() was chosen over the other connection functions as it only allows one query to be sent to the DB
         * if a second query was introduced via SLQ injection the second query would not exacute 
         */
         
        $result = mysql_query($query); 
        $numRows = mysql_num_rows($result);
        
        //variable to mark if the event name is free or not
        $eventNameFree = true;
        
        /*
         * event names are unique
         * Because of this a event name query, should only have 1 or 0 row effected
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
            header("Location: newUser.php?userE2");
        }else{
            while ($row = mysql_fetch_assoc($result)) {
                $dbEventName=$row['eventName'];
                //if there is a match we redirect to newUser with userE in the url, we can then read that and display the correct error for the user
                if($dbEventName == $eventname){
                    //we mark the username as not free
                    $eventNameFree = false;
                    header("Location: newUser.php?userE3");
                    exit();
                }
            }
        }
        
        if($eventNameFree){
             //we then log the user details to the DB
            $conn = new mysqli(HOST, USER, PASS, DB);
            $sql = "INSERT INTO events (eventName, numOfPhotos)
            VALUES ('$eventname', '0')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            
            $filename = $eventname.".php";
            touch($filename);
            mkdir("../event/".$eventname);
            copy('eventTemplate.php', $filename);
            header("Location: $filename");
        }else{
            header("Location: createEventPage.php?userE4");
        }
        
    }
    
    
?>