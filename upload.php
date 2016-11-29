<?php

    include("includes/connect.php");
    
    /*
     * ------------- This file uploads the images to the file server and updates the DB with the image info ----------------------------------
     * There are several steps involved
     * - Scrub the user input
     * - Perform some error handeling ie. does file already exist, max size, right file type, etc
     * - Upload the file to the correct directory
     * - INSERT to the 'images' table with a new record for that image, check that we get the expected result from that write to the DB 
     * - UPDATE the 'events' table with a increment to the 'numOfPhotos' value, check that we get the expected result from that update to the DB 
     * ----------------------------------------------------------------------------------------------------------------------------------------
     */
    
    /*
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     */
     
    // scrub user input - escape_data() function and notes in includes/connect.php
    $formEventname = stripslashes(trim($_POST['event']));
    $eventname = escape_data($formEventname);
    
    // scrub user input - escape_data() function and notes in includes/connect.php 
    $formSubmit = stripslashes(trim($_POST['submit']));
    $submit = escape_data($formSubmit);
    
    //$eventname = $_POST["event"];
    $target_dir = "event/".$eventname."/" ;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileNameAndExtention = $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if(isset($submit)) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            
        } else {
            $uploadOk = 0;
            // error: File is not an image.
            header("Location: eventPages/".$eventname.".php?E1");
            exit();
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        // error: Sorry, file already exists.
        header("Location: eventPages/".$eventname.".php?E2");
        exit();
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
        // error: Sorry, your file is too large.
        header("Location: eventPages/".$eventname.".php?E3");
        exit();
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
        // error: Sorry, only JPG, JPEG, PNG & GIF files are allowed.
        header("Location: eventPages/".$eventname.".php?E4");
        exit();
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // error: Sorry, your file was not uploaded.
        header("Location: eventPages/".$eventname.".php?E5");
        exit();
    // if everything is ok, try to upload file
    } else {
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            $conn = new mysqli(HOST, USER, PASS, DB);
            
            /*
             * We write to the 'images' table in the DB $fileNameAndExtention and $eventname so as they can be called to display images in the events and index page.
             * There are 4 stages to this:
             * 1) $fileNameAndExtention and $eventname are user inputs so we need to check we get the expected results from there input to the DB
             *    To do this we first count the number of rows in the DB   
             * 2) We write the information to DB
             * 3) Then we count the amount of rows in the DB again
             * 4) Finally we make sure that the amount of rows have only incremented by one, as this is the expected result
             *    Any other result is unexpected and is logged, and a admin notified by email
             */
             
            //check to see what the count of rows is after the write to DB
            $sql = "Select imageId FROM images";
            $result = mysql_query($sql); 
            $rowsBefore = mysql_num_rows($result);
            
            $user = $_SESSION['user'];

            //Write to DB
            $sql = "INSERT INTO images (imageName, event, owner)
            VALUES ('$fileNameAndExtention', '$eventname', '$user')";
            //if there is a error in writing to the db, close connection and got back to event and display error messege
            if ($conn->query($sql) === FALSE) {
                $conn->close();
                header("Location: eventPages/".$eventname.".php?Ee");
                exit();
            } 
            
            //check to see what the count of rows is after the write to DB
            $sql = "Select imageId FROM images";
            $result = mysql_query($sql); 
            $rowsAfter = mysql_num_rows($result);
            
            /*
             * if anything other than one row being added happens which is the expected result
             * we close the connection, log a security incedent and email alert the admin
             */
             
            if($rowsBefore != $rowsAfter-1){
                include("logs/logsMail.php");
                $conn->close();
                // error: Sorry, there was an error uploading your file.
                header("Location: eventPages/".$eventname.".php?E61");
                exit();
            }
            
            /*
             * We also need to increment the 'events' Table 'numOfPhotos' value by one
             * as this is called on in eventbanner.php to decide how many frames need to be loaded to display the images in index.php
             * we need to use the $eventname variable again which is user input so again we need to check for expected reults
             * we count rows before and after the UPDATE, there should be no changes in numbers as it is just a UPDATE
             * if there is a change we log it, and a admin is notified by email
             */
            
            //check to see what the count of rows is before the update to DB
            $sql = "Select eventId FROM events";
            $result = mysql_query($sql); 
            $rowsBefore = mysql_num_rows($result);
            
            //Write to DB
            $sql = "UPDATE events SET numOfPhotos = numOfPhotos + 1 WHERE eventName = '$eventname'";
            //if there is a error in writing to the db, close connection and got back to event and display error messege
            if ($conn->query($sql) === FALSE) {
                $conn->close();
                header("Location: eventPages/".$eventname.".php?Ee");
                exit();
            } 
            
            //check to see what the count of rows is after the update to DB
            $sql = "Select eventId FROM events";
            $result = mysql_query($sql); 
            $rowsAfter = mysql_num_rows($result);
            
            //check the number of rows are the same, else start the security protocal
            if($rowsBefore != $rowsAfter){
                include("logs/logsMail.php");
                $conn->close();
                // error: Sorry, there was an error uploading your file.
                header("Location: eventPages/".$eventname.".php?E62");
                exit();
            }
             
            //we can now close the connection 
            $conn->close();
            header("Location: eventPages/".$eventname.".php");
            exit();
            
        } else {
            // error: Sorry, there was an error uploading your file.
            header("Location: eventPages/".$eventname.".php?E63");
            exit();
        }
    }

?>