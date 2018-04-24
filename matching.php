<?php

$name= ($_POST["student_name"]);
$gpa= ($_POST["gpa"]);
$act= ($_POST["act"]);
$sat= ($_POST["sat"]);
$city= ($_POST["city"]);
$tuition= ($_POST["tuition"]);
$enrollment= ($_POST["enrollment"]);
$hostname = "localhost";
$username = "collegefinder_admin";
$password = "collegedb";
$dbname = "collegefinder_db";
$usertable = "college_data";
$gpamin = $gpa - 0.3;
$gpamax = $gpa + 0.3;
$actmin = $act - 3;
$actmax = $act + 3;
$satmax = $sat + 250;
$satmin = $sat - 250;
$tmin = $tuition - 3000;
$tmax = $tuitoin + 3000;
$emax = $enrollment + 5000;
$emin = $enrollment - 5000;

$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_errno > 0 ){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

$sql = "SELECT * FROM `college_data` WHERE `hs_gpa_avg` > $gpamin AND `hs_gpa_avg` < $gpamax  AND `act_avg` > $actmin AND `act_avg` < $actmax AND `sat_avg` > $satmin AND `sat_avg` < $satmax";
if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
echo $name.", here are the results we have:".'<br />';
while($row = $result->fetch_assoc()){
        if ($row[userAdded] == 1) {
        echo "                    ".$row['display_name'] .'  '."<a href='edit.php?edit=$row[id]'>Edit</a>"."  " ."<a href='delete.php?delete=$row[id]'>Delete</a>".'<br /><br />'; }
        else echo "                    ".$row['ranking_display']."  ". $row['display_name'] .'<br />'."   High School GPA:".$row['hs_gpa_avg'].'<br />'."   SAT: ".$row['sat_avg'].'<br />'."   ACT: ".$row['act_avg'].'<br />'."   Tuition: ".$row['tuition'].'<br />'."    Class Size: ".$row['enrollment'].'<br /><br /><br />';
    }
$sql1 = 'SELECT * FROM `college_data` WHERE `city` LIKE'. ' \''.$city.'\'';
$result1 = $mysqli->query($sql);
while($row1 = $result1->fetch_assoc()){
        if ($row[userAdded] == 1) {
        echo "                    ".$row['display_name'] .'  '."<a href='edit.php?edit=$row[id]'>Edit</a>"."  " ."<a href='delete.php?delete=$row[id]'>Delete</a>".'<br /><br />'; }
        else echo "                    ".$row['ranking_display']."  ". $row['display_name'] .'<br />'."   High School GPA:".$row['hs_gpa_avg'].'<br />'."   SAT: ".$row['sat_avg'].'<br />'."   ACT: ".$row['act_avg'].'<br />'."   Tuition: ".$row['tuition'].'<br />'."    Class Size: ".$row['enrollment'].'<br /><br /><br />';
    }
?>