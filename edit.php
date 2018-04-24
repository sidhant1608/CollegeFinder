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

if( isset ($_GET['edit'])){
    $id= $_GET['edit'];
    
}

$sql = "SELECT * FROM `college_data` WHERE `id` = $id";

if(!$result = $mysqli->query($sql)){
    die('There was an error running the query [' . $mysqli->error . ']');
}
$row = $result->fetch_assoc();
?>
<form action = "equery.php" method = "POST">
    <input type = "hidden" id = "id" name ="id" value = "<?php echo $row['id'] ?>">
    Name: <input type="text" id = "uname" name="uname" value = "<?php echo $row['display_name'] ?>"></br>
    Average ACT: <input type="text" id = "act_avg" name="act_avg" value = "<?php echo $row['act_avg'] ?>"></br>
    Average SAT: <input type="text" id = "sat_avg" name="sat_avg" value = "<?php echo $row['sat_avg'] ?>"></br>
    Enrollment: <input type="text" id = "enrollment" name="enrollment" value = "<?php echo $row['enrollment'] ?>"></br>
    City: <input type="text" id = "city" name="city" value = "<?php echo $row['city'] ?>"></br>
    Zip Code: <input type="text" id = "zip" name="zip" value = "<?php echo $row['zip'] ?>"></br>
    Acceptance Rate: <input type="text" id = "acceptance_rate" name="acceptance_rate" value = "<?php echo $row['acceptance_rate'] ?>"></br>
    State: <input type="text" id = "state" name="state" value = "<?php echo $row['state'] ?>"></br>
    High School Average GPA: <input type="text" id = "hs_gpa_avg" name="hs_gpa_avg" value = "<?php echo $row['hs_gpa_avg'] ?>"></br>
    Tuition: <input type="text" id = "tuition" name="tuition" value = "<?php echo $row['tuition'] ?>"><br>
    <input type="submit" value="Update">
    
    
    
</form>
