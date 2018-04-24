
<?php

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
$id1 = rand(1,50000);
$id = rand(1,$id1);


$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_errno > 0 ){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

//insert into statement
$sql= "INSERT INTO `college_data` (`act_avg`, `sat_avg`, `enrollment`, `city`, `sortName`, `zip`, `acceptance_rate`, `ranking_score`, `receiving_aid`, `cost_after_aid`, `state`, `ranking_sort`, `hs_gpa_avg`, `urlName`, `ranking_display`, `business_score`, `tuition`, `engineering_score`, `display_name`, `overall_rank`, `control`, `id`, `userAdded`) VALUES ('$act_avg', '$sat_avg', '$enrollment', '$city', NULL, '$zip', '$acceptance_rate', NULL, NULL, NULL, '$state', NULL, '$hs_gpa_avg', NULL, NULL, NULL, '$tuition', NULL, '$uname', NULL, NULL, '$id', '1')";



if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}

echo "University Added";



?>