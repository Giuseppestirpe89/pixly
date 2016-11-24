
<?php

    /*------------------Deletes the security log from /logs/records/----------------
     * - the filename is passed through the url from adminConsole-Security.php
     * - this is read and the file is deleted
     * - user is ther reverted back to the adminConsole-Security.php page 
     *   appeneded with the messege we want the user to be propted with
     *------------------------------------------------------------------------------
     */
     
    session_start(); 
    include('../includes/connect.php');
    
    /*
     * Checkes the user has admin privileges and cross checks the IP logged and cookie generated at login
     */
     
    if($_SESSION['premium'] != 'admin' || $_SESSION['ip'] != get_client_ip_env() || $_COOKIE['cookieId'] != $_SESSION['cookieId']) { 
        //if any do not match the user is directed to KillSessiom which loggs the user out, the user will then get a prompt to say they have been logged out
        header("Location: ../includes/killSession.php?inactive");
    }
    
    
    $url = $_SERVER['REQUEST_URI'];
    //gets filename from URL
    $whatIWant = substr($url, strpos($url, "?") + 1); 
    // deletes file
    unlink("../logs/records/$whatIWant");
    header("Location: adminConsole-Security.php?deleted"); 
            
?>