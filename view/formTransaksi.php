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
        <label for="barang">barang</label><br>
        <input type="text" name="barang" list="barang" autocomplete="off" required>
        <datalist id="barang">
            <option value="urea">urea</option>
            <option value="garam">garam</option>
            <option value="carton">carton</option>
        </datalist><br>
        <label for="jumlah">jumlah</label><br>
        <input type="number" name="jumlah" id="jumlah"><br><br>
        <button type="button">simpan</button>
    </form>
</body>
</html>