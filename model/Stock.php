<?php

class Stock {
    private $conn;
    private $table = 'stock';

    private $kode_barang;
    private $nama_barang;
    private $jumlah;

    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function setKodeBarang($kode_barang) {
        $this->kode_barang = $kode_barang;
    }

    public function setNamaBarang($nama_barang) {
        $this->nama_barang = $nama_barang;
    }

    public function setJumlah($jumlah) {
        if($jumlah < 0) {
            echo "stok tidak boleh minus <br>";
            return;
        }
        $this->jumlah = $jumlah;
    }

    public function save() {
        $query = 'INSERT INTO ' . $this->table .'(nama_barang, jumlah) VALUES (:nama_barang, :jumlah)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_barang', $this->nama_barang);
        $stmt->bindParam(':jumlah', $this->jumlah);
        return $stmt->execute();
    }

    public function update(){
        if($this->kode_barang === NULL) {
            echo'kode barang belum ditentukan, update dibatalkan. <br>';
            return false;
        }

        $query = 'UPDATE '. $this->table .' SET nama_barang = :nama_barang, jumlah = :jumlah WHERE kode_barang  = :kode_barang';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('kode_barang', $this->kode_barang);
        $stmt->bindParam('nama_barang', $this->nama_barang);
        $stmt->bindParam('jumlah', $this->jumlah);
        $stmt->execute();

        return $stmt->rowCount();
    }
    public function delete(){
        if($this->kode_barang === NULL) {
            echo'kode barang belum ditentukan, update dibatalkan. <br>';
            return false;
        }

        $query = 'DELETE FROM '. $this->table .' WHERE kode_barang  = :kode_barang';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('kode_barang', $this->kode_barang);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}