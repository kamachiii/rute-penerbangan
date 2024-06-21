<?php
// Include fungsi-fungsi dari file helper Anda
require_once '../controller/helpers.php';

// Mengambil nilai dari form
$namaMaskapai = $_POST['nama_maskapai'];
$asalPenerbangan = $_POST['asal_penerbangan'];
$tujuanPenerbangan = $_POST['tujuan_penerbangan'];
$hargaTiket = $_POST['harga_tiket'];

// Mengambil data dari file pajak.json
$dataPajak = ambilDataDariJson('pajak.json');

// Menentukan Key Index asal dengan fungsi cariKeyIndex
$keyAsal = cariKeyIndex($asalPenerbangan, 'asal', $dataPajak);

// Menentukan Key Index tujuan dengan fungsi cariKeyIndex
$keyTujuan = cariKeyIndex($tujuanPenerbangan, 'tujuan', $dataPajak);

// Mengambil nama bandara asal
$namaBandaraAsal = $dataPajak['asal'][$keyAsal]['nama_bandara'];

// Mengambil nama bandara tujuan
$namaBandaraTujuan = $dataPajak['tujuan'][$keyTujuan]['nama_bandara'];

// Menghitung total pajak
$totalPajak = hitungPajak($keyAsal, $keyTujuan, $dataPajak);

// Menghitung total harga
$totalHarga = hitungTotalHarga($hargaTiket, $totalPajak);

// Mengambil data dari data.json
$data = ambilDataDariJson('data.json');

// Menyimpan data inputan ke array
$data[] = array(
    'nama_maskapai' => $namaMaskapai,
    'asal_penerbangan' => $namaBandaraAsal,
    'tujuan_penerbangan' => $namaBandaraTujuan,
    'harga_tiket' => $hargaTiket,
    'pajak' => $totalPajak,
    'total_harga' => $totalHarga
);

// Menyimpan data inputan ke dalam JSON
simpanDataKeJson($data, 'data.json');

// Melempar user kembali ke halaman index.html
header('Location: ../public_html/index.html');
exit();
?>
