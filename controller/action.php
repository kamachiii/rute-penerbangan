<?php

// Fungsi untuk mengambil data pajak
function ambilDataDariJson($file) {
    $data = json_decode(file_get_contents("../data/$file"), true);
    return $data;
}

// Fungsi untuk menyimpan data ke JSON
function simpanDataKeJson($data, $file) {
    $fileJson = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("../data/$file", $fileJson);
}

// Fungsi untuk mencari key index dari inisial
function cariKeyIndex($inisial, $kategori, $data) {
    // Menggunakan array_search untuk mencari dan array_column unrtuk menghasilkan array baru yang berisikan nilai dari kolom 'inisial'
    $key = array_search($inisial, array_column($data[$kategori], 'inisial'));
    return $key;
}

// Fungsi untuk menghitung total pajak
function hitungPajak($keyAsal, $keyTujuan, $dataPajak) {
    // Mengambil nilai pajak dari bandara asal berdasarkan indeks yang ditemukan
    $pajakAsal = $dataPajak['asal'][$keyAsal]['pajak'];

    // Mengambil nilai pajak dari bandara tujuan berdasarkan indeks yang ditemukan
    $pajakTujuan = $dataPajak['tujuan'][$keyTujuan]['pajak'];

    // Mengembalikan jumlah dari pajak asal dan tujuan
    return $pajakAsal + $pajakTujuan;
}

// Fungsi untuk menghitung total harga

function hitungTotalHarga($hargaTiket, $pajak) {
    // Mengembalikan jumlah dari harga tiket dan pajak
    return $hargaTiket + $pajak;
}

// Inisialisasi variabel untuk menyimpan nilai dari form
$namaMaskapai = $_POST['nama_maskapai'];
$asalPenerbangan = $_POST['asal_penerbangan'];
$tujuanPenerbangan = $_POST['tujuan_penerbangan'];
$hargaTiket = $_POST['harga_tiket'];

// Mengambil data dari file pajak.json melalui function dataPajak
$dataPajak = ambilDataDariJson('pajak.json');

// Menentukan Key Index asal dengan function cariKeyIndex
$keyAsal = cariKeyIndex($asalPenerbangan, 'asal', $dataPajak);

// Menentukan Key Index tujuan dengan function cariKeyIndex
$keyTujuan = cariKeyIndex($tujuanPenerbangan, 'tujuan', $dataPajak);

// Mengambil nama bandara asal
$asalPenerbangan = $dataPajak['asal'][$keyAsal]['nama_bandara'];

// Mengambil nama bandara tujuan
$tujuanPenerbangan = $dataPajak['tujuan'][$keyAsal]['nama_bandara'];

// Menghitung total pajak menggunakan fungsi hitungPajak dengan memasukan parameter $keyAsal, $keyTujuan, $dataPajak
$totalPajak = hitungPajak($keyAsal, $keyTujuan, $dataPajak);

// Menentukan total harga dengan function hitungTotalHarga
$totalHarga = hitungTotalHarga($hargaTiket, $totalPajak);

// Mengambil data yang ada dengan function ambilDataDariJson
$data = ambilDataDariJson('data.json');

// Menyimpan data inputan ke array
$data[] = array(
    'nama_maskapai' => $namaMaskapai,
    'asal_penerbangan' => $asalPenerbangan,
    'tujuan_penerbangan' => $tujuanPenerbangan,
    'harga_tiket' => $hargaTiket,
    'pajak' => $totalPajak,
    'total_harga' => $totalHarga
);

// Menyimpan data inputan ke dalam JSON dengan function simpanDataKeJson
simpanDataKeJson($data, 'data.json');

// Melempar user ke halaman index.php
header('location: ../index.php');
exit();
?>