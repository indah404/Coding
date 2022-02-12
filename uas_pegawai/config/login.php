<?php
  session_start();

  include 'Crud.php';
  $koneksi = new Crud();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $name = $koneksi->login($username, $password);
  
  if(empty($name)){
    echo "GAGAL";
    header("Location: ../");
  } else {
    $_SESSION['nama'] = $name;
    echo " LOGIN BERHASIL";
    header("Location: ../admin/main.php");
    exit;
  }
