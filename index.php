<?php
include "koneksi.php";
include "HP.php";

// membuat objek dari class hp
$hp = new HP($koneksi);

// memanggil method tampil
$data = $hp->tampil();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar HP Konter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>📱 Daftar Stok HP</h2>

    <div style="margin-bottom: 15px;">
        <a href="tambah.php">+ Tambah HP</a> |
        <a href="histori.php">Lihat Histori Penjualan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama HP</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a> |
                    <a href="jual.php?id=<?= $row['id'] ?>">Jual</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
