<?php

    include("connect.php");
    
    $v = "11111";

    $query = "Select * from users WHERE username = $v";
    $result = mysql_query($query);
    
    while ($row = mysql_fetch_assoc($result)) {
    echo $row['username']."<br>";
    }
    
    echo ("<br/><br/><br/>");
    
    $sample = "<br/><br/><br/>";
    
    $sample = escape_data($sample);
    echo ("<br/><br/><br/>");
    echo ("text");
    echo $sample;
    echo ("text");
    echo $_SERVER['PHP_SELF'];
?>