<?php
//setting header to json
header('Content-Type: application/json');

    define("HOST", "dublinscoffee.ie");
    define("USER", "dubli653_dib");
    define("PASS", "0u.ipTVc)zpq");
    define("DB", "dubli653_ncirl");
    

//get connection
$mysqli = new mysqli(HOST, USER, PASS, DB);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table for the charts
$query = sprintf("SELECT users, Picture FROM score ORDER BY users");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);