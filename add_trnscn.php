<?php

    $sel_event = $_GET['sel_evnt'];
    $sel_cat = $_GET['sel_cat']; 
    $sel_itm = $_GET['sel_item'];
    $trn_desc = $_GET['t_desc'];
    $price = $_GET['price'];

    $file = $_FILES['bill'];
    $pic = $file['name'];
    $picp = $file['tmp_name'];
    
    $path=$_SERVER['DOCUMENT_ROOT']."/ws/bill_pic/".$pic;
    $bool_ = false;
    move_uploaded_file($picp, $path);
    $sid = $_COOKIE['session_id'];

    require 'db.php';
    require 'fetchsess.php';

    if ($authen == true) {
      $sql = "INSERT INTO bill(event_id,user_name,bill_image,desc_)
      values
      ($sel_event,'$userji','$pic','$trn_desc')";
      $res = $con->query($sql);

      echo $sql1 = "INSERT INTO transaction(category_id,item_id,bill_id,amount,user_name,BGTID) 
        VALUES 
        ($sel_cat,$sel_itm,1,$price,'$userji',1)";

      if($res){
        $result = $con->query($sql1);
        $bool_ = array('res'=>true, 'record'=>'Insert Successfully.');
      }
    }
  echo json_encode($bool_);
?>