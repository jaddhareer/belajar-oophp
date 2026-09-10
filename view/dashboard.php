<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock dan Transaksi</title>
</head>
<body>
    <button style="position:fixed; right:50%; text-decoration:none"><a href="view/formTransaksi.php" style="color:blue; text-decoration:none" >lakukan transaksi</a></button>
    <button style="position:fixed; right:5%; color:red; text-decoration:none"><a href="controller/logoutController.php" style="color:red; text-decoration:none">Logout</a></button> <br>
    <div style="display: flex; justify-content: space-around">
        <div>
            <?php require_once 'partial/stockTable.php' ?>
        </div>
        <div>
            <?php require_once 'partial/transactionTable.php' ?>
        </div>
    </div>
</body>
</html>
