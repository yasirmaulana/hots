<?php

session_start();
if(isset($_SESSION['nomorWA']) && $_SESSION['role']=='pusat'){

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

    $result = $conn->query("SELECT * FROM view_hots_grup order by id_fasil");
    $groups = array();

    while($row = $result->fetch_assoc()){
      array_push($groups, $row);
    }

    $res['groups'] = $groups;
  }

  // MENAMPILKAN DATA SURAH
  if($action == 'readSurah'){

    $result = $conn->query("SELECT * FROM hots_surah");
    $surah = array();

    while($row = $result->fetch_assoc()){
      array_push($surah, $row);
    }

    $res['surah'] = $surah;
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

  // MENYIMPAN DATA GRUP
  if($action == 'simpanGrup'){

    $nomor_grup = $_POST['nomorGrup'];
    $id_surah = $_POST['idSurah'];
    $id_fasil = $_POST['idFasil'];

    $result = $conn->query("INSERT INTO hots_grup(nomor_grup, id_surah, id_fasil) VALUES ('$nomor_grup', '$id_surah', '$id_fasil')");

    $cek = "INSERT INTO hots_grup(nomor_grup, id_surah, id_fasil) VALUES ('$nomor_grup', '$id_surah', '$id_fasil')";

    if($result){
      $res['message'] = "data fasil berhasil tersimpan";
    } else {
      $res['error'] = $cek;
    }

    $res['persons'] = $result;

  }


  // UPDATE DATA FASIL
  if($action == 'ubahGrup'){

    $nomor_grup = $_POST['nomor_grup'];
    $id_surah = $_POST['id_surah'];
    $id_fasil = $_POST['id_fasil'];
    // $nomorWA2 = $_POST['nomorWA2'];
    // $status = $_POST['status'];

    $result = $conn->query("UPDATE hots_grup set id_surah = '$id_surah', id_surah = '$id_surah', WHERE nomor_grup = $nomor_grup");

    // $cek = "UPDATE hots_grup set id_surah = '$id_surah', id_surah = '$id_surah', WHERE nomor_grup = $nomor_grup";

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

}