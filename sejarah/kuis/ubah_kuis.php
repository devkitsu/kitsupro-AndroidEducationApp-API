<?php
require_once('../config/koneksi.php');

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();
  //mendapatkan data
  $id_kuis = $_POST['id_kuis'];
  $soal = $_POST['soal'];
  $jawaban = $_POST['jawaban'];
  $A = $_POST['optA'];
  $B = $_POST['optB'];
  $C = $_POST['optC'];
  $D = $_POST['optD'];

  $sql = "UPDATE tb_kuis SET pertanyaan='$soal', jawaban='$jawaban',
            jawaban1='$A', jawaban2='$B', jawaban3='$C', jawaban4='$D' WHERE id_kuis = '$id_kuis'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Berhasil diperbarui";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "oops! Gagal merubah!";
    echo json_encode($response);
  }
  mysqli_close($con);
}
