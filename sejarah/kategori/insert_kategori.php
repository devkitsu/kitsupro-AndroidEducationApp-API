<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

$response = array();
//mendapatkan data
$nm_kategori = $_POST['nm_kategori'];
//cek data
$sql = "SELECT * FROM tb_kategori WHERE nm_kategori = '$nm_kategori'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
  $response["value"] = 0;
  $response["message"]="Data sudah terdaftar!";
  echo json_encode($response);
} else if($nm_kategori==NULL){
    $response["value"] = 0;
    $response["message"]="Harap Pilih Kategori!";
    echo json_encode($response);
}else{
    $sql = "SELECT COUNT(*) FROM tb_kategori";
    $row = mysqli_fetch_array(mysqli_query($con,$sql));
    if($row<3){
        $sql = "INSERT INTO tb_kategori VALUES (NULL,'$nm_kategori')";
        if(mysqli_query($con,$sql)){
            $response["value"] = 1;
            $response["message"]="Data Kategori Sukses Ditambahkan!";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Oops! Coba lagi!";
            echo json_encode($response);
        }
    } else{
        $response["value"] = 0;
        $response["message"]="Data Kategori Sudah Penuh, H arap Hapus atau Ubah Data Lain!";
        echo json_encode($response);
    }
}

mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Data belum diisi!";
  echo json_encode($response);
}
  ?>
