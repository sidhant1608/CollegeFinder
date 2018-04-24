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
$data['cols'] = array(
    array('label' => 'Name', 'type' => 'string'),
    array('label' => "$attribute", 'type' => 'number')

);
$rows = array();
if($attribute == "hs_gpa_avg") {
while($r = $result->fetch_assoc()){
    $temp = array();
    $temp[] = array('v' => (string) $r['display_name']);
    $temp[] = array('v' => (float) $r['hs_gpa_avg']);
    $rows[] = array('c' => $temp);
} 
}
else if($attribute == "sat_avg") {
while($r = $result->fetch_assoc()){
    $temp = array();
    $temp[] = array('v' => (string) $r['display_name']);
    $temp[] = array('v' => (float) $r['sat_avg']);
    $rows[] = array('c' => $temp);
} 
} 
else if($attribute == "act_avg") {
while($r = $result->fetch_assoc()){
    $temp = array();
    $temp[] = array('v' => (string) $r['display_name']);
    $temp[] = array('v' => (float) $r['act_avg']);
    $rows[] = array('c' => $temp);
} 
} 
else if($attribute == "tuition") {
while($r = $result->fetch_assoc()){
    $temp = array();
    $temp[] = array('v' => (string) $r['display_name']);
    $temp[] = array('v' => (float) $r['tuition']);
    $rows[] = array('c' => $temp);
} 
} 
$data['rows'] = $rows;
$jsonTable = json_encode($data);
//echo $jsonTable;
?>
<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Graph',
          is3D: 'true',
          width: 800,
          height: 2500,
          explorer: { axis: 'vertical' }
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
