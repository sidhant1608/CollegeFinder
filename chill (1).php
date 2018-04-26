<?php

$min= ($_POST["min"]);
$max= ($_POST["max"]);
$attribute= ($_POST["radio"]);
$action= ($_POST["button"]);
$hostname = "localhost";
$username = "collegefinder_admin";
$password = "collegedb";
$dbname = "collegefinder_db";
$usertable = "college_data";

$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_errno > 0 ){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

if  ($action == 'Submit'){
    if ($attribute == "hs_gpa_avg") {
        $sql = "SELECT * FROM `college_data` WHERE `hs_gpa_avg` > $min AND `hs_gpa_avg` < $max";
    } elseif ($attribute == "sat_avg") {
        $sql = "SELECT * FROM `college_data` WHERE `sat_avg` > $min AND `sat_avg` < $max";
    } elseif ($attribute == "act_avg") {
        $sql = "SELECT * FROM `college_data` WHERE `act_avg` > $min AND `act_avg` < $max";
    } elseif ($attribute == "tuition") {
        $sql = "SELECT * FROM `college_data` WHERE `tuition` > $min AND `tuition` < $max";
    } else echo "No choice selected";
    
    if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
    while($row = $result->fetch_assoc()){
        if ($row[userAdded] == 1) {
        echo "                    ".$row['ranking_display']."  ". $row['display_name'] .'<br />'."   High School GPA:".$row['hs_gpa_avg'].'<br />'."   SAT: ".$row['sat_avg'].'<br />'."   ACT: ".$row['act_avg'].'<br />'."   Tuition: ".$row['tuition'].'<br />'."    Class Size: ".$row['enrollment'].'<br />'."<a href='edit.php?edit=$row[id]'>Edit</a>"."  " ."<a href='delete.php?delete=$row[id]'>Delete</a>".'<br /><br /><br />'; }
        else echo "                    ".$row['ranking_display']."  ". $row['display_name'] .'<br />'."   High School GPA:".$row['hs_gpa_avg'].'<br />'."   SAT: ".$row['sat_avg'].'<br />'."   ACT: ".$row['act_avg'].'<br />'."   Tuition: ".$row['tuition'].'<br />'."    Class Size: ".$row['enrollment'].'<br /><br /><br />';
    }
}
else if ($action == 'Graph'){
    if ($attribute == "hs_gpa_avg") {
        $sql = "SELECT `display_name`, `hs_gpa_avg` FROM `college_data` WHERE `hs_gpa_avg` > $min AND `hs_gpa_avg` < $max";
    } elseif ($attribute == "sat_avg") {
        $sql = "SELECT `display_name`, `sat_avg` FROM `college_data` WHERE `sat_avg` > $min AND `sat_avg` < $max";
    } elseif ($attribute == "act_avg") {
        $sql = "SELECT `display_name`, `act_avg` FROM `college_data` WHERE `act_avg` > $min AND `act_avg` < $max";
    } elseif ($attribute == "tuition") {
        $sql = "SELECT `display_name`, `tuition` FROM `college_data` WHERE `tuition` > $min AND `tuition` < $max";
    } else echo "No choice selected";
    
    if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
$data = array();
while($row = $result->fetch_assoc()){
    $data[] = $row;
}

header('Location: bargraph.html');
json_encode($data);
}

$mysqli->close();
?>