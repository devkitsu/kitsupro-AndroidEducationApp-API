<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$title = $_POST['nama'];
$gambar = $_POST['gambar'];
$file = $title.".jpg";
$path = $_SERVER['DOCUMENT_ROOT'] ."/sejarah/tebak_gambar/img/$title.jpg";
//cek data
$sql = "SELECT * FROM tb_tebakgambar WHERE gambar = '$title'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else {
  $sql = "INSERT INTO tb_tebakgambar VALUES (NULL,'1','$file','$title')";
  if(mysqli_query($con,$sql)){
    file_put_contents($path, base64_decode($gambar));
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
