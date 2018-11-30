<?php
  $pwd = $_POST['password'];
  $name= $_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $sid = $_COOKIE['session_id'];

  $file = $_FILES['pic'];
  $pic = $file['name'];
  $picp = $file['tmp_name'];
    
  $path=$_SERVER['DOCUMENT_ROOT']."/ws/user_pic/".$pic;
  $bool_ = false;
  move_uploaded_file($picp, $path);

  require 'db.php';
  require 'fetchsess.php';

    if($authen == true){
 
      $res = $con->query("UPDATE user SET password = '$pwd' WHERE user_name='$userji'");

      if($res){
        $result = $con->query("UPDATE account SET name = '$name', contact = '$contact', u_email = '$email', user_pic = '$pic' WHERE user_name='$userji'"); 
        $bool_ = array('res'=>true, 'record'=>'Update Profile Successfully.');
      }
      echo json_encode($bool_);
    }else{
      echo json_encode('Not Autherized');
    }
?>