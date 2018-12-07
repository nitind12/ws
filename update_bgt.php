<?php session_start();
 
    $updatedamount = $_GET['updatedamount'];
    $month = date('m', strtotime($published_date));
    $year = date('Y', strtotime($published_date));
    $bid= $_GET['bid'];
    
    require 'db.php';
    require 'fetchsess.php';

    if($authen == true){
        $published_date=date("Y-m-d");
        $query=mysqli_query($con,"SELECT MONTHLY_BUDGET from monthly_budget where BID='$bid'");
        $row=mysqli_fetch_array($query);
        
        $MONTHLY_BUDGET =  $row['MONTHLY_BUDGET'];
        
        $updatedamount1= $MONTHLY_BUDGET+$updatedamount;

        $sql1=mysqli_query($con,"UPDATE monthly_budget SET  MONTHLY_BUDGET='$updatedamount1' WHERE BID='$bid' ");
        if($sql1){
            $res = $con->query("INSERT INTO monthly_budget_detail (BUDGET_AMOUNT,month, year, BID,DOBGT,USERNAME,STATUS) values('$updatedamount','$year','$month', $bid','$published_date','$userji','1')");
            $bool_ = array('res'=>true, 'record'=>'Budget Updated Successfully');
        } else {
            $bool_ = array('res'=>false, 'record'=>'Some Error! Please try again.');
        }
    }else{
        $bool_ = array('res'=>false, 'record'=>'Not Authorised User');
    }
    
    echo json_encode($bool_);
?>