<?php

require_once "Transaksi.php";
class TransaksiIn extends Transaksi {
    public function __construct($conn) {
        parent::__construct($conn);
        $this->tipe = "in";
    }

    public function proses($stock) {
        $stock->setKodeBarang($this->kode_barang);
        $stock->tambahJumlah($this->jumlah);
    }
}