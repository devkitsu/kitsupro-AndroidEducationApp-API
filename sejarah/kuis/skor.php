<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nama = $_POST['nama'];
$skor = $_POST['score'];
$level = $_POST['levelQ'];

//cek data
$sql = "SELECT * FROM tb_user, tb_skor WHERE tb_user.nama = '$nama' AND tb_user.unique_id=tb_skor.unique_id";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
$id = $check['unique_id'];
$sql3 = "UPDATE tb_skor SET skor='$skor' WHERE unique_id='$id' AND level='$level'";
    if(mysqli_query($con,$sql3)){
        $response["value"] = 1;
        $response["message"]="Skor berhasil disimpan!";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);
    }
mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
