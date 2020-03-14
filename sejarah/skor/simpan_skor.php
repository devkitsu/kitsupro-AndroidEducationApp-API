<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$id = $_POST['id_skor'];
$skor = $_POST['skor'];
//cek data
require_once('config/koneksi.php');
$sql = "SELECT * FROM tb_skor WHERE id_skor = '$id'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
    $sql = "UPDATE tb_skor SET skor = '$skor' WHERE id_skor ='$id' ";
    if(mysqli_query($con,$sql)){
        $response["value"] = 1;
        $response["message"]="Data Skor Sudah Diupdate";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Oops! Coba lagi! ".mysqli_error($con);
        echo json_encode($response);
    }
} else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!  ".mysqli_error($con);
    echo json_encode($response);
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
