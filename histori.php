<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);
$data = $hp->histori();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Histori Penjualan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>📊 Histori Penjualan HP</h2>
    <a href="index.php">← Kembali ke Daftar HP</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama HP</th>
                <th>Jumlah Terjual</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['tanggal'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
