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

    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}