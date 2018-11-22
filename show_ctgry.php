 <?php
 	require 'db.php';

  	if(/*isset($_POST['row']*/1){
  		$query = mysqli_query($con,"SELECT category_name FROM category");

  		if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  			echo json_encode($data_);
  		}
  	};
?>