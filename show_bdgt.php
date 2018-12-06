 <?php
 	require 'db.php';

  	if(/*isset($_POST['row']*/1){
  		$query = mysqli_query($con,"SELECT BID,MONTHLY_BUDGET,month FROM monthly_budget where month ='".date('m')."' order by BID desc limit 0,1");
        $query1 = mysqli_query($con,"SELECT month,MONTHLY_BUDGET FROM monthly_budget where year ='".date('Y')."'  order by BID asc ");
        

  		if (mysqli_num_rows($query)>0) {
            $row1 = mysqli_fetch_all($query);
            $row2 = mysqli_fetch_all($query1);
  			$data_['single'] = array('res'=>true, 'record' => $row1);
            $data_['year_all'] = array('res1'=>true, 'record1' => $row2);
            
  			echo json_encode($data_);
  		}
  	};
?>