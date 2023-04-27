<?php
session_start();
$id_produk = $_GET['id'];
//jika sudaha ada produk jumlah di tambah 1 
if (isset($_SESSION['keranjang'][$id_produk])) {
    # code...
    $_SESSION['keranjang'][$id_produk] += 50;
}
//selain itu maka dibeli 50
else {
    # code...
    $_SESSION['keranjang'][$id_produk] = 50;
}
echo " <script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "  <script>location='../cart.php';</script>";
print_r($_SESSION['keranjang']);
