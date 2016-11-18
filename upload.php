<?php
    $eventname = $_POST["event"];
    $target_dir = "event/".$eventname."/" ;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            exit();
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
            header("Location: eventPages/".$eventname.".php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
            header("Location: eventPages/".$eventname.".php?E6");
            exit();
        }
    }

?>