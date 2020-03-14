<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
$sql2 ="SELECT * FROM tb_materi";
$res = mysqli_query($con,$sql2);
//mendapatkan data
$id_kategori= $_POST['id_kategori'];
$nm_materi = $_POST['nm_materi'];
$isi = $_POST['isi'];
$tgl=date('Y-m-d');
  $gambar = $_POST['gambar'];
  $image_name = uniqid().".jpg";
  $path = $_SERVER['DOCUMENT_ROOT'] ."/sejarah/materi/img/".$image_name;
  $sql = "INSERT INTO tb_materi VALUES (NULL,'1','$id_kategori','$nm_materi','$isi','$image_name','$tgl')";
      if(mysqli_query($con,$sql)){
        file_put_contents($path, base64_decode($gambar));
        $response["value"] = 1;
        $response["message"]="Data Materi Sukses Ditambahkan!";
        echo json_encode($response);
      } else {
        $response["value"] = 0;
        $response["message"] = "oops! Coba lagi! \n\n Error Karena:\n".mysqli_error($con);
        echo json_encode($response);
      }

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data Belum Diisi! \n\n Error Karena:\n".mysqli_error($con);
  echo json_encode($response);
}
  ?>
