<?php

  $conn = new mysqli("localhost", "root", "password", "go2aries_kauny");
  // $conn = new mysqli("localhost", "go2aries_root", "askarkauny@00", "go2aries_kauny");
  if($conn->connect_error){
    die("Could not connect to database!");
  }

?>
