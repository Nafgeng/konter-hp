<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);
$hp->hapus($_GET['id']);

header("Location: index.php");
