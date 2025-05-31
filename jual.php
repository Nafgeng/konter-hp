<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);
$id = $_GET['id'];
$data = $hp->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlah = $_POST['jumlah'];
    $hp->jual($id, $jumlah);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jual HP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>🛒 Jual HP: <?= htmlspecialchars($data['nama']) ?></h2>
    <form method="post">
        <label>Jumlah Terjual:</label><br>
        <input type="number" name="jumlah" min="1" max="<?= $data['stok'] ?>" required><br>

        <input type="submit" value="Jual">
    </form>
</body>
</html>
