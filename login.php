<?php
session_start(); // Start session nya

include "koneksi.php"; // Load file koneksi.php

$username = $_POST['nomorWA']; // Ambil value username yang dikirim dari form
$password = $_POST['password']; // Ambil value password yang dikirim dari form
// $password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5

// Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
$sql = $pdo->prepare("SELECT * FROM view_user_hots WHERE nomorWA=:a AND password=:b");
$sql->bindParam(':a', $username);
$sql->bindParam(':b', $password);
$sql->execute(); // Eksekusi querynya
$data = $sql->fetch(); // Ambil datanya dari hasil query tadi

// Cek apakah variabel $data ada datanya atau tidak
if( ! empty($data)){
  $_SESSION['id'] = $data['id'];
  $_SESSION['nama'] = $data['nama'];
  $_SESSION['nomorWA'] = $data['nomorWA'];
  $_SESSION['role'] = $data['role'];

  setcookie("message","delete",time()-1); // Kita delete cookie message

  switch ($data['role']) {
    case "pusat":
        header("location: ./hotspusat/view_hotspusat.php");
        break;
    case "fasil":
        header("location: ./hotsfasil/index.php");
        break;
    case "admin":
        header("location: ./hotsadmin/index.php");
        break;
    case "reviewer":
        header("location: ./hotsreviewer/index.php");
        break;
  }
  
}else{
  // Buat sebuah cookie untuk menampung data pesan kesalahan
  setcookie("message", "Maaf, Username atau Password salah", time()+3600);

  header("location: index.php");

}
?>
