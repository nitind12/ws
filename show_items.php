 <?php session_id();
 	require 'db.php';
 	require 'fetchsess.php';

 	if ($authen == true) {
  		$query = mysqli_query($con,"SELECT item_id,item_name FROM items WHERE user_name = '$userji'");

  		if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_array($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  		} else {
  		    $data_ = array('res'=>false, 'record'=>'No data found.');    
  		}
  	} else {
  	    $data_ = array('res'=>false, 'record'=>'Not Authorized');
  	}
  	
  	echo json_encode($data_);
?>