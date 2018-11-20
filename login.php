<?php
	$user = $_POST['username'];
	$pwd = $_POST['password'];
	
	require 'db.php';

	$query=mysqli_query($con,"SELECT * from user where user_name='$user' and password='$pwd'");
	$row=mysqli_fetch_assoc($query);
 
	if(mysqli_num_rows($query) != 0){
		$bool_ = array('res'=>true, 'record'=>$row);
	}
	else {
		$bool_ = array('res'=>false, 'record'=>'X: Credentials not correct');
	}

	echo json_encode($bool_);
?>