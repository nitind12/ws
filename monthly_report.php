<?php session_id();
 
   require 'db.php';
  require 'fetchsess.php';

  if ($authen == true) { 
  if(isset($_GET['row'])){
        $sql = "SELECT category.category_name,items.item_name,bill.desc_,transaction.amount,transaction.date_,EXTRACT(year FROM transaction.date_)AS _date FROM transaction join category on category.category_id=transaction.category_id join items on items.item_id=transaction.item_id join bill on bill.bill_id = transaction.bill_id join monthly_budget on monthly_budget.BID=transaction.BID where transaction.user_name = '$userji'";
  		$query = mysqli_query($con,$sql);

  		if (mysqli_num_rows($query)>0) {
  		    $res = array();
            while($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                array_push($res, $row1);
            }
  			$data_['trans']= array('res'=>true, 'record' => $res);
            $data_['curr_year'] = date('Y');
  		} else {
  		    $data_['trans']= array('res'=>false, 'record' => 'x');
            $data_['curr_year'] = date('Y');
  		}
  	} else {
  	    $data_['trans']= array('res'=>false, 'record' => 'y');
        $data_['curr_year'] = date('Y');
  	}
  } else {
      $data_['trans']= array('res'=>false, 'record' => 'z');
        $data_['curr_year'] = date('Y');
  }
  
  echo json_encode($data_);
?>