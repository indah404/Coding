<?php

include 'Crud.php';
$koneksi =new Crud();

$nip = $_POST['nip'];

$hasil = $koneksi->getDataByNip($nip);
echo json_encode($hasil);
