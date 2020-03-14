<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT tb_user.nama, tb_skor.skor, tb_skor.level FROM tb_skor, tb_user WHERE tb_user.unique_id = tb_skor.unique_id
        ORDER BY tb_skor.skor DESC, tb_skor.level ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('nama'=>$row[0], 'skor'=>$row[1], 'level'=>$row[2]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
