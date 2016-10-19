<?php
    //ref: http://www.newthinktank.com/2011/01/php-security/

    define("HOST", "dublinscoffee.ie");
    define("USER", "dubli653_dib");
    define("PASS", "0u.ipTVc)zpq");
    define("DB", "dubli653_ncirl");
    
    $connection = mysql_connect(HOST, USER, PASS);
    if (!$connection) {
        trigger_error("Could not select the database!<br />");
        exit();
    }
    
    $db_selected = mysql_select_db(DB,$connection);
    if (!$db_selected) {
        trigger_error("Could not select the database!<br />");
        exit();
    }

    // $query = "SELECT * FROM test";
    // $result = mysql_query($query);
    // while ($row = mysql_fetch_assoc($result)) {
    // echo $row['working'];
    // }
    
    
    /*
     *  Escape data function to strip text that is being sent to the DB of harmful tags and characters 
     *  mysql_real_escape_string() is a more secure method of scrubbing data so we check if it is available, as it realize on a connection to the DB
     *  If available we trim() to remove whitespace, then put pass through the mysql_real_escape_string() to address the threat of SQL injection.
     *  The data is then run through strip_tags() to remove HTML tags like "<script>" to address XSS attacks.
     *
     *  If mysql_real_escape_string() in unavilable we do the same steps but using mysql_escape_string().
     */
    function escape_data($dataFromForms) {
        if (function_exists('mysql_real_escape_string')) {
            global $connection;
            $dataFromForms = mysql_real_escape_string (trim($dataFromForms), $connection);
            $dataFromForms = strip_tags($dataFromForms);
            echo ("mysql_real_escape_string was available");
        } else {
            $dataFromForms = mysql_escape_string (trim($dataFromForms));
            $dataFromForms = strip_tags($dataFromForms);
            echo ("mysql_real_escape_string was not available");
        }
        return $dataFromForms;
    }

?>