<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "functions.php";

//2.cek apakah tombol submit sudah dipencet
if (isset($_POST["submit"])) {


    //cek apakah data berhasil atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
        </ul>
        <button type="submit" name="submit">Submit</button>
    </form>

</body>

</html>