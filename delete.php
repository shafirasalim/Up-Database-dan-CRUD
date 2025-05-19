<?php
require_once 'concert.php';
$concert = new Concert();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $concert->deleteConcert($id);
    echo "<script>alert('Data konser berhasil dihapus'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php';</script>";
}
