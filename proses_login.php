<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

//koneksi db
$koneksi = mysqli_connect("localhost", "root", "", "rent_car");
$sql = "select * from karyawan where username ='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0){
    //jika jumlah datanya = 0 berarti user/pass salah
    header("location:login.php");
} else {
    // buat variabel session
    $_SESSION["session_karyawan"] = mysqli_fetch_array($result);
    header("location:template.php");
}

if (isset($_GET["logout"])){
    //hapus session
    session_destroy();
    header("location:login.php");
}
 ?>