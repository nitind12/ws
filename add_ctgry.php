<?php
 
  $cat_name = $_GET['catname'];
  $cat_desc = $_GET['catdesc'];
  $sid = $_COOKIE['session_id'];

  require 'db.php';
  require 'fetchsess.php';

  if($authen == true){
    $query=mysqli_query($con,"SELECT * from category where category_name='$cat_name' AND user_name = '$userji'");
    $row=mysqli_fetch_assoc($query);
   
    if(mysqli_num_rows($query)!=0)
    {
      $bool_ = array('res'=>'false', 'record'=>'category already exist.');
      echo json_encode($bool_);
    }
    else {
      $res = $con->query("INSERT INTO category (`category_name`,`desc_`,`user_name`)
      values
      ('$cat_name','$cat_desc','$userji')");
      if($res){
       echo json_encode('Added Successfully'); 
      }
      else{
       echo json_encode('error in inserting'); 
      }
    }
  } else {
    echo json_encode('Not Authorized');
  }
  
?>