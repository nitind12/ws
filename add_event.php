<?php
 
  $event_name = $_POST['event'];
  $event_desc = $_POST['eventdesc'];
  $sid = $_COOKIE['session_id'];

  require 'db.php';
  require 'fetchsess.php';

  if($authen == true){
    $query=mysqli_query($con,"SELECT * from event where event_name='$event_name' AND user_name = '$userji'");
    
    $row=mysqli_fetch_assoc($query);
   
    if(mysqli_num_rows($query)!=0)
    {
      $bool_ = array('res'=>'false', 'record'=>'event already exist.');
      echo json_encode($bool_);
    }
    else {
      $res = $con->query("INSERT INTO event (`event_name`,`desc_`,`user_name`)
      values
      ('$event_name','$event_desc','$userji')");
      if($res){
       echo json_encode('Added Successfully'); 
      }
      else{
       echo json_encode('error in inserting'); 
      }
    
    }
  }else{
    echo json_encode('Not Authorized');
  }
  
?>