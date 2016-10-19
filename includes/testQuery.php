<?php

    include("connect.php");

    $query = "SELECT * FROM test";
    $result = mysql_query($query);
    
    while ($row = mysql_fetch_assoc($result)) {
    echo $row['working'];
    }
    
?>