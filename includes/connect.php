<?php
// Define these as constants so that they can’t be changed
DEFINE (‘DBUSER’, ‘a9153701_a915370’);
DEFINE (‘DBPW’, ‘Passwod1’);
DEFINE (‘DBHOST’, ‘dons-app.net16.net’);
DEFINE (‘DBNAME’, ‘a9153701_logins’);

if ($dbc = mysql_connect (DBHOST, DBUSER, DBPW)) {

if (!mysql_select_db (DBNAME)) { // If it can’t select the database.

//vauge errors so as not to assist hackers
trigger_error(“Could not select the database!<br />”);

exit();

}

} else {

trigger_error(“Could not connect to MySQL!<br /> “);

exit();

}

echo("here");

?>