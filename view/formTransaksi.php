<?php

require_once "../model/Database.php";
require_once "../model/Stock.php";

$db = new Database();
$conn = $db->getConnection();

$barang = new Stock($conn);
$listBarang = $barang->dataList();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>
<body>
    <h2>Input Transaksi</h2>
    <hr>
    <form action="../controller/transaksiController.php" method="post">
        <label for="tipe">Type</label> <br>
        <select name="tipe" id="tipe"> 
            <option value="in">In</option>
            <option value="out">Out</option>
        </select> <br>
        <label for="nama_barang">barang</label><br>
        <input type="text" name="nama_barang" list="barang" autocomplete="off" required>
        <datalist id="barang">
            <?php foreach($listBarang as $l) { ?>
            <option value="<?= $l['nama_barang'] ?>"><?= $l['nama_barang'] ?></option>
            <?php } ?>
        </datalist> <br>
        <label for="jumlah">jumlah</label><br>
        <input type="number" name="jumlah" id="jumlah"><br><br>
        <button type="submit">simpan</button>
    </form>
</body>
</html>