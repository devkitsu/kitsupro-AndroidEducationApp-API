<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
    $sql = "SELECT * FROM tb_materi
    INNER JOIN tb_admin ON tb_admin.id_admin = tb_materi.id_admin
    INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_materi.id_kategori ORDER BY id_materi ASC ";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_materi'=>$row[0], 'id_admin'=>$row[1], 'id_kategori'=>$row[2],'nm_materi'=>$row[3],
                                'isi'=>$row[4], 'gambar'=>$row[5], 'tanggal'=>$row[6] ));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
