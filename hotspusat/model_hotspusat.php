<?php

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

// MENYIMPAN DATA LAPORAN
if($action == 'simpanLaporan'){

  $id_admin = $_POST['id_admin'];
  $id_grup = $_POST['id_grup'];
  $memberAktiv = $_POST['memberAktiv'];
  $memberPasif = $_POST['memberPasif'];
  $statusGrup = $_POST['statusGrup'];

  $result = $conn->query("INSERT INTO hots_laporan_group(id_admin, id_grup, memberAktiv, memberPasif, statusGrup) VALUES ('$id_admin', '$id_grup', '$memberAktiv', '$memberPasif', '$statusGrup')");

  $cek = "INSERT INTO hots_laporan_group(id_grup, memberAktiv, memberPasif, statusGrup) VALUES ('$id_admin', '$id_grup', '$memberAktiv', '$memberPasif', '$statusGrup')";

  if($result){
    $res['message'] = "laporan berhasil tersimpan";
  } else {
    $res['error'] = $cek;
  }

  $res['persons'] = $result;

}

$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();
