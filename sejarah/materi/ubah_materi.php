<?php
require_once('../config/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_materi= $_POST['id_materi'];
  $id_kategori= $_POST['id_kategori'];
  $nm_materi = $_POST['nm_materi'];
  $isi = $_POST['isi'];
  $tgl=date('Y-m-d');

  $sql = "UPDATE tb_materi SET nm_materi= '$nm_materi', id_kategori='$id_kategori',
            isi='$isi', tanggal='$tgl' WHERE id_materi = '$id_materi'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Data Materi Berhasil diperbarui";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal merubah!";
    echo json_encode($response);
  }
  mysqli_close($con);
}
