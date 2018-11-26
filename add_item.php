<?php
 
  $item_name = $_POST['item'];
  require 'db.php';

  $query=mysqli_query($con,"SELECT * from items where item_name='$item_name'");
  $row=mysqli_fetch_assoc($query);
 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>'false', 'record'=>'item already exist.');
    echo json_encode($bool_);
  }
  else {
    $res = $con->query("INSERT INTO items (`item_name`,`user_name`)
    values
    ('$item_name','kamal')");
    if($res){
     echo json_encode('Added Successfully'); 
    }
    else{
     echo json_encode('error in inserting'); 
    }
  
  }
  
?>