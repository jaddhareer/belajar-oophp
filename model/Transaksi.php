<?php

class Transaksi {
    protected $conn;
    protected $table = "transaksi";

    protected $id_transaksi;
    protected $kode_barang;
    protected $tipe;
    protected $jumlah;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function setKodeBarang($kode) {
        $this->kode_barang = $kode;
    }

    public function setJumlah($jumlah) {
        if ($jumlah <= 0) {
            echo "jumlah transaksi harus lebih dari 0 <br>";
            return;
        }
        $this->jumlah = $jumlah;
    }

    public function save() {
        $query = "INSERT INTO " . $this->table . " (kode_barang, tipe, jumlah) VALUES (:kode_barang, :tipe, :jumlah)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":kode_barang", $this->kode_barang);
        $stmt->bindParam(":tipe", $this->tipe);
        $stmt->bindParam(":jumlah", $this->jumlah);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}