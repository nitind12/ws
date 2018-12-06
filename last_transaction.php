<?php session_id();
 
   
   require 'db.php';
   require 'fetchsess.php';

  if ($authen == true) {

    
  if(/*isset($_POST['row']*/1){
      $query = mysqli_query($con,"SELECT items.item_name,bill.desc_,transaction.amount,transaction.date_,EXTRACT(year FROM transaction.date_)AS _date,EXTRACT(hour FROM transaction.date_)AS hh,EXTRACT(minute FROM transaction.date_)AS mm FROM `TRANSACTION`,`category`,`items`, `bill`,`monthly_budget` WHERE category.category_id=transaction.category_id AND bill.bill_id = transaction.bill_id AND items.item_id=transaction.item_id AND monthly_budget.BID=transaction.BID AND transaction.user_name='$userji' ORDER BY transaction.date_ DESC");
        
        
      if (mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_all($query);
        $data_= array('res'=>true, 'record' => $row1);
        echo json_encode($data_);
      }
    };
  }

?>