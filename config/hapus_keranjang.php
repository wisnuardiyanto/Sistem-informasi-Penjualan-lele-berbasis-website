<?php
    session_start();

    include 'koneksi.php';
    $id_produk = $_GET['id'];
    $jml = $_GET['jml'];
    $totalbelanja = 0;

    $tampil_produk =$koneksi->query("select * from produk where id_produk='$id_produk'");
    $data = $tampil_produk->fetch_assoc();
    $stoklama = $data['stok_produk'];
    $stokbaru = $stoklama+$jml;

    $update_produk =$koneksi->query("update produk set stok_produk='$stokbaru' where id_produk='$id_produk'"); 

    unset($_SESSION["keranjang"][$id_produk]);
    echo "<script>alert('Produk dihapus dari keranjang');</script>";
    echo "<script>location='../cart.php';</script>";
