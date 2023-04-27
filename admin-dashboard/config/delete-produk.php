<?php
  include 'koneksi.php';

$img = "SELECT foto_produk FROM produk WHERE id_produk = '$_GET[id]'";
 $result = $koneksi->query($img);
 $row = $result->fetch_assoc();
 if(file_exists("../foto_produk/$row[foto_produk]")){
 unlink("../foto_produk/$row[foto_produk]");
 }

    $delete_produk= $koneksi->query("delete from produk where id_produk='$_GET[id]'");
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Sukses - Data Terhapus
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  ";
  $tampil_produk =$koneksi->query("select * from produk"); 
  header('Location: http://localhost/Penjualan-master/admin-dashboard/data-produk.php');
  exit;
?>   