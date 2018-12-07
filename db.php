<?php
date_default_timezone_set('Asia/Kolkata');
  	$servername = "localhost";
  	//$username = "root";
	//$password = "";
	//$db = "daily_exp";

	$username = "teamfree_dproot";
	$password = "dOblbMjcx2e)";
	$db = "teamfree_dexp";

// Create connection
$con = new mysqli($servername, $username, $password, $db);


// Below lines are to test the connection and database
// $sql = "select user_name from sess_id";
// $res = $con->query($sql);
// echo mysqli_num_rows($res);
 
?>