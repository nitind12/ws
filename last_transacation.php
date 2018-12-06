<?php
 
   
   require 'db.php';


    
  if(/*isset($_POST['row']*/1){
      $query = mysqli_query($con,"SELECT category.category_name,items.item_name,bill.desc_,transaction.amount,transaction.date_,EXTRACT(year FROM transaction.date_)AS _date FROM `TRANSACTION`,`category`,`items`, `bill`,`monthly_budget` WHERE category.category_id=transaction.category_id AND bill.bill_id = transaction.bill_id AND items.item_id=transaction.item_id AND monthly_budget.BID=transaction.BID ");
        
        
      if (mysqli_num_rows($query)>0) {
            $row1 = mysqli_fetch_all($query);
        $data_['trans']= array('res'=>true, 'record' => $row1);
            $data_['curr_year'] = date('Y');
        echo json_encode($data_);
      }
    };



?>