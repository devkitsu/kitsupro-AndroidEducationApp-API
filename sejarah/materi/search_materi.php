
<?php
require_once('config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM tb_materi
  INNER JOIN tb_admin ON tb_admin.id_admin = tb_kategori.id_kategori
  INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_kategori.id_kategori
  where nm_materi LIKE '%$search%' ORDER BY nm_materi ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('id_materi'=>$row[0], 'nm_materi'=>$row[1],'nm_kategori'=>$row[2],
                                'tanggal'=>$row[3], 'gambar'=>$row[3], 'isi'=>$row[5] ));
    }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
