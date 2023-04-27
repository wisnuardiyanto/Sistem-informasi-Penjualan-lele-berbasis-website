<?php
  include 'koneksi.php';

    $delete_pelanggan= $koneksi->query("delete from pelanggan where id_pelanggan='$_GET[id]'");
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Sukses - Data Terhapus
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  ";
  $tampil_pelanggan =$koneksi->query("select * from pelanggan"); 
  header('Location: http://localhost/Penjualan-master/admin-dashboard/data-pelanggan.php');
  exit;
