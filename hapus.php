<?php
include "koneksi.php";
include "HP.php";

$hp = new HP($koneksi);
$hp->setId($_GET['id']); $hp->hapus($hp->getId());

header("Location: index.php");
