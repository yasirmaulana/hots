<?php

$conn = new mysqli("localhost", "root", "password", "go2aries_kauny");
if($conn->connect_error){
  die("Could not connect to database!");
}

// include_once '../../../includes/connectionJson.inc';

$res = array('error' => false);

$action = 'read';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

// menampilkan data prefix
if($action == 'readPrefix'){

  $result = $conn->query("SELECT id, country_code, country_name FROM tbl_country_phonecode order by country_name");
  $prefix = array();

  while($row = $result->fetch_assoc()){
    array_push($prefix, $row);
  }

  $res['prefix'] = $prefix; 

}

// menampilkan data Provinsi
if($action == 'readProvinsi'){

  $result = $conn->query("SELECT * FROM tbl_alamat_provinsi ORDER BY name");
  $provinsi = array();

  while($row = $result->fetch_assoc()){
    array_push($provinsi, $row);
  }

  $res['provinsi'] = $provinsi; 

}

// menampilkan data kota berdasarkan provinsi yang dipilih
if($action == 'readKota'){

  $propinsi = $_POST['provinsi'];

  $result = $conn->query("SELECT * FROM tbl_alamat_kota WHERE province = '$propinsi' ORDER BY name");
  $kota = array();

  while($row = $result->fetch_assoc()){
    array_push($kota, $row);
  }

  $res['kota'] = $kota;
}

// menampilkan data kecamatan berdasarkan kota yang dipilih
if($action == 'readKecamatan'){

  $kota = $_POST['kota'];

  $result = $conn->query("SELECT * FROM tbl_alamat_kecamatan WHERE regency = '$kota' ORDER BY name");
  $kecamatan = array();

  while($row = $result->fetch_assoc()){
    array_push($kecamatan, $row);
  }

  $res['kecamatan'] = $kecamatan;
}
 
// menampilkan data kelurahan berdasarkan kecamatan yang dipilih
if($action == 'readKelurahan'){

  $kecamatan = $_POST['kecamatan'];

  $result = $conn->query("SELECT * FROM tbl_alamat_kelurahan WHERE district = '$kecamatan' ORDER BY name");
  $kelurahan = array();

  while($row = $result->fetch_assoc()){
    array_push($kelurahan, $row);
  }

  $res['kelurahan'] = $kelurahan;
}

// menampilkan hotserId berdasarkan dari email yang dicari
if($action == 'cariHotseridEmai l'){

  $email = $_POST['email'];

  $result = $conn->query("SELECT hotserId FROM tbl_hots_registration WHERE email = '$email'");
  $hotserid = array();

  // echo "SELECT hotserId FROM tbl_hots_registration WHERE email = '$email'";

  while($row = $result->fetch_assoc()){
    array_push($hotserid, $row);
  }

  $res['hotserid'] = $hotserid;
}

// menampilkan hotserId berdasarkan dari nomor WA yang dicari
if($action == 'cariHotseridWA'){

  $nomorWA = $_POST['nomorWA'];

  $result = $conn->query("SELECT hotserId FROM tbl_hots_registration WHERE nomorWA = '$nomorWA'");
  $hotserid = array();

  // echo "SELECT hotserId FROM tbl_hots_registration WHERE email = '$email'";

  while($row = $result->fetch_assoc()){
    array_push($hotserid, $row);
  }

  $res['hotserid'] = $hotserid;
}

// insert data
if($action == 'create'){

  $nama = $_POST['nama'];
  $tempatLahir = $_POST['tempatLahir'];
  $tglLahir = $_POST['tglLahir'];
  $jenisKelamin = $_POST['jenisKelamin'];
  $pekerjaan = $_POST['pekerjaan'];
  $prefix = $_POST['prefix'];
  $nomorWA = $_POST['nomorWA'];
  $email = $_POST['email'];
  $domisili = $_POST['domisili'];
  $provinsi = $_POST['provinsi'];
  $kota = $_POST['kota'];
  $kecamatan = $_POST['kecamatan'];
  $kelurahan = $_POST['kelurahan'];
  $alamat = $_POST['alamat'];
  $programHots = $_POST['programHots'];
  $programHadist = $_POST['programHadist'];
  $programKids = $_POST['programKids'];
  $wagHots = $_POST['wagHots'];
  $wagHadist = $_POST['wagHadist'];
  $wagKids = $_POST['wagKids'];
  $sumberInfoProgram = $_POST['sumberInfoProgram'];
  $hotserId = $_POST['hotserId'];
  // $hostId = "SMI".date("y").date("m").date("d").date("H").date("i").date("s");

  $result = $conn->query("INSERT INTO tbl_hots_registration(hotserId,
      nama, tempatLahir, tglLahir, jenisKelamin, pekerjaan, 
      prefix, nomorWA, email, domisili, provinsi,
      kota, kecamatan, kelurahan, alamat, programHots,
      programHadist, programKids, wagHots, wagHadist, wagKids,
      sumberInfoProgram) 
      VALUES ('$hotserId',
      '$nama', '$tempatLahir', '$tglLahir', '$jenisKelamin', '$pekerjaan', 
      '$prefix', '$nomorWA', '$email', '$domisili', '$provinsi',
      '$kota', '$kecamatan', '$kelurahan', '$alamat', '$programHots',
      '$programHadist', '$programKids', '$wagHots', '$wagHadist', '$wagKids',
      '$sumberInfoProgram')");
  
  $cek = "INSERT INTO tbl_hots_registration(hotserId, nama, tempatLahir, tglLahir, jenisKelamin, pekerjaan, prefix, nomorWA, email, domisili, provinsi, kota, kecamatan, kelurahan, alamat, programHots, programHadist, programKids, wagHots, wagHadist, wagKids, sumberInfoProgram) VALUES ('$hotserId', '$nama', '$tempatLahir', '$tglLahir', '$jenisKelamin', '$pekerjaan', '$prefix', '$nomorWA', '$email', '$domisili', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$alamat', '$programHots', '$programHadist', '$programKids', '$wagHots', '$wagHadist', '$wagKids', '$sumberInfoProgram')";

  if($result){
    $res['message'] = "hotser added successfuly";
  } else{
    $res['error'] = true;
    // $res['message'] = "could not add hotser";
    $res['message'] = $cek;
    
  }

  // $res['persons'] = $persons; 
}

$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();

// include_once '../../includes/connectionJson_close.inc';
