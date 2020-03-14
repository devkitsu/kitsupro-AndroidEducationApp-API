<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM tb_tebakgambar ORDER BY id_tebakgambar ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_tebakgambar'=>$row[0], 'id_admin'=>$row[1], 'gambar'=>$row[2], 'nama'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}

//    $url = str_replace("\\","",$row['gambar']);
