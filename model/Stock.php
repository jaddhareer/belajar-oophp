<?php

class Stock {
    private $kode_barang;
    private $nama_barang;
    private $jumlah;

    public function __construct(int $kode_barang, string $nama_barang, int $jumlah){
        $this->kode_barang = $kode_barang;
        $this->nama_barang = $nama_barang;
        $this->jumlah = $jumlah;
    }

    public function setJumlah($jumlah) {
        if($jumlah < 0) {
            echo "stok tidak boleh minus <br>";
            return;
        }
        $this->jumlah = $jumlah;
    }

    public function getJumlah() {
        return $this->jumlah;
    }

    public function tambahJumlah($barangMasuk) {
        $this->jumlah += $barangMasuk;
    }

    public function tampilkanInfo() {
        echo "kode :" . $this->kode_barang . "<br>";
        echo "nama :" . $this->nama_barang . "<br>";
    }
}