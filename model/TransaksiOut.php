<?php

require_once "Transaksi.php";
class TransaksiOut extends Transaksi {
    public function __construct($conn) {
        parent::__construct($conn);
        $this->tipe = "out";
    }

    public function proses($stock) {
        $stock->setKodeBarang($this->kode_barang);
        $stock->kurangiJumlah($this->jumlah);
    }
}