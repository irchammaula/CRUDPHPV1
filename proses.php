<?php
include 'koneksisql.php';
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        //var_dump($_POST);
        //var_dump($_FILES);
        //echo $_FILES['foto']['name'];
        //die();
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama_siswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto = $_FILES['foto']['name'];;
        $alamat = $_POST['alamat'];

        $directory = "img/";
        $tmpfile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpfile, $directory . $foto);

        //die();

        $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nama', '$jenis_kelamin', '$foto', '$alamat')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: index.php");
            //echo "Data berhasil Ditambahkan <a href='index.php'>HOME</a>'";
        } else {
            echo $query;
        }

        //echo $nisn."|".$nama."|".$jenis_kelamin."|".$foto."|".$alamat;
        //echo "<br>Tambah Data <a href='index.php'>HOME</a>";
    } else if ($_POST['aksi'] == "edit") {
        //echo "Edit Data <a href='index.php'>HOME</a>";
        //var_dump($_POST);
        $id_siswa = $_POST['id_siswa'];
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama_siswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];

        $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($_FILES['foto']['name'] == "") {
            $foto = $result['foto_siswa'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("img/" . $result['foto_siswa']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $_FILES['foto']['name']);
        }
        //die();

        $query = "UPDATE tb_siswa SET nisn ='$nisn', nama_siswa ='$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', foto_siswa = '$foto' WHERE id_siswa= '$id_siswa'; ";
        $sql = mysqli_query($conn, $query);
        header("location: index.php");
    }
}

if (isset($_GET['hapus'])) {
    $id_siswa = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    //var_dump($result);

    unlink("img/" . $result['foto_siswa']);
    //die();

    $query = "DELETE FROM tb_siswa WHERE id_siswa ='$id_siswa';";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: index.php");
    } else {
        echo $query;
    }
    //echo "Hapus Data <a href='index.php'>HOME</a>";
}
