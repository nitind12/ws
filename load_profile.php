<?php session_id();
  
  require 'db.php';
  require 'fetchsess.php';

  if ($authen == true) {
      $sql = "SELECT * FROM account WHERE user_name='$userji'";
      $query = mysqli_query($con,$sql);

      if(mysqli_num_rows($query)>0) {
        $row1 = mysqli_fetch_array($query,MYSQLI_ASSOC);
        $data_ = array('res'=>true, 'record' => $row1);
      } else {
            $data_= array('res'=>false, 'record' => "No Data Found");
          }
    } else {
      $data_ = array('res'=>false, 'record' => "Not Authorized");
    }

    echo json_encode($data_);
?>