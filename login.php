<?php session_start();
	$user = $_GET['username'];
	$pwd = $_GET['password'];
	
	require 'db.php';
    $seql = "SELECT user.*, user_type.usrtype as ustatus  from user join user_type on user_type.usrtype_id=user.usrtype_id where user_name='$user' and password='$pwd'";
	$query=mysqli_query($con,$seql);
	$row=mysqli_fetch_assoc($query);
 
	if(mysqli_num_rows($query) != 0){
		$sid = session_id();
		//setcookie("session_id", 'X',time() - 100);
		//setcookie("PHPSESSID", 'X',time() - 100);
		//setcookie("session_id", $sid,time() + (86400*10));
		$query1=mysqli_query($con,"SELECT * FROM  `sess_id` WHERE user_name = '$user'");
		if(mysqli_num_rows($query1) != 0){
			$query = mysqli_query($con,"UPDATE `sess_id` SET `status` = 0 WHERE `user_name` = '$user'");
			$query = "INSERT INTO `sess_id`(`user_name`, `sessid`, `date_`, `status`) VALUES ('$user', '$sid', '".date('Y-m-d h:i:s')."',1)";
			$con->query($query);
			$bool_ = array('res'=>true, 'record'=>'x', 'sessid'=>$sid, 'user'=>$user, 'status'=>$row["ustatus"]);
		}else{
			$query = "INSERT INTO `sess_id`(`user_name`, `sessid`, `date_`, `status`) VALUES ('$user', '$sid', '".date('Y-m-d h:i:s')."',1)";
			$con->query($query);
			$bool_ = array('res'=>true, 'record'=>'y', 'sessid'=>$sid, 'user'=>$user, 'status'=>$row["ustatus"]);
		}
	}else {
		$bool_ = array('res'=>false, 'record'=>'X: Credentials not correct', 'sessid'=>'NA', 'user'=>'NA', 'status'=>'NA');
	}

	echo json_encode($bool_);
?>