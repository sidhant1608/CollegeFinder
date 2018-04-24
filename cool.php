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

$sql = 'SELECT * FROM `college_data` WHERE `display_name` LIKE'. ' \''.$Name.'\'';

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}

while($row = $result->fetch_assoc()){
    if ($row[userAdded] == 1) {
    echo $row['display_name'] . "<a href='edit.php?edit=$row[id]'>Edit</a>"."  " ."<a href='delete.php?delete=$row[id]'>Delete</a>".'<br />'; }
    else echo $row['ranking_display'] . "-" . $row['display_name'] . '<br />';
    
}

$mysqli->close();
?>
