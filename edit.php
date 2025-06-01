<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);
$id = $_GET['id'];

// mengambil data hp bedasarkan id
$data = $hp->getById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    // memperbarui data hp
    $hp->setId($id); $hp->setNama($nama); $hp->setStok($stok); $hp->update();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit HP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>✏️ Edit HP</h2>
    <form method="post">
        <label>Nama HP:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
