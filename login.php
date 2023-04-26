<?php

session_start();
require "functions.php";
//cek cookie 
if (isset($_COOKIE["login"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key === hash('sha256', $row["username"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}




if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST["remember"])) {
                //buat cookie
                setcookie('login', 'true', time() + 60);
                setcookie('key', hash('sha256', $row['username'], time() + 60));
            }

            header('Location: index.php');
            exit;
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label2 {
            display: block;
            margin: 5px;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>LOGIN</h1>

    <?php if (isset($error)): ?>
        <p style="color: red; ">Username dan password Salah!!</p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li class="label2">
                <label for="username" name="username">Username :</label>
                <input type="text" name="username" id="username">
            </li class="label2">
            <li>
                <label for="password" name="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="password">
                <label for="remember" name="remember">Remember Me :</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

    <a href="registrasi.php">Buat Akun</a>

</body>

</html>