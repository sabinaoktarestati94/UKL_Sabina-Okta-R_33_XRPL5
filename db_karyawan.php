<?php
session_start();
  $koneksi = mysqli_connect("localhost", "root", "", "rent_car");

  if (isset($_POST["action"])) {
    $id_karyawan=$_POST["id_karyawan"];
    $nama_karyawan=$_POST["nama_karyawan"];
    $alamat_karyawan=$_POST["alamat_karyawan"];
    $kontak=$_POST["kontak"];
    $username=$_POST["username"];
    $password=$_POST["password"];

    if ($_POST["action"]=="insert") {
      $sql ="insert into karyawan values('$id_karyawan','$nama_karyawan','$alamat_karyawan','$kontak','$username', '$password')";

      if (mysqli_query($koneksi,$sql)) {
        // jika query berhasil
        $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data has been inserted"
        );
      }
      else{
        //jika query gagal
        $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
        );
      }
      header("location:template.php?page=karyawan");
    }
    elseif ($_POST["action"]=="update") {
      $sql="update karyawan set nama_karyawan='$nama_karyawan', alamat_karyawan='$alamat_karyawan', kontak='$kontak', username='$username', password='$password'  where id_karyawan='$id_karyawan'";
      if (mysqli_query($koneksi,$sql)) {
        //buat pesan sukses
        $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data has been updated"
        );
      }
      else{
        //jika query gagal
        $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
        );
      }
 }
 header("location:template.php?page=karyawan");
  }

  if (isset($_GET["hapus"])) {
    $id_karyawan = $_GET["id_karyawan"];
    $sql = "select * from karyawan where id_karyawan='$id_karyawan'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    $sql = "delete from karyawan where id_karyawan='$id_karyawan'";
    if (mysqli_query($koneksi,$sql)) {
      // jika query sukses
      $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data has been deleted"
      );
    }
    else{
      //jika query gagal
      $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=karyawan");
  }
 ?>
