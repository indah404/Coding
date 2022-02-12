<?php

include 'Crud.php';
$koneksi = new Crud();

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gol = $_POST['golongan'];

$hasil = $koneksi->insertData($nip, $nama, $gol);
if ($hasil) {
	header("Location: ../admin/main.php");
}else{
	echo "GAGAL MENAMBAHKAN DATA PEGAWAI.";
}