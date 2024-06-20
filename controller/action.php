<?php

// Inisialisasi variabel untuk menyimpan nilai dari form
$nama_maskapai = $_POST['nama_maskapai'];
$asal_penerbangan = $_POST['asal_penerbangan'];
$tujuan_penerbangan = $_POST['tujuan_penerbangan'];
$harga_tiket = $_POST['harga_tiket'];

// Mengambil data dari file pajak.json dan mendekode JSON menjadi array asosiatif
$dataPajak = json_decode(file_get_contents("../data/pajak.json"), true);

// Mencari indeks di array 'asal' yang memiliki nilai 'inisial' yang sama dengan nilai dari $asal_penerbangan
$keyAsal = array_search($asal_penerbangan, array_column($dataPajak[0]['asal'], 'inisial'));
// Mengambil nama bandara asal sesuai dengan indeks yang telah ditemukan
$asal_penerbangan = $dataPajak[0]['asal'][$keyAsal]['nama_bandara'];

// Mencari indeks di array 'tujuan' yang memiliki nilai 'inisial' yang sama dengan nilai $tujuan_penerbangan
$keyTujuan = array_search($tujuan_penerbangan, array_column($dataPajak[1]['tujuan'], 'inisial'));
// Mengambil nama bandara tujuan sesuai dengan indeks yang telah ditemukan
$tujuan_penerbangan = $dataPajak[1]['tujuan'][$keyTujuan]['nama_bandara'];


// Fungsi untuk menghitung total pajak
function hitungPajak($keyAsal, $keyTujuan, $dataPajak) {
    // Mengambil nilai pajak dari bandara asal berdasarkan indeks yang ditemukan
    $pajakAsal = $dataPajak[0]['asal'][$keyAsal]['pajak'];

    // Mengambil nilai pajak dari bandara tujuan berdasarkan indeks yang ditemukan
    $pajakTujuan = $dataPajak[1]['tujuan'][$keyTujuan]['pajak'];

    // Mengembalikan jumlah dari pajak asal dan tujuan
    return $pajakAsal + $pajakTujuan;
}


// Menghitung total pajak menggunakan fungsi hitungPajak dengan memasukan parameter $keyAsal, $keyTujuan, $dataPajak
$totalPajak = hitungPajak($keyAsal, $keyTujuan, $dataPajak);

// Menentukan total harga
$total_harga = $harga_tiket + $totalPajak;

// Mengambil data yang telah ada di data.json
$data = json_decode(file_get_contents('../data/data.json'), true);

// Menyimpan data inputan ke array
$data[] = array(
    'nama_maskapai' => $nama_maskapai,
    'asal_penerbangan' => $asal_penerbangan,
    'tujuan_penerbangan' => $tujuan_penerbangan,
    'harga_tiket' => $harga_tiket,
    'pajak' => $totalPajak,
    'total_harga' => $total_harga
);

// Meng-encode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota-json
file_put_contents('../data/data.json', $jsonfile);

header('location:../index.php');
exit();
?>
