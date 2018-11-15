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
  .panel-heading {
    padding: 5px 15px;
  }
  /* .panel-footer {
    padding: 1px 15px;
    color: #A0A0A0;
  } */
  .profile-img {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
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

<!-- <div class="container" style="margin-top:50px">
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
</div> -->

<div class="container" style="margin-top:70px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong> Sign in to continue</strong>
        </div>
        <div class="panel-body">
          <form role="form" action="login.php" method="POST">
            <fieldset>
              <div class="row">
                <div class="center-block">
                  <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-phone-alt"></i>
                      </span> 
                      <input class="form-control" placeholder="No HP (WA)" name="nomorWA" id="username" type="text" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                      </span>
                      <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign in">
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
					<!-- <div class="panel-footer ">
						Don't have an account! <a href="#" onClick=""> Sign Up Here </a>
					</div> -->
                </div>
			</div>
		</div>
	</div>

<footer class="container-fluid text-center">
  <p>IT Dept. @ 2018</p>
</footer>

</body>
</html>
