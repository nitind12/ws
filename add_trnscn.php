<?php

    $sel_event = $_POST['sel_evnt'];
    $sel_cat = $_POST['sel_cat']; 
    $sel_itm = $_POST['sel_item'];
    $trn_desc = $_POST['t_desc'];
    $price = $_POST['price'];

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