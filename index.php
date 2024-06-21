<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembelian Tiket Pesawat</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .hero-section {
      background: linear-gradient(to bottom, rgba(0, 0, 255, 0.6), rgba(0, 0, 255, 0.6)), url('https://source.unsplash.com/1600x900/?airplane') no-repeat center center/cover;
      color: #fff;
      padding: 150px 0;
      text-align: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .hero-section h1 {
      font-size: 3.5rem;
      margin-bottom: 20px;
    }
    .hero-section p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }
    .form-section {
      background-color: #fff;
      padding: 50px 0;
    }
    .feature-box {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .feature-box:hover {
      transform: translateY(-10px);
    }
    .feature-box h3 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .feature-box p {
      font-size: 1.1rem;
    }
    .table-custom {
      margin-top: 30px;
    }
    .table-custom th,
    .table-custom td {
      vertical-align: middle !important;
    }
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 30px 0;
      text-align: center;
    }
    .list-unstyled li {
      font-size: 1.1rem;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="display-4 animate__animated animate__fadeInDown">Temukan Tiket Pesawat Anda</h1>
          <p class="lead animate__animated animate__fadeIn">Bandingkan harga tiket pesawat dari berbagai maskapai dan pilih yang terbaik untuk Anda.</p>
          <form action="controller/action.php" method="POST" class="animate__animated animate__fadeInUp">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-3">
            <label for="inputMaskapai">Nama Maskapai</label>
            <input type="text" class="form-control form-control-lg" id="inputMaskapai" name="nama_maskapai" required>
        </div>
        <div class="form-group col-md-3">
            <label for="inputKotaAsal">Kota Asal</label>
            <select class="form-control form-control-lg" id="inputKotaAsal" name="asal_penerbangan" required>
                <option value="">Pilih Kota Asal</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Surabaya">Surabaya</option>
                <!-- Tambahkan opsi bandara asal lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputKotaTujuan">Kota Tujuan</label>
            <select class="form-control form-control-lg" id="inputKotaTujuan" name="tujuan_penerbangan" required>
                <option value="">Pilih Kota Tujuan</option>
                <option value="Surabaya">Surabaya</option>
                <option value="Yogyakarta">Yogyakarta</option>
                <!-- Tambahkan opsi bandara tujuan lainnya sesuai kebutuhan -->
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
          <table class="table table-bordered table-hover table-custom">
            <thead class="thead-light">
              <tr>
                <th scope="col">Maskapai</th>
                <th scope="col">Asal Penerbangan</th>
                <th scope="col">Tujuan Penerbangan</th>
                <th scope="col">Harga Tiket</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Garuda Indonesia</td>
                <td>Jakarta</td>
                <td>Surabaya</td>
                <td>Rp 1.000.000</td>
                <td>
                  <ul class="list-unstyled">
                    <li>Pajak Bandara: Rp 50.000</li>
                    <li>Pajak Pemerintah: Rp 20.000</li>
                  </ul>
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li>Total: Rp 1.070.000</li>
                  </ul>
                </td>
              </tr>
              <tr>
                <td>Lion Air</td>
                <td>Jakarta</td>
                <td>Yogyakarta</td>
                <td>Rp 750.000</td>
                <td>
                  <ul class="list-unstyled">
                    <li>Pajak Bandara: Rp 40.000</li>
                    <li>Pajak Pemerintah: Rp 15.000</li>
                  </ul>
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li>Total: Rp 805.000</li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2024 Pembelian Tiket Pesawat.</p>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Animate CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.
