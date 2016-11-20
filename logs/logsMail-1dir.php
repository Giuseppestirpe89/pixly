
<?php
 
 /*
  * ---------------- This script is run anytime we get unexpected results in SQL query’s after user data has been sanitized ------------------------------------------
  * as unexpected results after the data sanitization stage are an indicator that someone has been able to get nefarious code past that stage and into the query
  * It records all of the $_SERVER[VAR]'s available with the php library
  * It saves all of this server and client information
  * It also records the text entered into any on the input fields in the browser so as it can be reviewed
  * and rights them all to a file which is saved under a file name of the current date and time in the logs directory
  * As the intruder has made it past all validation the script emails a copy of the file to the pixly mailbox
  * A administrator can the decide if it is a error or attacker and blacklist that IP from the server
  * ------------------------------------------------------------------------------------------------------------------------------------------------------------------
  */

    $d = date('Y-m-d H:i:s');
    $myfile = fopen( "../logs/records/".$d."-sql.php", "w") or die("Unable to open file!");
    $txt = " \n".
        "Date: " . $d ."<br>" ."\n".
        'PHP_SELF: ' . $_SERVER['PHP_SELF'] ."<br>" . "\n" .
        'argv: ' . $_SERVER['argv'] ."<br>" . "\n" . 
        'argc: ' . $_SERVER['argc'] ."<br>" . "\n" . 
        'GATEWAY_INTERFACE: ' . $_SERVER['GATEWAY_INTERFACE'] ."<br>" . "\n" . 
        'SERVER_ADDR: ' . $_SERVER['SERVER_ADDR'] . "<br>" ."\n" . 
        'SERVER_NAME: ' . $_SERVER['SERVER_NAME'] ."<br>" . "\n" . 
        'SERVER_SOFTWARE: ' . $_SERVER['SERVER_SOFTWARE'] ."<br>" . "\n" . 
        'SERVER_PROTOCOL: ' . $_SERVER['SERVER_PROTOCOL'] ."<br>" . "\n" . 
        'REQUEST_METHOD: ' . $_SERVER['REQUEST_METHOD'] . "<br>" ."\n" . 
        'REQUEST_TIME: ' . $_SERVER['REQUEST_TIME'] . "<br>" ."\n" . 
        'REQUEST_TIME_FLOAT: ' . $_SERVER['REQUEST_TIME_FLOAT'] . "<br>" ."\n" . 
        'QUERY_STRING: ' . $_SERVER['QUERY_STRING'] . "<br>" ."\n" . 
        'DOCUMENT_ROOT: ' . $_SERVER['DOCUMENT_ROOT'] . "<br>" ."\n" . 
        'HTTP_ACCEPT: ' . $_SERVER['HTTP_ACCEPT'] . "<br>" ."\n" . 
        'HTTP_ACCEPT_CHARSET: ' . $_SERVER['HTTP_ACCEPT_CHARSET'] . "<br>" ."\n" . 
        'HTTP_ACCEPT_ENCODING: ' . $_SERVER['HTTP_ACCEPT_ENCODING'] ."<br>" . "\n" . 
        'HTTP_ACCEPT_LANGUAGE: ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>" ."\n" . 
        'HTTP_CONNECTION: ' . $_SERVER['PHHTTP_CONNECTIONP_SELF'] . "<br>" ."\n" . 
        'HTTP_HOST: ' . $_SERVER['HTTP_HOST'] ."<br>" . "\n" . 
        'HTTP_REFERER: ' . $_SERVER['HTTP_REFERER'] ."<br>" . "\n" . 
        'HTTP_USER_AGENT: ' . $_SERVER['HTTP_USER_AGENT'] ."<br>" . "\n" . 
        'HTTPS: ' . $_SERVER['HTTPS'] . "<br>" ."\n" . 
        'REMOTE_ADDR: ' . $_SERVER['REMOTE_ADDR'] . "<br>" ."\n" . 
        'REMOTE_HOST: ' . $_SERVER['REMOTE_HOST'] . "<br>" ."\n" . 
        'REMOTE_PORT: ' . $_SERVER['REMOTE_PORT'] . "<br>" ."\n" . 
        'REMOTE_USER: ' . $_SERVER['REMOTE_USER'] . "<br>" ."\n" .  
        'REDIRECT_REMOTE_USER: ' . $_SERVER['REDIRECT_REMOTE_USER'] ."<br>" . "\n" .  
        'SCRIPT_FILENAME: ' . $_SERVER['SCRIPT_FILENAME'] ."<br>" . "\n" .  
        'SERVER_ADMIN: ' . $_SERVER['SERVER_ADMIN'] . "<br>" ."\n" .  
        'SERVER_PORT: ' . $_SERVER['SERVER_PORT'] ."<br>" . "\n" .  
        'SERVER_SIGNATURE: ' . $_SERVER['SERVER_SIGNATURE'] . "<br>" ."\n" . 
        'PATH_TRANSLATED: ' . $_SERVER['PATH_TRANSLATED'] . "<br>" ."\n" .  
        'SCRIPT_NAME: ' . $_SERVER['SCRIPT_NAME'] . "<br>" ."\n" .  
        'REQUEST_URI: ' . $_SERVER['REQUEST_URI'] . "<br>" ."\n" .  
        'PHP_AUTH_DIGEST: ' . $_SERVER['PHP_AUTH_DIGEST'] ."<br>" . "\n" .  
        'PHP_AUTH_USER: ' . $_SERVER['PHP_AUTH_USER'] . "<br>" ."\n" .  
        'PHP_AUTH_PW: ' . $_SERVER['PHP_AUTH_PW'] . "<br>" ."\n" . 
        'AUTH_TYPE: ' . $_SERVER['AUTH_TYPE'] . "<br>" ."\n" . 
        'PATH_INFO: ' . $_SERVER['PATH_INFO'] . "<br>" ."\n" . 
        'ORIG_PATH_INFO: ' . $_SERVER['ORIG_PATH_INFO'] ."<br>" . "\n" .
        "Username: " . $_POST['username'] . "<br>" ."\n" .
        "password: " . $_POST['password'] . "<br>" ."\n" .
        "passwordMatch: " . $_POST['passwordmatch'] ."<br>" . "\n" .
        "event: " . $_POST['event'] ."<br>" . "\n" .
        "submit: " . $_POST['submit'] . "<br>" ."\n" .
        "Email: " . $_POST['email'] ."<br>" ."\n
        ";
    fwrite($myfile, $txt);
    fclose($myfile);
    end;

    //Emails a copy of the security incedent to the pixly team
    $to = "info.pixly@gmail.com";
    $subject = "Security incident ".$d;
    mail($to,$subject,$txt);

?>