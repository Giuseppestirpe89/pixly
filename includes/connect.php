<?php
// Define these as constants so that they can’t be changed
DEFINE (‘DBUSER’, "a5270211_pixlys");
DEFINE (‘DBPW’, "pixly1234");
DEFINE (‘DBHOST’, "http://sql11.000webhost.com/");
DEFINE (‘DBNAME’, "a5270211_pixly");

if ($dbc = mysql_connect (DBHOST, DBUSER, DBPW)) {
    trigger_error("connect to MySQL");


$query = "SELECT * id";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                //takes usename
                echo"<h1>".$row["id"]."</h1>";
            }



if (!mysql_select_db (DBNAME)) { // If it can’t select the database.

//vauge errors so as not to assist hackers
trigger_error("Could not select the database!<br />");

exit();

}

} else {

trigger_error("Could not connect to MySQL!<br /> ");

exit();

}

echo("here");

?>