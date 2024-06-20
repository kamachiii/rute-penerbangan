<?php
$nama_maskapai = $_POST['nama_maskapai'];
$asal_penerbangan = $_POST['asal_penerbangan'];
$tujuan_penerbangan = $_POST['tujuan_penerbangan'];
$harga_tiket = $_POST['harga_tiket'];

//convert value $asal_penerbangan from inisial to nama penerbangan and getting price pajak from asal_penerbangan
$dataPajak = json_decode(file_get_contents("../data/pajak.json"), true);
$key = array_search($asal_penerbangan, array_column($dataPajak[0]['asal'], 'inisial'));
$asal_penerbangan = $dataPajak[0]['asal'][$key]['nama_bandara'];
$pajak_asal_penerbangan = $dataPajak[0]['asal'][$key]['pajak'];

//convert value $tujuan_penerbangan from inisial to nama penerbangan and getting price pajak from tujuan_penerbangan
$dataPajak = json_decode(file_get_contents("../data/pajak.json"), true);
$key = array_search($tujuan_penerbangan, array_column($dataPajak[1]['tujuan'], 'inisial'));
$tujuan_penerbangan = $dataPajak[1]['tujuan'][$key]['nama_bandara'];
$pajak_tujuan_penerbangan = $dataPajak[1]['tujuan'][$key]['pajak'];

//Menjumlahkan pajak dan menentukan total harga
$pajak = $pajak_asal_penerbangan + $pajak_tujuan_penerbangan;
$total_harga = $harga_tiket + $pajak;

//keep data from data.json
$data = json_decode(file_get_contents('../data/data.json'), true);

//menyimpan ke json
$data[] = array(
    'nama_maskapai' => $nama_maskapai,
    'asal_penerbangan' => $asal_penerbangan,
    'tujuan_penerbangan' => $tujuan_penerbangan,
    'harga_tiket' => $harga_tiket,
    'pajak' => $pajak,
    'total_harga' => $total_harga
);

// meng-encode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

//menyimpan data ke dalam anggota-json
file_put_contents('../data/data.json', $jsonfile);

header('location:../index.php');
exit();

?>