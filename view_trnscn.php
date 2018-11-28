<?php
	
	$month = $_POST['month'];
	$year = $_POST['year'];

 	require 'db.php';

 		$month= $con->query("SELECT date_ FROM transaction");

  		echo $query = mysqli_query($con,"SELECT * from `bill`,`transaction`,`category`,`items` where bill.bill_id=transaction.bill_id AND category.category_id=transaction.category_id AND items.item_id=transaction.item_id ORDER BY transaction.date_ DESC");

  		if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  			echo json_encode($data_);
  		}
?>