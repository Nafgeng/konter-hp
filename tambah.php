<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $hp->setNama($nama); $hp->setStok($stok); $hp->tambah();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah HP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>➕ Tambah HP Baru</h2>
    <form method="post">
        <label>Nama HP:</label><br>
        <input type="text" name="nama" required><br>

        <label>Stok Awal:</label><br>
        <input type="number" name="stok" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
