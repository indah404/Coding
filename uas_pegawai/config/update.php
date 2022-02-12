<?php

include 'Crud.php';
$koneksi = new Crud();

$data = [
	'nip' => $_POST['nip'],
	'golongan' => $_POST['golongan']
];
$hasil = $koneksi->updateData($data);
if ($hasil) {
	header("Location: ../admin/main.php");
}else{
	echo "GAGAL MENGUBAH GOLONGAN KARYAWAN";
}