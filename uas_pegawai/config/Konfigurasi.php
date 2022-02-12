<?php

class Konfigurasi {

    private $host="localhost";
    private $dbname="pegawai";
    private $dbusername="root";
    private $dbpassword="";
    protected $connection;

    public function __construct() {
        if (!isset($this->connection)){
          $this->connection = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
          if (!$this->connection){
             echo 'Koneksi ke database gagal';
            exit;
          }
        }
        return $this->connection;
      }
    }