<?php

    include("includes/connect.php");
    
    /*
     *  We run the text through trim() to remove unnessesry whitespace and then stripslashes() to unquote quoted strings.
     *  The text is then run through the the escape_data() function *notes in includes/connect.php
     */
     
    $formEventname = stripslashes(trim($_POST['event']));
    $eventname = escape_data($formEventname);
    
    $formSubmit = stripslashes(trim($_POST['submit']));
    $submit = escape_data($formSubmit);
    
    $eventname = $_POST["event"];
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
            echo "File is not an image.";
            $uploadOk = 0;
            header("Location: eventPages/".$eventname.".php?E1");
            exit();
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        header("Location: eventPages/".$eventname.".php?E2");
        exit();
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        header("Location: eventPages/".$eventname.".php?E3");
        exit();
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        header("Location: eventPages/".$eventname.".php?E4");
        exit();
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit();
        header("Location: eventPages/".$eventname.".php?E5");
    // if everything is ok, try to upload file
    } else {
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            $conn = new mysqli(HOST, USER, PASS, DB);
            
            //check to see what the count of rows is after the write to DB
            $sql = "Select imageId FROM images";
            $result = mysql_query($sql); 
            $rowsBefore = mysql_num_rows($result);

            //Write to DB
            $sql = "INSERT INTO images (imageName, event)
            VALUES ('$fileNameAndExtention', '$eventname')";
            
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
                header("Location: eventPages/".$eventname.".php?E6");
                exit();
            }
            
            $conn->close();
            // header("Location: eventPages/".$eventname.".php");
            exit();
            
        } else {
            echo "Sorry, there was an error uploading your file.";
            header("Location: eventPages/".$eventname.".php?E6");
            exit();
        }
    }
    
        


?>