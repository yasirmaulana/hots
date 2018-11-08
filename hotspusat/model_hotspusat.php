<?php
// include_once '../../hots/koneksi.inc';
include_once '../../hots/koneksi.inc';

$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

// MENAMPILKAN DATA FASIL
if($action == 'readFasil'){
  $result = $conn->query("SELECT * FROM `hots_fasil`");
  $fasils = array();

  while($row = $result->fetch_assoc()){
    array_push($fasils, $row);
  }

  $res['fasils'] = $fasils;
}

// MENAMPILKAN DATA GRUP
if($action == 'readGrup'){

  $result = $conn->query("SELECT * FROM view_hots_grup");
  $groups = array();

  while($row = $result->fetch_assoc()){
    array_push($groups, $row);
  }

  $res['groups'] = $groups;
}

// MENYIMPAN DATA FASIL
if($action == 'simpanFasil'){

  $nama = $_POST['nama'];
  $nomorWA = $_POST['nomorWA'];
  $nomorWA2 = $_POST['nomorWA2'];

  $result = $conn->query("INSERT INTO hots_fasil(nama, nomorWA, nomorWA2) VALUES ('$nama', '$nomorWA', '$nomorWA2')");

  $cek = "INSERT INTO hots_fasil(nama, nomorWA, nomorWA2) VALUES ('$nama', '$nomorWA', '$nomorWA2')";

  if($result){
    $res['message'] = "data fasil berhasil tersimpan";
  } else {
    $res['error'] = $cek;
  }

  $res['persons'] = $result;

}

// UPDATE DATA FASIL
if($action == 'ubahFasil'){

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nomorWA1 = $_POST['nomorWA'];
  $nomorWA2 = $_POST['nomorWA2'];
  $status = $_POST['status'];

  $result = $conn->query("UPDATE hots_fasil set nama = '$nama', nomorWA = '$nomorWA1', nomorWA2 = '$nomorWA2', status = $status WHERE id = $id");

  // $cek = "UPDATE hots_fasil set nama = `$nama`, nomorWA = `$nomorWA1`, nomorWA2 = `$nomorWA2`, status = `$status` WHERE id = `$id`";

  if($result){
    // $res['message'] = "data fasil berhasil tersimpan";
  } else {
    // $res['error'] = $cek;
  }

}

$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();
