<?php
session_start();

require'functions.php';

if( isset($_SESSION["login"])){
	header("Location:index.php");
	exit;
}


if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    //cek useername
    if(mysqli_num_rows($result)===1){

        //cek password
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){

            //set session
            $_SESSION["login"]=true;
            header("Location:index.php");
            exit;

        }else{
            echo"
            <script>
            alert('Username atau password salah!');
            document.location.href='login.php';
            </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOKO KELONTONG | Log in</title>

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
    <a href="index2.html"><b>KELONTONG</b> Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post" >
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" id="username" >
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
        </div>
        <div>
          <a href="registrasi.php" type="button">Belum punya akun? klik disini</a>
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
