 <?php session_id();

 	require 'db.php';
 	require 'fetchsess.php';

 	if ($authen == true) {
  	$query = mysqli_query($con,"SELECT category_id,category_name FROM category WHERE user_name='$userji'");
	
	if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  			echo json_encode($data_);
  		}
  	}
?>