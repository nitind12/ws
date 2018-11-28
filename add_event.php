<?php
 
  $event_name = $_POST['event'];
  $event_desc = $_POST['eventdesc'];

  require 'db.php';

  $query=mysqli_query($con,"SELECT * from event where event_name='$cat_name'");
  $row=mysqli_fetch_assoc($query);
 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>'false', 'record'=>'event already exist.');
    echo json_encode($bool_);
  }
  else {
    $res = $con->query("INSERT INTO event (`event_name`,`desc_`,`user_name`)
    values
    ('$event_name','$event_desc','kamal')");
    if($res){
     echo json_encode('Added Successfully'); 
    }
    else{
     echo json_encode('error in inserting'); 
    }
  
  }
  
?>