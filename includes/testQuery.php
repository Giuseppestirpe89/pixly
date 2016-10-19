<?php

    include("connect.php");

    $query = "Select * from test";
    $result = mysql_query($query);
    
    while ($row = mysql_fetch_assoc($result)) {
    echo $row['working'];
    }
    
    echo ("<br/><br/><br/>");
    
    $sample = "<br/><br/><br/>";
    
    $sample = escape_data($sample);
    echo ("<br/><br/><br/>");
    echo ("text");
    echo $sample;
    echo ("text");
    
?>