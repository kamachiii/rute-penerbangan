<!-- Untuk frontend -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Rute Penerbangan</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1482686115713-0fbcaced6e28');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-blend-mode: lighten; /* Efek transparan */
    }

    .container {
      max-width: 600px;
      margin-top: 50px;
      background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang transparan */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow untuk efek raised look */
    }

    .form-group label {
      font-weight: bold;
      text-align: left;
      display: block;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center mb-4">Pendaftaran Rute Penerbangan</h2>
    <form method="POST" action="controller/action.php">
      <div class="form-group">
        <label for="jenisPesawat">Maskapai :</label>
        <input type="text" class="form-control" id="jenisPesawat" name="jenisPesawat" required>
      </div>
      <div class="form-group">
        <label for="bandaraAsal">Bandara Asal:</label>
        <select class="form-control" id="bandaraAsal" name="bandaraAsal" required>
          <option value="" disabled selected>Pilih Bandara Asal</option>
          <option value="CGK">Soekarno-Hatta (CGK)</option>
          <option value="BDO">Husein Sastranegara (BDO)</option>
          <option value="MLG">Abdul Rahman Saleh (MLG)</option>
          <option value="SUB">Juanda (SUB)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bandaraTujuan">Bandara Tujuan:</label>
        <select class="form-control" id="bandaraTujuan" name="bandaraTujuan" required>
          <option value="" disabled selected>Pilih Bandara Tujuan</option>
          <option value="DPS">Ngurah Rai (DPS)</option>
          <option value="UPG">Hasanuddin (UPG)</option>
          <option value="INX">Inanwatan (INX)</option>
          <option value="BTJ">Sultan Iskandarmuda (BTJ)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="harga">Harga Tiket:</label>
        <input type="text" class="form-control" id="harga" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Beli</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
