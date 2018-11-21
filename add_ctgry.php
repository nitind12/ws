<?php
 
  $cat_name = $_POST['catname'];
  $cat_desc = $_POST['catdesc'];

  require 'db.php';

  $query=mysqli_query($con,"SELECT * from category where category_name='$cat_name'");
  $row=mysqli_fetch_assoc($query);
 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>'false', 'record'=>'category already exist.');
    echo json_encode($bool_);
  }
  else {
    $res = $con->query("INSERT INTO category (`category_name`,`desc_`)
    values
    ('$cat_name','$cat_desc')");
    if($res){
     echo json_encode('success'); 
    }
    else{
     echo json_encode('error in inserting'); 
    }
  
  }
  
?>