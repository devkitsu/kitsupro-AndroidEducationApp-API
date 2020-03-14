<?php
require_once('../config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$response = array();
//mendapatkan data
$nama = $_POST['nama'];
$password = md5($_POST['password']);
$uid = uniqid('', true);
//cek data
$sql = "SELECT * FROM tb_user WHERE nama ='$nama'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(empty($check)){
        $sql2 = "INSERT INTO tb_user VALUES ('','$uid','$nama','$password');";
        $sql2.= "INSERT INTO tb_skor (id_skor, unique_id, skor, level)
                values('','$uid','0','1'),('','$uid','0','2'),('','$uid','0','3') ";
        $query_result2 = mysqli_multi_query($con,$sql2);
        if($query_result2){
            $response["value"] = 1;
            $response["message"]="Berhasil Registrasi! \nSilahkan Login";
            echo json_encode($response);
        } else {
            $response["value"] = 0;
            $response["message"] = "Tidak bisa daftar. \nSudah terdaftar!";
            echo json_encode($response);
        }
    } else {
        $response["value"] = 0;
        $response["message"]="Tidak bisa daftar. \nSudah terdaftar!";
        echo json_encode($response);
    }
mysqli_close($con);
}
  ?>
