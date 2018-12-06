<?php
 
  $bgt_amount = $_GET['budgetamount'];
  $sid = $_COOKIE['session_id'];
  
  require 'db.php';
  require 'fetchsess.php';
  
  $published_date=date("Y-m-d");
  $month = date('m', strtotime($published_date));
  $year = date('Y', strtotime($published_date));

  if($authen == true){
  $query=mysqli_query($con,"SELECT month from monthly_budget where month='$month' AND year='$year' ");
  $row=mysqli_fetch_all($query);

 
  if(mysqli_num_rows($query)!=0)
  {
    $bool_ = array('res'=>false, 'record'=>'Budget Has Been Already Added This month');
    echo json_encode($bool_);
  }

 else
   {

    $res = $con->query("INSERT INTO monthly_budget (MONTHLY_BUDGET,month,year,USERNAME,BGT_DATE,STATUS)
    values('$bgt_amount','$month','$year','$userji','$published_date','1')");
    
    
     $query=mysqli_query($con,"SELECT BID from monthly_budget where month='$month'");
    $row=mysqli_fetch_array($query);

    $bid1 =$row['BID'];

    $res1 = $con->query("INSERT INTO monthly_budget_detail (BUDGET_AMOUNT,BID,DOBGT,USERNAME,STATUS)
             values('$bgt_amount','$bid1','$published_date','$userji','1')");
      
   
     
    if($res){
        
     $bool_ = array('res'=>true, 'record'=>'Budget Added Successfully');
     echo json_encode($bool_);
        
    }
    else{
        
     $bool_ = array('res'=>false, 'record'=>'Failed Please Try Again');
     echo json_encode($bool_); 
    }
  
  }
  
  }else{

    echo json_encode('Not Authorised User');
  }
  
?>