<? session_id();
	
	require 'db.php';
	require 'fetchsess.php';

 	if ($authen == true) {
  		$query = mysqli_query($con,"SELECT event.event_name,category.category_name,items.item_name,transaction.amount,bill.desc_ FROM event,category,items,bill,transaction WHERE event.event_id=bill.event_id AND category.category_id=transaction.category_id AND items.item_id=transaction.item_id AND transaction.user_name='$userji'");

  		if(mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
  			$data_ = array('res'=>true, 'record' => $row1);
  			echo json_encode($data_);
  		}
  	}
?>