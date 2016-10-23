<?php
    //ref: http://www.newthinktank.com/2011/01/php-security/
    
    /*
     *  DB details are defined as constants rather than variables, to stop values from being altered.
     */

    define("HOST", "dublinscoffee.ie");
    define("USER", "dubli653_dib");
    define("PASS", "0u.ipTVc)zpq");
    define("DB", "dubli653_ncirl");
    
    /*
     *  --The php.ini customized for security --
     *  The ini file as been left under its standard config for development but for production it has been been given a custom configuration
     *  max files sizes for uploads
     *  Will only accept certin file types for uploads, .jpeg .png etc
     *  Default PHP errors (error_reporting) is suppressed to disrupted possible trouble shooting that attacker can go through when trying to penetrate  via SQL or PHP
     *  SQL errors are customized and triggered through our own validation. Errors are purposely vague
     *  https://www.owasp.org/index.php/PHP_Configuration_Cheat_Sheet
     */
     
    $connection = mysql_connect(HOST, USER, PASS);
    if (!$connection) {
        //faild connections are exited and a non discript error is echo'd to the user
        trigger_error("Could not reach database!<br/>");
        exit();
    }
    
    $db_selected = mysql_select_db(DB,$connection);
    if (!$db_selected) {
        //faild connections are exited and a non discript error is echo'd to the user
        trigger_error("Could not reach database!<br/>");
        exit();
    }
    
    
    /*
     *  --escape_data function strips text that is being sent to the DB of harmful tags and characters --
     *  mysql_real_escape_string() is a more secure method of scrubbing data so we check if it is available, as it rely's on a connection to the DB
     *  If available we trim() to remove whitespace, then put pass through the mysql_real_escape_string() to address the threat of SQL injection.
     *  The data is then run through strip_tags() to remove HTML tags like "<script>" to address XSS attacks.
     *
     *  If mysql_real_escape_string() in unavailable we do the same steps but using mysql_escape_string().
     *
     *  !This function should be used for all text sent to the DB or files on the web/file directory!
     */
     
    function escape_data($dataFromForms) {
        if (function_exists('mysql_real_escape_string')) {
            global $connection;
            $dataFromForms = mysql_real_escape_string (trim($dataFromForms), $connection);
            $dataFromForms = strip_tags($dataFromForms);
        } else {
            $dataFromForms = mysql_escape_string (trim($dataFromForms));
            $dataFromForms = strip_tags($dataFromForms);
        }
        return $dataFromForms;
    }

?>