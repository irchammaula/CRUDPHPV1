<?php
include 'koneksisql.php';
$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>BASIC CRUD V1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="/style/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <!-- navbar awal -->
  <nav class="navbar bg-body-tertiary shadow p-3 navbar bg-primary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="#">BASIC CRUD V1</a>
    </div>
  </nav>
  <!-- navbar akhir -->
  <div class="container">
    <h1 class="mt-4">Data Siswa</h1>
    <p>Halaman ini berisi data siswa</p>
    <a href="kelola.php" type="button" class="btn btn-primary mt-1"><i class="bi bi-patch-plus pe-2"></i>Tambahkan Data</a>
  </div>
  <!-- tabel Data-->
  <div class="container table-responsive mt-4 text-center">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NISN</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Foto Siswa</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($result = mysqli_fetch_assoc($sql)) {
        ?>
          <tr>
            <th scope="row"><?php echo ++$no ?>.</th>
            <td><?php echo $result['nisn']; ?></td>
            <td><?php echo $result['nama_siswa']; ?></td>
            <td><?php echo $result['jenis_kelamin']; ?></td>
            <td><img src="img/<?php echo $result['foto_siswa']; ?>" alt="" width="200" height="150" /></td>
            <td><?php echo $result['alamat']; ?></td>
            <td>
              <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-warning"><i class="bi bi-pencil-square pe-2"></i>Ubah Data</a>
              <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data tersebut?')"><i class="bi bi-trash pe-2"></i>Hapus</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>