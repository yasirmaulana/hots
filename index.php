<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hots</title>
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
          <!-- <li><a href="hotsregistration/"><i class="fas fa-user-plus"></i> Daftar Hots</a></li> -->
          <li><a href="view_login.php" ><i class="fas fa-sign-in-alt"></i> Masuk</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- <div class="col-sm-8 text-left"> -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:50px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/hots.jpeg" alt="guru ngaji" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/hots2.jpeg" alt="sedekah" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/hots3.jpeg" alt="wakaf" style="width:100%;">
      </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        
  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>

</div>

</body>
</html>
