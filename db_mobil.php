<?php
session_start();
  $koneksi = mysqli_connect("localhost", "root", "", "rent_car");

  if (isset($_POST["action"])) {
    $id_mobil=$_POST["id_mobil"];
    $nomor_mobil=$_POST["nomor_mobil"];
    $merk=$_POST["merk"];
    $jenis=$_POST["jenis"];
    $warna=$_POST["warna"];
    $tahun_pembuatan=$_POST["tahun_pembuatan"];
    $biaya_sewa_per_hari=$_POST["biaya_sewa_per_hari"];
    


    if ($_POST["action"]=="insert") {
      $sql ="insert into mobil values('$id_mobil','$nomor_mobil','$merk','$jenis','$warna', '$tahun_pembuatan', '$biaya_sewa_per_hari')";

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
      header("location:template.php?page=mobil");
    }
    elseif ($_POST["action"]=="update") {
      $sql="update mobil set nomor_mobil='$nomor_mobil', merk='$merk', jenis='$jenis', warna='$warna', tahun_pembuatan='$tahun_pembuatan', biaya_sewa_per_hari='$biaya_sewa_per_hari'  where id_mobil='$id_mobil'";
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
 header("location:template.php?page=mobil");
  }

  if (isset($_GET["hapus"])) {
    $id_mobil = $_GET["id_mobil"];
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    $sql = "delete from mobil where id_mobil='$id_mobil'";
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
    header("location:template.php?page=mobil");
  }
 ?>
