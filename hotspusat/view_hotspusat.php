<?php
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['nomorWA'])){ // Jika tidak ada session username berarti dia belum login
  header("location: view_login.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>
<html>
<head>
  <title>Halaman Setelah Login</title>
</head>
<body>
  <h1>Selamat datang <?php echo $_SESSION['nama']; ?></h1>
  <h3>email anda : <?php echo $_SESSION['nomorWA']; ?></h3>
  <h3>role anda : <?php echo $_SESSION['role']; ?></h3>

  <h4>Anda berhasil login ke dalam aplikasi</h4>

  <a href="logout.php">Logout</a>
</body>
</html>
