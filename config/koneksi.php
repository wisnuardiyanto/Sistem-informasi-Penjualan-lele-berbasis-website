<?php
$koneksi  =  mysqli_connect("localhost", "root", "", "db_lele");
//periksa  koneksi,  tampilkan  pesan  kesalahan  jika  gagal 6
if (!$koneksi) {
    die("Koneksi  dengan  database  gagal:  " . mysqli_connect_errno() . "  -  " . mysqli_connect_error());
}
$tampil_produk = $koneksi->query("select * from produk where stok_produk>50"); 
//$tampil_pelanggan =$koneksi->query("select * from pelanggan"); 
// $tampil_buah =$koneksi->query("select * from produk where tipe_produk='Buah'");
// $tampil_pembelian =$koneksi->query("select * from pembelian LEFT JOIN pelanggan ON pembelian.id_pembelian=pelanggan.id_pelanggan");

// $tampil_produk_terbaru =$koneksi->query("select * from produk order by id_produk DESC");
// $tampil_produk_terlaris =$koneksi->query("SELECT *,SUM(jumlah) as populer FROM `produk` as pr LEFT JOIN pembelian_produk as pp on pr.id_produk=pp.id_produk GROUP BY pr.id_produk  
// ORDER BY `populer`  DESC");
