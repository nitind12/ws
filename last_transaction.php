<?php session_id();
   require 'db.php';
   require 'fetchsess.php';

  if ($authen == true) {
      $sql = "select transaction.trn_id, items.item_name,bill.desc_,transaction.amount,transaction.date_,EXTRACT(year FROM transaction.date_)AS _date,EXTRACT(hour FROM transaction.date_)AS hh,EXTRACT(minute FROM transaction.date_)AS mm from transaction join category on category.category_id=transaction.category_id join  items on items.item_id=transaction.item_id join bill on bill.bill_id = transaction.bill_id join monthly_budget on monthly_budget.BID=transaction.BID where transaction.user_name='$userji' ORDER BY transaction.date_ DESC;";
      $query = mysqli_query($con,$sql);
        
      if (mysqli_num_rows($query)>0) {
        $res = array();
        while($row1 = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            array_push($res, $row1);
        }
        $data_['dt']= array('res'=>true, 'record' => $res);
        $data_['cnt'] = mysqli_num_rows($query);
      } else {
        $data_['dt']= array('res'=>false, 'record' => "No Data Found");
        $data_['cnt'] = 0;
      }
  } else {
      $data_['dt']= array('res'=>false, 'record' => "Not Authorized");
      $data_['cnt'] = 0;
  }

    echo json_encode($data_);
?>