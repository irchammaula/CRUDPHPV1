<!DOCTYPE html>
<?php
include 'koneksisql.php';

$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';

if (isset($_GET['ubah'])) {
  $id_siswa = $_GET['ubah'];

  $queryw = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
  $sqlu = mysqli_query($conn, $queryw);
  $result = mysqli_fetch_assoc($sqlu);

  $nisn = $result['nisn'];
  $nama_siswa = $result['nama_siswa'];
  $jenis_kelamin = $result['jenis_kelamin'];
  $alamat = $result['alamat'];
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BASIC CRUD V1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/kelola.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <!-- navbar awal -->
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BASIC CRUD V1</a>
    </div>
  </nav>
  <!-- navbar akhir -->
  <div class="background"></div>
  <div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4 m-3">
      <h3 class="text-center">
        <?php
        if (isset($_GET['ubah'])) {
          echo "Ubah Data Siswa";
        } else {
          echo "Tambah Data Siswa";
        }
        ?>
      </h3>
      <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_siswa ?>" name="id_siswa">
        <div class="mb-3 pt-3">
          <label for="nisn" class="form-label">NISN</label>
          <input required type="text" name="nisn" class="form-control" id="nisn" aria-describedby="emailHelp" placeholder="Contoh:12345" value="<?php echo $nisn; ?>" />
        </div>
        <div class="mb-3">
          <label for="namasiswa" class="form-label">Nama Siswa</label>
          <input value="<?php echo $nama_siswa; ?>" type="text" name="nama_siswa" class="form-control" id="namasiswa" placeholder="Contoh:Agus Setiabudi" />
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select required class="form-select" name="jenis_kelamin" id="jenis_kelamin">
            <option selected>Pilih Salah Satu</option>
            <option value="Laki-Laki" <?php if ($jenis_kelamin == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
            <option value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo "selected"; ?>>Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Foto Siswa</label>
          <input <?php if (!isset($_GET['ubah'])) {
                    echo "required";
                  }; ?> class="form-control" type="file" name="foto" id="formFile" accept="image/*" />
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Alamat Siswa</label>
          <textarea required class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh : Jalan Kemana-mana senang"><?php echo $alamat; ?></textarea>
        </div>
        <div>
          <?php
          if (isset($_GET['ubah'])) {
          ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-primary">Simpan Perubahan</button>
          <?php
          } else {
          ?>
            <button type="submit" name="aksi" value="add" class="btn btn-primary">Tambah Data</button>
          <?php } ?>
          <a href="index.php" type="button" class="btn btn-danger">Batal</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>