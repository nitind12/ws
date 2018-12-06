<?php
 
    $updatedamount = $_POST['updatedamount'];
    $bid= $_POST['bid'];
  
   require 'db.php';

  
   $published_date=date("Y-m-d");

   $query=mysqli_query($con,"SELECT MONTHLY_BUDGET from monthly_budget where BID='$bid' ");
   
   $row=mysqli_fetch_array($query);

   $MONTHLY_BUDGET =  $row['MONTHLY_BUDGET'];

   $updatedamount1= $updatedamount+$MONTHLY_BUDGET;

 
 
   $sql1=mysqli_query($con,"UPDATE monthly_budget SET  MONTHLY_BUDGET='$updatedamount1' WHERE BID='$bid' ");

     if($sql1){
      
      $res = $con->query("INSERT INTO monthly_budget_detail (BUDGET_AMOUNT,BID,DOBGT,USERNAME,STATUS)
             values('$updatedamount','$bid','$published_date','kamal','1')");
      
      
      $bool_ = array('res'=>true, 'record'=>'Budget Updated Successfully');
      echo json_encode($bool_);
                
      
              }

?>