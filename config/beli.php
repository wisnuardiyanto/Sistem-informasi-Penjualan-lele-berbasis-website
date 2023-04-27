<?php
session_start();
$id_produk = $_GET['id'];
include 'koneksi.php';
//jika sudaha ada produk jumlah di tambah 1 
if (isset($_SESSION['keranjang'][$id_produk])) {
    # code...
    $_SESSION['keranjang'][$id_produk] += 50;

    $tampil_produk =$koneksi->query("select * from produk where id_produk='$id_produk'");
    $data = $tampil_produk->fetch_assoc();
    $stoklama = $data['stok_produk'];
    $stokbaru = $stoklama-50;

    $update_produk =$koneksi->query("update produk set stok_produk='$stokbaru' where id_produk='$id_produk'"); 
}
//selain itu maka dibeli 50
else {
    # code...
    $_SESSION['keranjang'][$id_produk] = 50;
    
    $tampil_produk =$koneksi->query("select * from produk where id_produk='$id_produk'");
    $data = $tampil_produk->fetch_assoc();
    $stoklama = $data['stok_produk'];
    $stokbaru = $stoklama-50;

    $update_produk =$koneksi->query("update produk set stok_produk='$stokbaru' where id_produk='$id_produk'"); 
}
echo " <script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "  <script>location='../cart.php';</script>";
print_r($_SESSION['keranjang']);
