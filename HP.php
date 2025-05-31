<?php
// class HP.php
class HP {
    private $conn;
    // constructor
    function __construct($db) {
        $this->conn = $db;
    }

    // method OOP: menampilkan data hp
    function tampil() {
        return mysqli_query($this->conn, "SELECT * FROM hp");
    }

    // method OOP: menambah hp
    function tambah($nama, $stok) {
        return mysqli_query($this->conn, "INSERT INTO hp (nama, stok) VALUES ('$nama', $stok)");
    }

    // method OOP: mengambil 1 hp berdasarkan id
    function getById($id) {
        $result = mysqli_query($this->conn, "SELECT * FROM hp WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    // method OOP: mengupdate data hp
    function update($id, $nama, $stok) {
        return mysqli_query($this->conn, "UPDATE hp SET nama='$nama', stok=$stok WHERE id=$id");
    }

    // method OOP: menghapus data hp
    function hapus($id) {
        return mysqli_query($this->conn, "DELETE FROM hp WHERE id=$id");
    }

    // method OOP: mengurangi stok dan mencatat penjualan hp
    function jual($id, $jumlah) {
        mysqli_query($this->conn, "UPDATE hp SET stok = stok - $jumlah WHERE id = $id");
        return mysqli_query($this->conn, "INSERT INTO penjualan (hp_id, jumlah) VALUES ($id, $jumlah)");
    }

    // method OOP: mengambil histori penjualan hp
    function histori() {
        return mysqli_query($this->conn, "
            SELECT p.*, h.nama FROM penjualan p
            JOIN hp h ON p.hp_id = h.id
            ORDER BY p.tanggal DESC
        ");
    }
}

?>
