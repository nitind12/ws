 <?php session_id();

 	require 'db.php';
 	require 'fetchsess.php';

 	if ($authen == true) {
  	    $query = mysqli_query($con,"SELECT category_id,category_name FROM category WHERE user_name='$userji'");
	
	    if (mysqli_num_rows($query)>0) {
            $row1 = mysqli_fetch_array($query, MYSQLI_ASSOC);
        //$row1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
  			$data_['dt'] = array('res'=>true, 'record' => $row1);
  			$data_['cnt'] = mysqli_num_rows($query);
  		} else {
            $data_['dt']= array('res'=>false, 'record' => "No Data Found");
            $data_['cnt'] = 0;
          }
    } else {
      $data_['dt']= array('res'=>false, 'record' => "Not Authorized");
      $data_['cnt'] = 0;
    }

    echo json_encode($data_);
?>