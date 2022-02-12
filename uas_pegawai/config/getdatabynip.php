<?php

include 'Crud.php';
$koneksi =new Crud();

if (isset($_POST['nip'])){
    $nip = $_POST['nip'];
}else{
    $nip = '0099990';
}
$hasil = $koneksi->getDataByNip($nip);
echo json_encode($hasil);
