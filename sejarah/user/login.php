<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
  $sql = "SELECT * FROM tb_user WHERE nama='$nama' AND password='$password' ";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_array ($res);
  if (!empty($row)) {
        // admin ditemukan
        $nama = $row['nama'];
        $response["value"] = 1;
        $response["message"] = "Login Berhasil!\nSelamat Datang $nama";
        //$response["uid"] = $row["unique_id"];
        //$response["nama"] = $row["nama"];
        array_push($response, array('id_admin'=>$row[0],'uid'=>$row[1],'nama'=>$row[2],'password'=>$row[3]));
        echo json_encode($response);
        $id = $row['id_user'];
        $nama = $row['nama'];
        $res = mysqli_query($con,$sql);
    } else {
        $response["value"] = 0;
        $response["message"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
    }
}
