<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  <title>Tautan GNFI</title>

</head>
<body class="text-center">
  <form class="form-signin" action="" method="post">
    <img class="mb-4" src="../img/logo.jpg" alt="" width="120" height="120">
    <h1 class="h2 mb-3 font-weight-normal">Dasbor Tautan GNFI</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="username" class="form-control" placeholder="Masukkan E-mail Anda" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
    <div class="checkbox mb-3 text-left">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <div class="mb-3 text-right">
      <a href="login.php">Lupa Kata Sandi?</a>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Masuk ke Dasbormu</button>
    <p class="mt-5 mb-3 text-muted"> Copyright &copy; Good News From Indonesia 2020</p>
    </form>
</body>

</html>

<?php
include_once "config.php";
$conn = mysqli_query($konek, "SELECT * FROM master_pengguna");
if (isset($_POST['username']) and isset($_POST['password'])){
    $username	= $_POST['username'];
    $password	= $_POST['password'];
   
    if($username && $password){
      $cek_db	= "SELECT * FROM master_pengguna WHERE email_pengguna='$username' and pass_pengguna='$password'";
      $query	= mysqli_query($konek, $cek_db);
      if(mysqli_num_rows($query) != 0){
        $row = mysqli_fetch_assoc($query);
        $db_user = $row['email_pengguna'];
        $db_pass = $row['pass_pengguna'];
   
        if($username == $db_user && $password == $db_pass){
          echo '<p><b>Anda berhasil Login!</b></p>';
          header ('Location: index.php');
        }else{
          echo '<p>Username dan Password tidak cocok!</p>';
        }
      }else{
        echo '<p>Username tidak ada dalam Database!</p>';
      }
    }else{
      echo '<p>Username dan Password masih kosong!</p>';
    }
  }
?>