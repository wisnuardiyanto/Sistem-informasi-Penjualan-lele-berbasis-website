<?php 

include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("update transaksi set status='Selesai' where id_transaksi='$id'");
echo "<script>alert('Pesanan Diterima');</script>";
echo "<script>location='../akun.php';</script>";
?>