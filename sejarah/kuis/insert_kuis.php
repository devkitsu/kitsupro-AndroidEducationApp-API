<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$soal = $_POST['soal'];
$jawaban = $_POST['jawaban'];
$A = $_POST['optA'];
$B = $_POST['optB'];
$C = $_POST['optC'];
$D = $_POST['optD'];
$id_kat = $_POST['id_kategori'];
$level = $_POST['level'];

//cek data
$sql = "SELECT * FROM tb_kuis WHERE pertanyaan = '$soal'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO tb_kuis VALUES (NULL,'1','$id_kat','$soal','$jawaban','$A','$B','$C','$D','$level')";
  if(mysqli_query($con,$sql)){
    $response["value"] = 1;
    $response["message"]="Data sukses ditambahkan!";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Coba lagi!";
    echo json_encode($response);
  }
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! ";
  echo json_encode($response);
}
  ?>
