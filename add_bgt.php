<?php session_start();
 
  $bgt_amount = $_GET['budgetamount'];

  $published_date=date("d-m-Y");
  $month = date('m', strtotime($published_date));
  $year = date('Y', strtotime($published_date));
  
  require 'db.php';
  require 'fetchsess.php';

  if($authen == true) {
    $query=mysqli_query($con,"SELECT month from monthly_budget where month='$month' AND year='$year' ");
    $row=mysqli_fetch_array($query);

    if(mysqli_num_rows($query)!=0) {
        $bool_ = array('res'=>false, 'record'=>'Budget Has Been Already Added This month');
    } else {
        $res = $con->query("INSERT INTO monthly_budget (MONTHLY_BUDGET,month,year,USERNAME,BGT_DATE,STATUS) values('$bgt_amount','$month','$year','$userji','$published_date','1')");
        $bid = $con->insert_id;
        $res1 = $con->query("INSERT INTO monthly_budget_detail (BUDGET_AMOUNT,month,year,DOBGT,USERNAME,STATUS,BID) values('$bgt_amount','$month','$year','$published_date','$userji','1', '$bid')");
        if($res){
            $bool_ = array('res'=>true, 'record'=>'Budget Added Successfully');
        } else {
            $bool_ = array('res'=>false, 'record'=>'Failed Please Try Again');
        }
    }
  }else{
      $bool_ = array('res'=>false, 'record'=>'Not Authorised User');
  }
  echo json_encode($bool_);
?>