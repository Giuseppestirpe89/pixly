<?php
session_start();
// setcookie('cookieid', "HHHHHH", time()+36000, "/", "c9users.io", 1);
include('includes/connect.php');



               echo     $_SESSION['user']."<br>".
                    // stores to session if the user is a premium user (gets extra content)
                    $_SESSION['premium']."<br>".
                    // adds the users IP address to the session, this will be used for validation at different stages to stop session hijacking - get_client_ip_env() included from connect.php
                    $_SESSION['ip']."<br>";

echo "cook= ".$_COOKIE['cookieId']. "<br> sesh= " .$_SESSION['cookieId']."<br>";
echo $_SESSION['premium']." ".$_SESSION['ip'] ." ". get_client_ip_env()."<br>";
if($_COOKIE['cookieid'] == $_SESSION['cookieid']){
    $q = "y";
    echo $q;
}else{
    $q = "n";
    echo $q;
}


    

?>