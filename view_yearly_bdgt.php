<?php
 
    $viewyear = $_POST['viewyear'];
   
   require 'db.php';

   
  if(/*isset($_POST['row']*/1){
  		$query = mysqli_query($con,"SELECT BID,MONTHLY_BUDGET,month FROM monthly_budget where month ='".date('m')."' order by BID desc limit 0,1");
        $query1 = mysqli_query($con,"SELECT month,MONTHLY_BUDGET,year FROM monthly_budget where year ='$viewyear'  order by BID asc ");
        
  		if (mysqli_num_rows($query)>0) {
            $row1 = mysqli_fetch_all($query);
            $row2 = mysqli_fetch_all($query1);
  			$data_['single'] = array('res'=>true, 'record' => $row1);
            $data_['year_all'] = array('res1'=>true, 'record1' => $row2);
            $data_['curr_year'] = date('Y');
  			echo json_encode($data_);
  		}
  	};
  

?>