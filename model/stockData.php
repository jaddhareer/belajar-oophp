<?php

class Stock {
    public $kode_barang;
    public $nama_barang;
    public $jumlah;

    public function tampilkanInfo() {
        echo "kode :" . $this->kode_barang . "<br>";
        echo "nama :" . $this->nama_barang . "<br>";
        echo "qty :" . $this->jumlah . "<br>";
    }
}