<?php session_start();
    if(isset($_GET['viewyear'])){
        require 'db.php';
        require 'fetchsess.php';
        $viewyear = $_GET['viewyear'];
  		$query = mysqli_query($con,"SELECT BID,MONTHLY_BUDGET,month FROM monthly_budget where month ='".date('m')."' order by BID desc limit 0,1");
        $query1 = mysqli_query($con,"SELECT month,MONTHLY_BUDGET,year FROM monthly_budget where year ='$viewyear'  order by BID asc ");
        
  		if (mysqli_num_rows($query)>0) {
      		    $res1 = array();
      		    $res2 = array();
                while($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                    array_push($res1, $row1);
                }
                while($row2 = mysqli_fetch_array($query1, MYSQLI_ASSOC)){
                    array_push($res2, $row2);
                }

      			$data_['single'] = array('res'=>true, 'record' => $res1);
                $data_['year_all'] = array('res1'=>true, 'record1' => $res2);
        } else {
            $data_['single'] = array('res'=>false, 'record' => 'x');
            $data_['year_all'] = array('res1'=>false, 'record1' => 'x');
        }
  	} else {
  	    $data_['single'] = array('res'=>false, 'record' => 'y');
        $data_['year_all'] = array('res1'=>false, 'record1' => 'y');
  	}
    $data_['curr_year'] = date('Y');
    $data_['curr_month'] = date('m');
  	echo json_encode($data_);
?>