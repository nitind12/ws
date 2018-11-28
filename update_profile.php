<?php
  $user = $_POST['username'];
  $pwd = $_POST['password'];
  $name= $_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];

  require 'db.php';
 
    $res = $con->query("UPDATE user SET password = '$pwd'");

    if($res){
      $result = $con->query("UPDATE account SET name = '$name', contact = '$contact', u_email = '$email'"); 
      $bool_ = array('res'=>true, 'record'=>'Update Profile Successfully.');
    }
  }
  
  echo json_encode($bool_);
?>