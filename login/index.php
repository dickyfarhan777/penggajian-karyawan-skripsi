<?php
session_start();
include '../config/koneksi.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");

    $queryPegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");

    $loginData = mysqli_fetch_assoc($query);
    $dataPegawai = mysqli_fetch_assoc($queryPegawai);
    $loginCheck = mysqli_num_rows($query);

    if ($loginCheck > 0) {
        $_SESSION['login'] = $loginData;
        echo "<script>alert('Anda berhasil login')</script>";
        header("location:../index.php?pesan=input");
    } else {
        if ($dataPegawai) {
            $_SESSION['login'] = $dataPegawai;
            echo "<script>alert('Anda berhasil login')</script>";
            header("location:../index.php?pesan=input");
        } else {
            echo "<script>alert('Username atau Password anda salah')</script>";
            header("location:../index.php?pesan=input");
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../asstes/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Login Aplikasi</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="" method="post">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input name="username" class="form-control" type="text" placeholder="USERNAME" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input name="password" class="form-control" type="password" placeholder="Password">
                </div>
                <div class="form-group btn-container">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../asstes/js/jquery-3.3.1.min.js"></script>
    <script src="../asstes/js/popper.min.js"></script>
    <script src="../asstes/js/bootstrap.min.js"></script>
    <script src="../asstes/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../asstes/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>