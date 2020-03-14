<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM tb_user ORDER BY nama ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('uid'=>$row[1], 'nama'=>$row[2]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
