<?php
// Definisi variabel
$fileJson = "./data/data.json";
$data = json_decode(file_get_contents($fileJson), true);

sort($data); // sort data
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembelian Tiket Pesawat</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="./library/style.css">
</head>

<body>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="display-4 animate__animated animate__fadeInDown">Tambahkan Rute Penerbangan</h1>
          <p class="lead animate__animated animate__fadeIn">Daftarkan Rute Penerbangan anda degan mudah disini.</p>
          <form action="controller/action.php" method="POST" class="animate__animated animate__fadeInUp">
            <div class="form-row justify-content-center">
              <div class="form-group col-md-3">
                <label for="inputMaskapai">Nama Maskapai</label>
                <input type="text" class="form-control form-control-lg" id="inputMaskapai" name="nama_maskapai" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputKotaAsal">Kota Asal</label>
                <select class="form-control" id="bandaraAsal" name="asal_penerbangan" required>
                  <option value="" disabled selected hidden>Pilih Bandara Asal</option>
                  <option value="CGK">Soekarno-Hatta (CGK)</option>
                  <option value="BDO">Husein Sastranegara (BDO)</option>
                  <option value="MLG">Abdul Rahman Saleh (MLG)</option>
                  <option value="SUB">Juanda (SUB)</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputKotaTujuan">Kota Tujuan</label>
                <select class="form-control" id="bandaraTujuan" name="tujuan_penerbangan" required>
                  <option value="" disabled selected hidden>Pilih Bandara Tujuan</option>
                  <option value="DPS">Ngurah Rai (DPS)</option>
                  <option value="UPG">Hasanuddin (UPG)</option>
                  <option value="INX">Inanwatan (INX)</option>
                  <option value="BTJ">Sultan Iskandarmuda (BTJ)</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputHarga">Harga Tiket</label>
                <input type="text" class="form-control form-control-lg" id="inputHarga" name="harga_tiket" required>
              </div>
              <div class="form-group col-md-3">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Daftarkan Rute</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- Information Section -->
  <section class="form-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="feature-box text-center animate__animated animate__fadeInLeft">
            <i class="fas fa-plane fa-4x mb-4"></i>
            <h3>Daftar Rute Penerbangan</h3>
            <p>Temukan dan daftarkan rute penerbangan favorit Anda sesuai jadwal yang beragam.</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="feature-box text-center animate__animated animate__fadeInUp">
            <i class="fas fa-clock fa-4x mb-4"></i>
            <h3>Pendaftaran Mudah</h3>
            <p>Proses pendaftaran rute penerbangan yang cepat dan aman dengan sistem kami.</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="feature-box text-center animate__animated animate__fadeInRight">
            <i class="fas fa-list fa-4x mb-4"></i>
            <h3>Daftar Mudah Dibaca</h3>
            <p>Menampilkan daftar yang mudah dibaca untuk memilih rute penerbangan favorit Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Ticket Purchase Table -->
  <section class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h2 class="text-center mb-4">Detail Pembelian Tiket</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-custom mb-5">
            <tr>
              <th>Maskapai</th>
              <th>Bandara Asal</th>
              <th>Bandara Tujuan</th>
              <th>Harga Tiket</th>
              <th>Pajak</th>
              <th>Total Harga</th>
            </tr>

            <?php
            foreach ($data as $key => $value) {
              echo "<tr>
                    <td>" . $value['nama_maskapai'] . "</td>
                    <td>" . $value['asal_penerbangan'] . "</td>
                    <td>" . $value['tujuan_penerbangan'] . "</td>
                    <td>" . $value['harga_tiket'] . "</td>
                    <td>" . $value['pajak'] . "</td>
                    <td>" . $value['total_harga'] . "</td>
                </tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container mt-5">
      <p>&copy; 2024 Pembelian Tiket Pesawat.</p>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Animate CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.