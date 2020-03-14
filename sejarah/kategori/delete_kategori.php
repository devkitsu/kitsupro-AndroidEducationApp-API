<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $response = array();
  //mendapatkan data
  $id = $_POST['id_kategori'];
  $sql = "DELETE FROM tb_kategori WHERE id_kategori = '$id'";
  $msg=mysqli_error($con);
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Data Kategori Berhasil Dihapus";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "Oops! Gagal dihapus! \n\n Error Karena:\n".mysqli_error($con);
    echo json_encode($response);
  }
  mysqli_close($con);
}
