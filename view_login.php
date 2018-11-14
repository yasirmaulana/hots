<?php
session_start(); // Start session nya

if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login
  header("location: welcome.php"); // Kita Redirect ke halaman welcome.php
}
?>

<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="http://kauny.com/hots/images/hots.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  footer {
    background-color: #555;
    color: white;
    padding: 10px;
  }
  </style>
</head>
<body>

<?php
// Cek apakah terdapat cookie dengan nama message
if(isset($_COOKIE["message"])){ // Jika ada
  echo $_COOKIE["message"]; // Tampilkan pesannya
}
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://hots.kauny.com">
        Hafizh on the Street
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="hotsregistration/"><i class="fas fa-user-plus"></i> Daftar Hots</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:50px">
  <h2>Hots LogIn</h2>
  <form method="post" action="login.php">
    <div class="form-group">
      <label for="username">No HP (WA):</label>
      <input type="text" class="form-control" name="nomorWA" id="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-default">Login</button>
  </form>
</div>

<footer class="container-fluid text-center">
  <p>IT Dept. @ 2018</p>
</footer>

</body>
</html>
