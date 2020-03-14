<?php
require_once('config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
$response = array();
//mendapatkan data
$id = $_POST['id_skor'];
  $sql = "SELECT * FROM tb_skor ORDER BY skor DESC LIMIT 10";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_skor'=>$row[0], 'skor'=>$row[1], 'nama'=>$row[2]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
