<?php 

include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("update transaksi set status='Gagal Dibayar' where id_transaksi='$id'");
echo "<script>alert('Transaksi sudah dibayar');</script>";
echo "<script>location='../form-transaksi.php';</script>";
?>