<?php
// kelas induk / parent untuk koneksi database
class Database {
    // property dengan visibility protected
    protected $conn;

    // constructor
    function __construct($db) {
        $this->conn = $db;
    }
}

// kelas turunan hp / mewarisi class Database (inheritance)
class HP extends Database {
    //property dengan visibility private
    private $id;
    private $nama;
    private $stok;

    // setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function setStok($stok) {
        $this->stok = $stok;
    }

    // getter untuk mengambil id hp
    public function getId() {
        return $this->id;
    }

        // getter untuk mengambil nama hp
    public function getNama() {
        return $this->nama;
    }

        // getter untuk mengambil stok hp
    public function getStok() {
        return $this->stok;
    }

    // method untuk menampilkan stok hp
    public function tampil() {
        return mysqli_query($this->conn, "SELECT * FROM hp");
    }

    // method untuk menambahkan hp
    public function tambah() {
        $nama = $this->getNama();
        $stok = $this->getStok();
        return mysqli_query($this->conn, "INSERT INTO hp (nama, stok) VALUES ('$nama', $stok)");
    }

    public function getById($id) {
        $result = mysqli_query($this->conn, "SELECT * FROM hp WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    // method untuk mengupdate hp
    public function update() {
        $id = $this->getId();
        $nama = $this->getNama();
        $stok = $this->getStok();
        return mysqli_query($this->conn, "UPDATE hp SET nama='$nama', stok=$stok WHERE id=$id");
    }

    // method untuk menghapus hp
    public function hapus($id) {
        return mysqli_query($this->conn, "DELETE FROM hp WHERE id=$id");
    }

    // method untuk menjual hp
    public function jual($id, $jumlah) {
        mysqli_query($this->conn, "UPDATE hp SET stok = stok - $jumlah WHERE id = $id");
        return mysqli_query($this->conn, "INSERT INTO penjualan (hp_id, jumlah) VALUES ($id, $jumlah)");
    }

    // method untuk melihat histori hp yang telah dijual
    public function histori() {
        return mysqli_query($this->conn, "
            SELECT p.*, h.nama FROM penjualan p
            JOIN hp h ON p.hp_id = h.id
            ORDER BY p.tanggal DESC
        ");
    }
}
?>
