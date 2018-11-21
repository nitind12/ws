 <?php
 echo "hello"; die();
 	require 'db.php';

  	if(isset($_POST['row'])){
  		$query = mysqli_query($con,"SELECT category_name FROM category");
  		if (mysqli_num_rows($query)>0) {
  			$row1 = mysqli_fetch_assoc($query);
  			$row2[] = array("cat_name" => $row1['category_name']);
  			$row3 = $row2;
  			header('content-type: application/json');
  			echo json_encode($row3);
  		}
  	};
?>