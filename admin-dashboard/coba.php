<?php
include 'config/koneksi.php';

      
      $data_penjualan = mysqli_query($koneksi,"select waktu_transaksi as tanggal,COUNT(total_tagihan) as total
      from transaksi
      group by month(waktu_transaksi) DESC limit 12");
      $data_total= array();
      while ($data = mysqli_fetch_array($data_penjualan)) {
          $data_total[] = $data['total']; // Memasukan total ke dalam array
        }

        $data_transaksi = mysqli_query($koneksi,"SELECT COUNT(*) as total
        FROM `transaksi` WHERE status='selesai' or status='dikirim' or status='settlement' ORDER BY `waktu_transaksi` DESC");
        $data1 = $data_transaksi->fetch_assoc();
            $selesai = $data1['total'];

          $data_transaksi1 = mysqli_query($koneksi,"SELECT COUNT(*) as total
          FROM `transaksi` WHERE status='expire' or status='pending' ORDER BY `waktu_transaksi` DESC");
            $data2 = $data_transaksi1->fetch_assoc();
            $expire = $data2['total'];

              echo json_encode($data_total) 



?>