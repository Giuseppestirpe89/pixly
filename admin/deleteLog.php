<?php

    $url = $_SERVER['REQUEST_URI'];
    $whatIWant = substr($url, strpos($url, "?") + 1); 
    unlink("../logs/records/$whatIWant");
    header("Location: adminConsole-Security.php?deleted"); 
            
?>