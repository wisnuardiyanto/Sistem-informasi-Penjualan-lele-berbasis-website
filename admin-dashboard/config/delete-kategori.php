<?php
include 'koneksi.php';

$delete_kategori = $koneksi->query("delete from kategori where id_kategori='$_GET[id]'");
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Sukses - Data Terhapus
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  ";
$tampil_kategori = $koneksi->query("select * from kategori");
header('Location: http://localhost/Penjualan-master/admin-dashboard/data-kategori.php');
exit;
