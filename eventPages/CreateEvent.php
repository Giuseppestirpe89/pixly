<?php
    session_start();
    include("../includes/connect.php");
    
    /*
     * $passedRegex is set to true
     * If the user input fails any vailidation we change that to false
     * before we we start to read or write to teh DB we check that value
     * the value must be true or else nothing will be sent/taken from the DB and the user will be redirected
     */

    $passedRegex = TRUE;  
    
    $formEventname = $_POST['eventName'];    
    
    //checks the input value was filled in
    if(empty($formEventname)){
        //the required class is set in the html, this should not be empty
        //empty input is a indication a user has been altering the html on the client side
        $passedRegex = FALSE;
        header("Location: createEventPage.php?mt");
        exit();
    }
    
    /*
     * scribs user data and runs it through the escape_data() function *notes in includes/connect.php
     */
     
    $trimmedFormEventname = stripslashes(trim($formEventname));
    if (preg_match ('%^[A-Za-z0-9\.\' \-!_]{3,25}$%',$trimmedFormEventname)) {
        $eventname = escape_data($trimmedFormEventname);
    } else {
        //If criteria is not met $passedRegex is set to false so the query connection will not open
        $passedRegex = FALSE;
        header("Location: createEventPage.php?char");
        exit();
    }
    
    //handels whitespace in event names
    $eventname =  str_replace(" ","-",$eventname);
    
    //DB querys only sent when we are happy with the data has bee scrubed and validation
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
         * So we create a security log by calling "/log/logmail.php" --- notes on this script in that file
         * As as intruder could potentialy have penatrated as far as the SQL connection a mail is sent to the Pixly admin to notify them
         * "/log/logmail.php" records all the current server info, client info and what text was entered into the input fields
         * this can then be reviewed in detail to see it was a potential attacker and if we want to blacklist the IP from the server
         */
        
        if($numRows > 1){
            //logs a security file
            include("../logs/logsMail.php");
            //closed the sql connection
            mysql_close($connection);
            //redirects user
            header("Location: newUser.php?userE2");
        }else{
            while ($row = mysql_fetch_assoc($result)) {
                $dbEventName=$row['eventName'];
                
                /*
                 * we compare the event name the user wants against the ones in the DB
                 * if there is a match, it is unavailable adn we redirect to newUser with userE in the url
                 * we can then read that and display the correct error for the user
                 */
                 
                if($dbEventName == $eventname){
                    //we mark the username as not free
                    $eventNameFree = false;
                    header("Location: newUser.php?userE3");
                    exit();
                }
            }
        }
        
        //if the username is free
        if($eventNameFree){
            $conn = new mysqli(HOST, USER, PASS, DB);
            $sql = "INSERT INTO events (eventName, numOfPhotos)
            VALUES ('$eventname', '0')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            
            /*
             * this creates a php file in the 'eventPages' directory
             * then copys the contents from the eventTemplate.php to that new file
             */
             
            $filename = $eventname.".php";
            touch($filename);
            copy('eventTemplate.php', $filename);
            
            /*
             * we make a new directory in 'events' and call it the event name
             * this is where the images for the event are stored
             */
            mkdir("../event/".$eventname);
            
            /*
             * Creates QR token of a random string 25 charicters long
             * which is appended to the event URL before that full URL is generated into a QR code using the google API
             */
            $QRtokenvalue =  substr(sha1(rand()), 0, 25);
            $file_data = "<?php "."$"."QRtoken =  ".$QRtokenvalue."?>";
            
            // takes all the text from the new event page and stores it in $file_data
            $file_data .= file_get_contents($filename);
            
            /* 
             * Then puts the QR token in the new event file first, and the original contents in after
             * This puts the QR token on the token of the file so it can be called on further done in it
             */
             
            file_put_contents($filename, $file_data);
            header("Location: $filename");
        }else{
            header("Location: createEventPage.php?userE4");
        }
        
    }
    
    
?>