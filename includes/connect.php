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

?>