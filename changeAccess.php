<?php
    session_start(); 
    include('includes/connect.php');

    //gets the URL
    $url = $_SERVER['REQUEST_URI'];
    
    //Reads eveything after the ? 
    $eventname = substr($url, strpos($url, "?") + 1); 
    
    //Scrubs the url of any dangerious charicters that could be entered by the end user
    $eventname = stripslashes(trim($eventname));
    $eventname = escape_data($eventname);
    
    //handels the whitespace placholder in the URL
    $eventname =  str_replace("%20","-",$eventname);
    
    $query = "SELECT * FROM events WHERE eventName = '$eventname'";   
    $result = mysql_query($query); 
    while ($row = mysql_fetch_assoc($result)) {
        $PrivateSetting = $row['private'];
        $owner = $row['ownerName'];
    }

    if($PrivateSetting == 0){
        $UpdatingPrivateSetting = 1;
    }
    
    if($PrivateSetting == 1){
        $UpdatingPrivateSetting = 0;
    }
    
    $conn = new mysqli(HOST, USER, PASS, DB);
    $sql = "UPDATE events SET private = '$UpdatingPrivateSetting' WHERE eventName = '$eventname'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Updated num of photos in events<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    header("Location: profiles/".$owner.".php?updated"); 
?>