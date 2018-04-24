<?php

$Name= ($_POST["Name"]);
$hostname = "localhost";
$username = "collegefinder_admin";
$password = "collegedb";
$dbname = "collegefinder_db";
$usertable = "college_data";

$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_errno > 0 ){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

if( isset ($_GET['delete'])){
    $id= $_GET['delete'];
    
}

$sql = "DELETE FROM `college_data` WHERE `id` = $id";

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
    
}
else echo "Entry Deleted";

?>