<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

//tombol cari ketika ditekan    
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .loader {
            width: 50px;
            z-index: 1;
            position: absolute;
            top: 138px;
            left: 270px;
            display: none;
        }
    </style>
    <script src="js/jquery-lib.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <a href="logout.php">logout</a>
    <h1 class="header">Daftar Mahasiswa</h1>
    <a class="tambah" href="tambah.php">Tambah Data Mahasiswa </a>
    <br>
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" placeholder="masukan keyword!" autocomplete="off" autofocus
            id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
        <img src="img/loader.gif" class="loader">
    </form>
    <br><br>


    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0" class="table">

            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row): ?>


                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>"
                            onclick="return confirm('Anda yakin ingin mengubah data ?');">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>"
                            onclick="return confirm('Anda Yakin Ingin Menghapus Data ?');">Hapus</a>
                    </td>

                    <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>

                    <td>
                        <?php echo $row["nrp"] ?>
                    </td>
                    <td>
                        <?php echo $row["nama"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"] ?>
                    </td>
                    <td>
                        <?php echo $row["jurusan"] ?>
                    </td>

                </tr>
                <?php $i++; ?>
            <?php endforeach ?>

        </table>
    </div>


</body>

</html>