<?php
session_start();
if(isset($_SESSION['nomorWA']) && $_SESSION['role']=='pusat'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pusat</title>
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
      <a class="navbar-brand" href="http://hots.kauny.com">
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

<div class="container" style="margin-top:50px">
  <h2>Assalamu'alaikum <?php echo $_SESSION['nama']; ?>,</h2>
  <p>ini adalah role pusat. berikut adalah halaman untuk pengaturan fasil dan grup</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Dashboard</a></li>
    <li><a data-toggle="tab" href="#menu1">Fasil</a></li>
    <li><a data-toggle="tab" href="#menu2">Grup</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Dashboard</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    <!-- TAB FASILS -->
    <div id="menu1" class="tab-pane fade">
      <h2>Fasil</h2>
      <p>Lis Fasil Hafizh on the street:</p>
      <a type="button" class="btn btn-success" href="view_addFasil.php">Tambah</a>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Nomor WA</th>
            <th>Nomor WA2</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="fasil in arrFasil">
            <td>{{fasil.nama}}</td>
            <td>{{fasil.nomorWA}}</td>
            <td>{{fasil.nomorWA2}}</td>
            <td>{{fasil.status}}</td>
            <td>
              <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" @click="getFasilSelected(fasil)">Ubah</a>

              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Ubah Data Fasil</h4>
                    </div>
                    <div class="modal-body">
                      <!-- {{fasilSelected}} -->
                      <form>
                        <div class="form-group">
                          <label for="nama">Nama:</label>
                          <input id="nama" type="text" class="form-control" v-model="fasilSelected.nama">
                        </div>
                        <div class="form-group">
                          <label for="wa">Nomor WA :</label>
                          <input id="wa" type="text" class="form-control" v-model="fasilSelected.nomorWA">
                        </div>
                        <div class="form-group">
                          <label for="wa2">Nomor WA 2 (optional) :</label>
                          <input id="wa2" type="text" class="form-control" v-model="fasilSelected.nomorWA2">
                        </div>
                        <div class="form-group">
                          <label for="st">Status</label>
                          <select class="form-control" v-model="fasilSelected.status">
                            <option value="1">aktif</option>
                            <option value="0">pasif</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" @click="ubahFasil()"  data-dismiss="modal">save</button>
                      <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                    </div>
                  </div>

                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- TAB GRUP -->
    <div id="menu2" class="tab-pane fade">
      <h2>Grup</h2>
      <p>Lis Grup Hafizh on the street:</p>
      <a type="button" class="btn btn-success" href="#">Tambah</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>nomor Grup</th>
            <th>Surah</th>
            <th>Fasil</th>
            <th>Admin</th>
            <th>Admin2</th>
            <th>Reviewer</th>
            <th>Reviewer2</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="grup in arrGrup">
            <td>{{grup.id}}</td>
            <td>{{grup.surah}}</td>
            <td>{{grup.fasil}}</td>
            <td>{{grup.admin}}</td>
            <td>{{grup.admin2}}</td>
            <td>{{grup.reviewer}}</td>
            <td>{{grup.reviewer2}}</td>
            <td>
              <a type="button" class="btn btn-warning" href="#">Ubah</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
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