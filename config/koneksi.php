<?php
// config/koneksi.php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'latihan2';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}
