<?php session_start();
	$user = $_POST['username'];
	$pwd = $_POST['password'];
	
	require 'db.php';

	$query=mysqli_query($con,"SELECT * from user where user_name='$user' and password='$pwd'");
	$row=mysqli_fetch_assoc($query);
 
	if(mysqli_num_rows($query) != 0){
		$sid = session_id();
		setcookie("session_id", $sid,time() - 100);
		setcookie("session_id", $sid,time() + (86400*10));
		$query1=mysqli_query($con,"SELECT * FROM  `sess_id` WHERE user_name = '$user'");
		if(mysqli_num_rows($query1) != 0){
			$query =mysqli_query($con,"UPDATE `sess_id` SET `status` = 0 WHERE `user_name` = '$user'");
			$query = "INSERT INTO `sess_id`(`user_name`, `sessid`, `date_`, `status`) VALUES ('$user', '$sid', '".date('Y-m-d h:i:s')."',1)";
			$con->query($query);
			$bool_ = array('res'=>true, 'record'=>'x');
		}else{
			$query = "INSERT INTO `sess_id`(`user_name`, `sessid`, `date_`, `status`) VALUES ('$user', '$sid', '".date('Y-m-d h:i:s')."',1)";
			$con->query($query);
			$bool_ = array('res'=>true, 'record'=>'y');
		}
	
	}else {
		$bool_ = array('res'=>false, 'record'=>'X: Credentials not correct');
	}

	 echo json_encode($bool_);
?>