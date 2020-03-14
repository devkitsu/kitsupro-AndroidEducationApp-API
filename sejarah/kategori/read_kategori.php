<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM tb_kategori ORDER BY id_kategori ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_kategori'=>$row[0], 'nm_kategori'=>$row[1]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
