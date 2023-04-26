<?php
require "../functions.php";

$keyword = $_GET["keyword"];

$mhs = "SELECT * FROM mahasiswa 
WHERE
nama LIKE '%$keyword%' OR
nrp LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%'
";

$mahasiswa = query($mhs);

?>

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