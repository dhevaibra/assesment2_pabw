<?php

// Koneksi ke database
$db = new mysqli('localhost', 'root', '', 'inventaris2');

// Cek koneksi database
if ($db->connect_error) {
  die('Koneksi database gagal: ' . $db->connect_error);
}

// Query untuk mengambil data presensi
$sql = "SELECT merk, warna, jumlah, harga FROM handphone";
$result = $db->query($sql);

// Deklarasi array untuk menampung data presensi
$dataHandphone = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch_assoc()) {
  $dataHandphone[] = $row;
}

// Konversi data presensi ke format JSON
$handphoneJSON = json_encode($dataHandphone);
file_put_contents('data_handphone.json', $handphoneJSON);

// Cetak JSON ke respons
echo $handphoneJSON;