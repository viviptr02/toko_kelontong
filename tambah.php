<?php
session_start();

if( !isset($_SESSION["login"])){
	header("Location:login.php");
	exit;
}
require'functions.php';
//cek tombol sudah ditekan atau belum
if(isset($_POST["submit"])){
    
    //cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST)>0){
        echo"
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href='index.php';
        </script>
    ";
    }else{
        echo"
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href='index.php';
        </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOKO KELONTONG | Tambah Data Produk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>KELONTONG</b> Tambah Data</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Update Data Produk</p>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga Produk" required>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="custom-file-input" name="gambar_produk" id="gambar_produk" required>
            <label class="custom-file-label" for="exampleInputFile">Gambar Produk</label>
        </div>
        <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Tambah Data</button>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>