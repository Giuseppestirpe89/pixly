
<?php
 
 /*
 * This script is run anytime we get unexpected results in SQL query’s after user data has been sanitized 
 * as unexpected results after the data sanitization stage are an indicator that someone has been able to get nefarious code past that stage and into the query
 * It records all of the $_SERVER[VAR]'s available with the php library
 * It saves all of this server and client information
 * It also records the text entered into any on the input fields in the browser so as it can be reviewed
 * and rights them all to a file which is saved under a file name of the current date and time in the logs directory
 * As the intruder has made it past all validation the script emails a copy of the file to the pixly mailbox
 * A administrator can the decide if it is a error or attacker and blacklist that IP from the server
 */

    $d = date('Y-m-d H:i:s');
    $myfile = fopen( "../logs/".$d."-sql.php", "w") or die("Unable to open file!");
    $txt = " 
        Date: " . $d ."\n".
        'PHP_SELF: ' . $_SERVER['PHP_SELF'] . "\n" .
        'argv: ' . $_SERVER['argv'] . "\n" . 
        'argc: ' . $_SERVER['argc'] . "\n" . 
        'GATEWAY_INTERFACE: ' . $_SERVER['GATEWAY_INTERFACE'] . "\n" . 
        'SERVER_ADDR: ' . $_SERVER['SERVER_ADDR'] . "\n" . 
        'SERVER_NAME: ' . $_SERVER['SERVER_NAME'] . "\n" . 
        'SERVER_SOFTWARE: ' . $_SERVER['SERVER_SOFTWARE'] . "\n" . 
        'SERVER_PROTOCOL: ' . $_SERVER['SERVER_PROTOCOL'] . "\n" . 
        'REQUEST_METHOD: ' . $_SERVER['REQUEST_METHOD'] . "\n" . 
        'REQUEST_TIME: ' . $_SERVER['REQUEST_TIME'] . "\n" . 
        'REQUEST_TIME_FLOAT: ' . $_SERVER['REQUEST_TIME_FLOAT'] . "\n" . 
        'QUERY_STRING: ' . $_SERVER['QUERY_STRING'] . "\n" . 
        'DOCUMENT_ROOT: ' . $_SERVER['DOCUMENT_ROOT'] . "\n" . 
        'HTTP_ACCEPT: ' . $_SERVER['HTTP_ACCEPT'] . "\n" . 
        'HTTP_ACCEPT_CHARSET: ' . $_SERVER['HTTP_ACCEPT_CHARSET'] . "\n" . 
        'HTTP_ACCEPT_ENCODING: ' . $_SERVER['HTTP_ACCEPT_ENCODING'] . "\n" . 
        'HTTP_ACCEPT_LANGUAGE: ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\n" . 
        'HTTP_CONNECTION: ' . $_SERVER['PHHTTP_CONNECTIONP_SELF'] . "\n" . 
        'HTTP_HOST: ' . $_SERVER['HTTP_HOST'] . "\n" . 
        'HTTP_REFERER: ' . $_SERVER['HTTP_REFERER'] . "\n" . 
        'HTTP_USER_AGENT: ' . $_SERVER['HTTP_USER_AGENT'] . "\n" . 
        'HTTPS: ' . $_SERVER['HTTPS'] . "\n" . 
        'REMOTE_ADDR: ' . $_SERVER['REMOTE_ADDR'] . "\n" . 
        'get_client_ip_env()' . get_client_ip_env() . "\n" .         
        'REMOTE_HOST: ' . $_SERVER['REMOTE_HOST'] . "\n" . 
        'REMOTE_PORT: ' . $_SERVER['REMOTE_PORT'] . "\n" . 
        'REMOTE_USER: ' . $_SERVER['REMOTE_USER'] . "\n" .  
        'REDIRECT_REMOTE_USER: ' . $_SERVER['REDIRECT_REMOTE_USER'] . "\n" .  
        'SCRIPT_FILENAME: ' . $_SERVER['SCRIPT_FILENAME'] . "\n" .  
        'SERVER_ADMIN: ' . $_SERVER['SERVER_ADMIN'] . "\n" .  
        'SERVER_PORT: ' . $_SERVER['SERVER_PORT'] . "\n" .  
        'SERVER_SIGNATURE: ' . $_SERVER['SERVER_SIGNATURE'] . "\n" . 
        'PATH_TRANSLATED: ' . $_SERVER['PATH_TRANSLATED'] . "\n" .  
        'SCRIPT_NAME: ' . $_SERVER['SCRIPT_NAME'] . "\n" .  
        'REQUEST_URI: ' . $_SERVER['REQUEST_URI'] . "\n" .  
        'PHP_AUTH_DIGEST: ' . $_SERVER['PHP_AUTH_DIGEST'] . "\n" .  
        'PHP_AUTH_USER: ' . $_SERVER['PHP_AUTH_USER'] . "\n" .  
        'PHP_AUTH_PW: ' . $_SERVER['PHP_AUTH_PW'] . "\n" . 
        'AUTH_TYPE: ' . $_SERVER['AUTH_TYPE'] . "\n" . 
        'PATH_INFO: ' . $_SERVER['PATH_INFO'] . "\n" . 
        'ORIG_PATH_INFO: ' . $_SERVER['ORIG_PATH_INFO'] . "\n" .
        "Username: " . $_POST['username'] . "\n" .
        "password: " . $_POST['password'] . "\n" .
        "passwordMatch: " . $_POST['passwordmatch'] . "\n" .
        "event: " . $_POST['event'] . "\n" .
        "submit: " . $_POST['submit'] . "\n" .
        "Email: " . $_POST['email'] . "\n
        ";
    fwrite($myfile, $txt);
    fclose($myfile);
    end;

    //Emails a copy of the security incedent to the pixly team
    $to = "info.pixly@gmail.com";
    $subject = "Security incident ".$d;
    mail($to,$subject,$txt);

?>