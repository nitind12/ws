<?php
  $user = $_GET['username'];
  $pwd = $_GET['password'];
  $name= $_GET['name'];
  $contact=$_GET['contact'];
  $email=$_GET['email'];

  require 'db.php';

  $query=mysqli_query($con,"SELECT * from user where user_name='$user' and password='$pwd'");
  $row=mysqli_fetch_assoc($query);
 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>false, 'record'=>'username already exist.');
  }
  else {
    $res = $con->query("INSERT INTO user(user_name,password,upline)
    values
    ('$user','$pwd','$user')");

    if($res){
      $result = $con->query("INSERT INTO account(name,contact,u_email,user_name) 
      VALUES 
      ('$name','$contact','$email','$user')");
      $bool_ = array('res'=>true, 'record'=>'Registered Successfully.');
    }
  }
  
  echo json_encode($bool_);
?>