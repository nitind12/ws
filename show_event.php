<?php
 	require 'db.php';
  		$query = mysqli_query($con,"SELECT event_id,event_name FROM event");

  		if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  			echo json_encode($data_);
  		}
?>