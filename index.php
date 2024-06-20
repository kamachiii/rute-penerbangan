<!-- Untuk frontend -->
<!-- Definisi variabel -->
<?php
    $fileJson = "./data/data.json";
    $data = json_decode(file_get_contents($fileJson, true));
    sort($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Rute Penerbangan</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./library/style.css">
</head>
<body>
  <div class="container">
    <h2 class="text-center mb-4">Pendaftaran Rute Penerbangan</h2>
    <form action="./controller/action.php" method="post">
      <div class="form-group">
        <label for="jenisPesawat">Maskapai :</label>
        <input type="text" class="form-control" id="jenisPesawat" name="nama_maskapai" required>
      </div>
      <div class="form-group">
        <label for="bandaraAsal">Bandara Asal:</label>
        <select class="form-control" id="bandaraAsal" name="asal_penerbangan" required>
          <option value="" disabled selected hidden>Pilih Bandara Asal</option>
          <option value="CGK">Soekarno-Hatta (CGK)</option>
          <option value="BDO">Husein Sastranegara (BDO)</option>
          <option value="MLG">Abdul Rahman Saleh (MLG)</option>
          <option value="SUB">Juanda (SUB)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bandaraTujuan">Bandara Tujuan:</label>
        <select class="form-control" id="bandaraTujuan" name="tujuan_penerbangan" required>
          <option value="" disabled selected hidden>Pilih Bandara Tujuan</option>
          <option value="DPS">Ngurah Rai (DPS)</option>
          <option value="UPG">Hasanuddin (UPG)</option>
          <option value="INX">Inanwatan (INX)</option>
          <option value="BTJ">Sultan Iskandarmuda (BTJ)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="harga">Harga Tiket:</label>
        <input type="number" class="form-control" id="harga" name="harga_tiket" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Beli</button>
    </form>
  </div>

  <!-- Table data -->
   <div class="container">
    <h2 class="text-center mb-4">Daftar Rute Tersedia</h2>
    <table class="table table-bordered">
        <tr>
            <th>Maskapai</th>
            <th>Bandara Asal</th>
            <th>Bandara Tujuan</th>
            <th>Harga Tiket</th>
            <th>Pajak</th>
            <th>Total Harga</th>
        </tr>

        <?php
            foreach($data as $key => $value) {
                echo "<tr>
                    <td>" . $value->nama_maskapai . "</td>
                    <td>" . $value->asal_penerbangan . "</td>
                    <td>" . $value->tujuan_penerbangan . "</td>
                    <td>" . $value->harga_tiket . "</td>
                    <td>" . $value->pajak . "</td>
                    <td>" . $value->total_harga . "</td>
                </tr>";
            }
        ?>
    </table>
   </div>
   <!-- End Table data -->

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
