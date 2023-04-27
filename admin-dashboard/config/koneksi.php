<?php
$koneksi  =  mysqli_connect("localhost", "root", "", "db_lele");
//periksa  koneksi,  tampilkan  pesan  kesalahan  jika  gagal 6
if (!$koneksi) {
    die("Koneksi  dengan  database  gagal:  " . mysqli_connect_errno() . "  -  " . mysqli_connect_error());
} else {

    // echo "berhasil";
}
$tampil_produk = $koneksi->query("select id_produk,nama_produk,harga_produk,id_kategori,foto_produk,SUBSTR(deskripsi_produk, 1, 25) AS deskripsi_produk,stok_produk from produk");
$tampil_pelanggan = $koneksi->query("select * from pelanggan"); 
$tampil_kategori = $koneksi->query("select * from kategori"); 
$cek_pembayaran =$koneksi->query("select * from transaksi where status='Pending'");
$perlu_dikirim =$koneksi->query("select * from transaksi where status='Dibayar'");
$tampil_transaksi = $koneksi->query("select * from transaksi");
$hitung_pendapatan = $koneksi->query("SELECT SUM(total_tagihan) AS pendapatan FROM `transaksi`  WHERE ((status='Dibayar')OR(status='Dikirim')OR(status='Selesai'))
ORDER BY `transaksi`.`status` ASC;");
$total_transaksi = $koneksi->query("SELECT COUNT(*) AS total_transaksi FROM `transaksi`  
ORDER BY `transaksi`.`status` ASC;");
$stok = $koneksi->query("SELECT SUM(Stok_produk) AS total_stok FROM `produk`;");
$total_pelanggan = $koneksi->query("SELECT COUNT(*) AS total_pelanggan FROM `pelanggan`;");
$tampil_login = $koneksi->query("select * from login");
$total_kurang = $koneksi->query("SELECT COUNT(*) AS total_kurang FROM produk WHERE stok_produk <= 50;"); 
$tampil_detailtransaksi = $koneksi->query("SELECT * FROM `detail_transaksi` INNER JOIN transaksi ON detail_transaksi.id_transaksi=transaksi.id_transaksi ORDER BY `transaksi`.`waktu_transaksi` DESC");
$tampil_detail = $koneksi->query("select * from detail_transaksi");
