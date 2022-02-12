<?php

include 'Crud.php';
$koneksi = new Crud();

$nip = $_GET['nip'];

$hasil = $koneksi->hapusData($nip);
if ($hasil == 'sukses') {
	header("Location: ../admin/main.php");
}