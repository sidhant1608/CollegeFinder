<?php

$id = ($_POST["id"]);
$uname= ($_POST["uname"]);
$act_avg= ($_POST["act_avg"]);
$sat_avg= ($_POST["sat_avg"]);
$enrollment= ($_POST["enrollment"]);
$city= ($_POST["city"]);
$zip= ($_POST["zip"]);
$acceptance_rate= ($_POST["acceptance_rate"]);
$state= ($_POST["state"]);
$hs_gpa_avg= ($_POST["hs_gpa_avg"]);
$tuition= ($_POST["tuition"]);
$attribute= ($_POST["radio"]);
$hostname = "localhost";
$username = "collegefinder_admin";
$password = "collegedb";
$dbname = "collegefinder_db";
$usertable = "college_data";



$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_errno > 0 ){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

$sql = "DELETE FROM `college_data` WHERE `id` = $id";

if(!$result = $mysqli->query($sql)){
    die('There was an error running the delete query [' . $mysqli->error . ']');
}

$sql1 = "INSERT INTO `college_data` (`act_avg`, `sat_avg`, `enrollment`, `city`, `sortName`, `zip`, `acceptance_rate`, `ranking_score`, `receiving_aid`, `cost_after_aid`, `state`, `ranking_sort`, `hs_gpa_avg`, `urlName`, `ranking_display`, `business_score`, `tuition`, `engineering_score`, `display_name`, `overall_rank`, `control`, `id`, `userAdded`) VALUES ('$act_avg', '$sat_avg', '$enrollment', '$city', NULL, '$zip', '$acceptance_rate', NULL, NULL, NULL, '$state', NULL, '$hs_gpa_avg', NULL, NULL, NULL, '$tuition', NULL, '$uname', NULL, NULL, '$id', '1')";
if(!$result1 = $mysqli->query($sql1)){
    die('There was an error running the insert query [' . $mysqli->error . ']');
}
echo "University Updated";



?>