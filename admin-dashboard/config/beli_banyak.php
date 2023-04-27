<?php
session_start();
    $jumlah = $_POST['jumlah'];
    $id_produk = $_POST['id'];
//jika sudaha ada produk jumlah di tambah 1 
if (isset($_SESSION['keranjang'][$id_produk])) {
    # code...
    $_SESSION['keranjang'][$id_produk]+=$jumlah;
}
//selain itu maka dibeli 1
else {
    # code...
    $_SESSION['keranjang'][$id_produk] = $jumlah;
}
  echo " <script>alert('Produk telah masuk ke keranjang belanja');</script>";
  echo "  <script>location='../cart.php';</script>";
  exit();

?>