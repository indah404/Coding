<?php

class Koneksi {

    function ambildata() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "pbw";

        $conn = new mysqli($servername, $username, $password, $db );
        if ($conn->connect_error) {
            die("connection failed:" . $conn->connect_error) ;
        }  
        $sql = "SELECT * FROM barang";
        $hasil = $conn->query($sql);
        return $hasil;
    }

    function rupiah($angka){
        $hasi_rupiah = number_format($angka, 2, ',' , '.');
        return $hasil_rupiah;
    } 
}
?>