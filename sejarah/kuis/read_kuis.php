<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
    $levelQ = $_POST['levelQ'];
  $sql = "SELECT * FROM tb_kuis
  INNER JOIN tb_admin ON tb_admin.id_admin = tb_kuis.id_admin
  INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_kuis.id_kategori
  WHERE tb_kuis.level='$levelQ' ORDER BY RAND()";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_kuis'=>$row[0], 'id_admin'=>$row[1], 'id_kategori'=>$row[2], 'pertanyaan'=>$row[3]
                                ,'jawaban'=>$row[4], 'jawaban1'=>$row[5], 'jawaban2'=>$row[6], 'jawaban3'=>$row[7],
                                'jawaban4'=>$row[8],'level'=>$row[9]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
