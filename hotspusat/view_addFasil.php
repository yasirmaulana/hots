<?php
session_start();
if(isset($_SESSION['nomorWA']) && $_SESSION['role']=='pusat'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Fasil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://kauny.com/hots/images/hots.ico"/>
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

<div id="root">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://kauny.com/hots">
        Hafizh on the Street
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:50px;margin-bottom:50px">
  <h2>Formulir Tambah Data Fasil</h2>
  <form>
    <div class="form-group">
      <label for="nama">Nama*:</label>
      <input type="nama" class="form-control" id="nama" v-model="newFasil.nama">
    </div>
    <div class="form-group">
      <label for="nomorWA">Nomor WA*:</label>
      <input type="nomorWA" class="form-control" id="nomorWA" v-model="newFasil.nomorWA" placeholder="example: 0815xxxxxxxx">
    </div>
    <div class="form-group">
      <label for="nomorWA2">Nomor WA2:</label>
      <input type="nomorWA2" class="form-control" id="nomorWA2" v-model="newFasil.nomorWA2" placeholder="example: 0815xxxxxxxx">
    </div>
    <div>
      <a type="submit" class="btn btn-success" @click="simpanFasil()">Simpan</a>
      <a type="button" class="btn btn-info" href="view_hotspusat.php">kembali ke Dashboard</a>
    </div>
  </form>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</div>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script> -->
<script type="text/javascript" src="/hots/sweetalert.js"></script>
<script type="text/javascript" src="/hots/axios.js"></script>
<script type="text/javascript" src="/hots/vue.js"></script>
<script type="text/javascript" src="controller_hotspusat.js"></script>

</body>
</html>

<?php
}
else {
  header("location: ../view_login.php"); 
}
?>