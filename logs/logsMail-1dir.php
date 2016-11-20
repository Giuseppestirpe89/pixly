
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

    $d = date('Y-m-d-H:i:s');
    $myfile = fopen( "../logs/records/".$d."-sql.php", "w") or die("Unable to open file!");
    $txt = "<br>".
        "<b>Date:</b> " . $d ."<br>" ."\n".
        '<b>PHP_SELF:</b> ' . $_SERVER['PHP_SELF'] ."<br>" . "\n" .
        '<b>argv:</b> ' . $_SERVER['argv'] ."<br>" . "\n" . 
        '<b>argc:</b> ' . $_SERVER['argc'] ."<br>" . "\n" . 
        '<b>GATEWAY_INTERFACE:</b> ' . $_SERVER['GATEWAY_INTERFACE'] ."<br>" . "\n" . 
        '<b>SERVER_ADDR:</b> ' . $_SERVER['SERVER_ADDR'] . "<br>" ."\n" . 
        '<b>SERVER_NAME: </b>' . $_SERVER['SERVER_NAME'] ."<br>" . "\n" . 
        '<b>SERVER_SOFTWARE:</b> ' . $_SERVER['SERVER_SOFTWARE'] ."<br>" . "\n" . 
        '<b>SERVER_PROTOCOL:</b> ' . $_SERVER['SERVER_PROTOCOL'] ."<br>" . "\n" . 
        '<b>REQUEST_METHOD:</b> ' . $_SERVER['REQUEST_METHOD'] . "<br>" ."\n" . 
        '<b>REQUEST_TIME: </b>' . $_SERVER['REQUEST_TIME'] . "<br>" ."\n" . 
        '<b>REQUEST_TIME_FLOAT:</b> ' . $_SERVER['REQUEST_TIME_FLOAT'] . "<br>" ."\n" . 
        '<b>QUERY_STRING:</b> ' . $_SERVER['QUERY_STRING'] . "<br>" ."\n" . 
        '<b>DOCUMENT_ROOT:</b> ' . $_SERVER['DOCUMENT_ROOT'] . "<br>" ."\n" . 
        '<b>HTTP_ACCEPT:</b> ' . $_SERVER['HTTP_ACCEPT'] . "<br>" ."\n" . 
        '<b>HTTP_ACCEPT_CHARSET:</b> ' . $_SERVER['HTTP_ACCEPT_CHARSET'] . "<br>" ."\n" . 
        '<b>HTTP_ACCEPT_ENCODING:</b> ' . $_SERVER['HTTP_ACCEPT_ENCODING'] ."<br>" . "\n" . 
        '<b>HTTP_ACCEPT_LANGUAGE:</b> ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>" ."\n" . 
        '<b>HTTP_CONNECTION:</b> ' . $_SERVER['PHHTTP_CONNECTIONP_SELF'] . "<br>" ."\n" . 
        '<b>HTTP_HOST:</b> ' . $_SERVER['HTTP_HOST'] ."<br>" . "\n" . 
        '<b>HTTP_REFERER:</b> ' . $_SERVER['HTTP_REFERER'] ."<br>" . "\n" . 
        '<b>HTTP_USER_AGENT:</b> ' . $_SERVER['HTTP_USER_AGENT'] ."<br>" . "\n" . 
        '<b>HTTPS:</b> ' . $_SERVER['HTTPS'] . "<br>" ."\n" . 
        '<b>REMOTE_ADDR:</b> ' . $_SERVER['REMOTE_ADDR'] . "<br>" ."\n" . 
        '<b>REMOTE_HOST:</b> ' . $_SERVER['REMOTE_HOST'] . "<br>" ."\n" . 
        '<b>REMOTE_PORT:</b> ' . $_SERVER['REMOTE_PORT'] . "<br>" ."\n" . 
        '<b>REMOTE_USER:</b> ' . $_SERVER['REMOTE_USER'] . "<br>" ."\n" .  
        '<b>REDIRECT_REMOTE_USER:</b> ' . $_SERVER['REDIRECT_REMOTE_USER'] ."<br>" . "\n" .  
        '<b>SCRIPT_FILENAME:</b> ' . $_SERVER['SCRIPT_FILENAME'] ."<br>" . "\n" .  
        '<b>SERVER_ADMIN:</b> ' . $_SERVER['SERVER_ADMIN'] . "<br>" ."\n" .  
        '<b>SERVER_PORT:</b> ' . $_SERVER['SERVER_PORT'] ."<br>" . "\n" .  
        '<b>SERVER_SIGNATURE:</b> ' . $_SERVER['SERVER_SIGNATURE'] . "<br>" ."\n" . 
        '<b>PATH_TRANSLATED:</b> ' . $_SERVER['PATH_TRANSLATED'] . "<br>" ."\n" .  
        '<b>SCRIPT_NAME:</b> ' . $_SERVER['SCRIPT_NAME'] . "<br>" ."\n" .  
        '<b>REQUEST_URI:</b> ' . $_SERVER['REQUEST_URI'] . "<br>" ."\n" .  
        '<b>PHP_AUTH_DIGEST:</b> ' . $_SERVER['PHP_AUTH_DIGEST'] ."<br>" . "\n" .  
        '<b>PHP_AUTH_USER:</b> ' . $_SERVER['PHP_AUTH_USER'] . "<br>" ."\n" .  
        '<b>PHP_AUTH_PW:</b> ' . $_SERVER['PHP_AUTH_PW'] . "<br>" ."\n" . 
        '<b>AUTH_TYPE:</b> ' . $_SERVER['AUTH_TYPE'] . "<br>" ."\n" . 
        '<b>PATH_INFO:</b> ' . $_SERVER['PATH_INFO'] . "<br>" ."\n" . 
        '<b>ORIG_PATH_INFO:</b> ' . $_SERVER['ORIG_PATH_INFO'] ."<br>" . "\n" .
        "<b>Username:</b> " . $_POST['username'] . "<br>" ."\n" .
        "<b>password:</b> " . $_POST['password'] . "<br>" ."\n" .
        "<b>passwordMatch:</b> " . $_POST['passwordmatch'] ."<br>" . "\n" .
        "<b>event:</b> " . $_POST['event'] ."<br>" . "\n" .
        "<b>submit:</b> " . $_POST['submit'] . "<br>" ."\n" .
        "<b>Email:</b> " . $_POST['email'] ."<br>" ."\n
        ";
    fwrite($myfile, $txt);
    fclose($myfile);
    end;

    //Emails a copy of the security incedent to the pixly team
    $to = "info.pixly@gmail.com";
    $subject = "Security incident ".$d;
    mail($to,$subject,$txt);

?>