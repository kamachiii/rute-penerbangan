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
?>