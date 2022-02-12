<?php

include_once("Konfigurasi.php");

class Crud extends Konfigurasi {

  public function __construct(){
    parent:: __construct();
  }

  public function login($uname, $passwd){
    $pass = md5($passwd);
    $sql = "SELECT * FROM user WHERE username = '$uname' AND password = '$pass'";
    $query = $this->connection->query($sql);
    if($query->num_rows > 0){
      $row =$query->fetch_array();
      return $row['username'];
    }
  }
  public function getData(){
    $array = array();
    $query ="SELECT a.*, b.gaji FROM data_pegawai a left join mst_gaji b on b.golongan = a.golongan";
    $result = mysqli_query($this->connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      $array[] = $row;
    }
    return $array;
  }

  public function insertData($nip, $nama, $gol){
    echo $nip. ' '. $nama . ' '. $gol;
    $query = "INSERT INTO data_pegawai(nip, nama, golongan) VALUES('$nip', '$nama', '$gol')";
    $res = mysqli_query($this->connection, $query);
    if ($res === true) {
      return true;
    } else {
      return false;
    }
  }

  public function hapusData($nip) {
      $query = "DELETE FROM data_pegawai WHERE nip = '$nip'";
      $res = mysqli_query($this->connection, $query);
      if ($res === true) {
        return 'sukses';
    } else {
        return 'gagal';
    }
  }

  public function getDataByNip($nip) {
      $array = array();
      // $query = "SELECT * FROM data_pegawai WHERE nip = '$nip'";
      $query = "SELECT * FROM data_pegawai WHERE nip = '0099990'";
      $result = mysqli_query($this->connection, $query);
      while($row = mysqli_fetch_assoc($result)) {
          $array[] = $row;
      }
      return $array;
  }

}