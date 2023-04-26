<?php
//1.koneksi ke data base
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{

    global $conn;
    //ambil data dari tiap element form

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);


    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO mahasiswa
    VALUES
    ('','$nama','$nrp','$email','$jurusan','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang Diupload?
    if ($error === 4) {
        echo "<script>
            alert('Masukan Gambar Terlebih Dahulu!');    
        </script>";
        return false;
    }

    //cek apakah yang diupload apakah gambar ??
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('File Bukan Berupa Gambar!');    
                </script>";
        return false;
    }

    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                    alert('Ukuran Gambar Terlalu Besar!!');    
                </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    //jika gambar lolos pengecekan , gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah gambar user pilih baru atau tidak 

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    $sql = "UPDATE mahasiswa SET
				nrp = '$nrp',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			WHERE
				id = $id
			";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa 
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    return query($query);
}


function registrasi($data)
{
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek user sudah dipakai atau belum?
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username telah digunakan!!');
                </script>";

        return false;
    }


    //konfirmasi password // matching password
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi Password Salah');
                </script>";


        return false;
    }

    //eksripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan user terbaru ke data base;
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}


?>