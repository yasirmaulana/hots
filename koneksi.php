<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = 'password'; // Password (Isi jika menggunakan password)
$database = 'go2aries_kauny'; // Nama databasenya
// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
