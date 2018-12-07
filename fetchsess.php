<?php
if(!isset($_SESSION)){
    session_start();
}
  // Fetch user for to fetch and insert authenticated data
  $sid = $_COOKIE['PHPSESSID'];
  $sql = "select user_name from sess_id where sessid = '$sid' and status=1";
  $res = $con->query($sql);

  if(mysqli_num_rows($res) != 0){
  	$row = mysqli_fetch_assoc($res);
  	$authen = true;
  	$userji = $row['user_name'];
  } else {
  	$authen = false;
  	$userji = "NA";
  }
  // -----------------------------------------------------