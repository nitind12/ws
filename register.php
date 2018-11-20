<?php
  $user = $_POST['username'];
  $pwd = $_POST['password'];
  $name= $_POST['name'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];

  require 'db.php';

  $query=mysqli_query($con,"SELECT * from user where user_name='$user' and password='$pwd'");
  $row=mysqli_fetch_assoc($query);
 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>false, 'record'=>'username already exist.');
  }
  else {
    $res = $con->query("INSERT INTO user(user_name,password)
    values
    ('$user','$pwd')");

    if($res){
      $result = $con->query("INSERT INTO account(name,contact,u_email,user_name) 
      VALUES 
      ('$name','$contact','$email','$user')");
      $bool_ = array('res'=>true, 'record'=>'Resistered Successfully.');
    }
  }
  
  echo json_encode($bool_);
?>