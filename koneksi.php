<?php
$host = 'localhost';
$username = 'root';
$password = 'password';
// $username = 'go2aries_root';
// $password = 'askarkauny@00';
$database = 'go2aries_kauny';

$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
