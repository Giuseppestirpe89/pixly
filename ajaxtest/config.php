<?php

$host = "dublinscoffee.ie";    /* Host name */
$user = "dubli653_dib";         /* User */
$password = "0u.ipTVc)zpq";         /* Password */
$dbname = "dubli653_ncirl";   /* Database name */

$con = mysql_connect($host, $user, $password) or die("Unable to connect");

// selecting database
$db = mysql_select_db($dbname, $con) or die("Database not found");