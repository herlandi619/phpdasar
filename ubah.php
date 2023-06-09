<?php
require 'functions.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
    } else {
        echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			  </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
    <style>
        ul li {
            list-style: none;
        }
    </style>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" value="<?php echo $mhs["nrp"]; ?>" required>
            </li>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>" required>
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>" required>
            </li>
            <li>
                <label for="jurusan">jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>" required>
            </li>
            <li>
                <label for="gambar">gambar : </label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>

</html>