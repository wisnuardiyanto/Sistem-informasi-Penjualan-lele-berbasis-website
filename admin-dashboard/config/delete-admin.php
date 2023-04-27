<?php
include 'koneksi.php';

$delete_admin = $koneksi->query("delete from login where id_login='$_GET[id]'");
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Sukses - Data Terhapus
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  ";
$delete_admin = $koneksi->query("select * from login");
header('Location: http://localhost/Penjualan-master/admin-dashboard/input-admin.php');
exit;
