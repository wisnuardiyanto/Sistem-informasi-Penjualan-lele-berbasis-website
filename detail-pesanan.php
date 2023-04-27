<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Website Penjualan</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
SESSION_Start();
include "config/koneksi.php";
include 'navbar.php';
$nota = $koneksi->query("select * from transaksi join pelanggan on transaksi.id_pelanggan=pelanggan.id_pelanggan where transaksi.id_transaksi='$_GET[id]'");
$data = $nota->fetch_assoc();
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    # code...

    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
//pelanggan yang beli harus pelanggan yang login
//id pelanggan yang beli
$id_pelanggan = $data['id_pelanggan'];
//id pelanggan yang login
$id_login = $_SESSION['pelanggan']['id_pelanggan'];
if ($id_pelanggan !== $id_login) {
    # code...
    echo "<script>alert('Anda harus Login, periksa akun Anda');</script>";
    echo "<script>location='akun.php';</script>";
    exit();
}
?>

<body>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Detail Pesanan</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Account</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!--================Order Details Area =================-->
    <section class="container-fuild shop-box-inner">
        <div class="container">
            <?php
            if (($data['status'] == 'Pending') and ($data['metode_pembayaran'] == 'null')){
            ?>
                <div class="alert alert-warning">
                    Silahkan melakukan pembayaran <b> Rp. <?php echo number_format($data['total_tagihan']); ?></b> ke <br>
                    <strong>BRI 673501017757536 AN. WISNU ARDIYANTO</strong>
                </div>
            <?php
            }
            elseif (($data['status'] == 'Pending') and ($data['metode_pembayaran'] != 'null')){
            ?>
                <div class="alert alert-warning">
                    
                    <strong>Pembayaran anda sedang diproses</strong>
                </div>
            <?php
            } elseif (($data['metode_pembayaran'] == '01')) {
                # code...
            ?>
                <div class="alert alert-danger">
                    
                    <strong>Pembayaran Gagal</strong>
                </div>
            <?php
            }
                ?>
            <div class="card text-white">
                <div class="card-header">
                    <h3>Detail Transaksi</h3>
                </div>
                <div class="row card-body link">
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>info Pesanan</h4>
                            <ul class="list">
                                <li><a href="#"><span>ID Transaksi</span> : <?php echo $data['id_transaksi']; ?></a></li>
                                <li><a href="#"><span>Tanggal</span> : <?php echo $data['waktu_transaksi']; ?></a></li>
                                <li><a href="#"><span>Total</span> : Rp. <?php echo number_format($data['total_tagihan']); ?></a></li>
                                <!-- <li><a href="#"><span>Metode Bayar</span> : <?php echo $data['metode_pembayaran']; ?></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Alamat Tagihan</h4>
                            <ul class="list">
                                <li><a href="#"><span>Nama</span> : <?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></a></li>
                                <li><a href="#"><span>Nomor Telepon</span> : <?php echo $data['no_telp']; ?></a></li>
                                <li><a href="#"><span>Alamat</span> : <?php echo $data['alamat']; ?></a></li>
                                <li><a href="#"><span>Kode POS </span> : <?php echo $data['kode_pos']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Alamat Pengiriman</h4>
                            <ul class="list">
                                <li><a href="#"><span>Nama</span> : <?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?></a></li>
                                <li><a href="#"><span>Nomor Telepon</span> : <?php echo $data['no_telp']; ?></a></li>
                                <li><a href="#"><span>Alamat</span> : <?php echo $data['pdf_url']; ?></a></li>
                                <li><a href="#"><span>Status </span> : <?php echo $data['status']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-header ">
                    <h3>Detail Pesanan</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" style="color: black ;">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ongkir = 10000;
                                $ambil = $koneksi->query("select * from detail_transaksi join produk on detail_transaksi.id_produk=produk.id_produk where detail_transaksi.id_transaksi='$_GET[id]'");
                                ?>
                                <?php while ($data_detail = $ambil->fetch_assoc()) { ?>
                                    <tr>
                                        <td>
                                            <p><?php echo $data_detail['nama_produk']; ?></p>
                                        </td>
                                        <td>
                                            <p>x <?php echo $data_detail['jumlah_produk']; ?></p>
                                        </td>
                                        <td>
                                            <p>Rp. <?php echo number_format($subtotal = $data_detail['harga_produk'] * $data_detail['jumlah_produk']); ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p>Subtotal</p>
                                    </td>
                                    <td>
                                        <p>Rp. <?php echo number_format($data['total_tagihan'] - $ongkir); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p>Ongkos Kirim</p>
                                    </td>
                                    <td>
                                        <p>Rp. 10.000</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <b>TOTAL</b>
                                    </td>
                                    <td>
                                        <b>Rp. <?php echo number_format($data['total_tagihan']); ?></b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
          
            <?php if (($data['status'] == 'Pending') and ($data['metode_pembayaran'] == 'null')) { ?>
                <form method="post" enctype="multipart/form-data">
                    <label for="fotoproduk">Upload Bukti pembayaran</label>
                    <input class="form-control" id="foto_produk" type="file" name="file_upload" accept="image/*" style="width:30%">
                    <button class="btn hvr-hover" name="Bayar">Bayar</button>
                </form>
                <?php
                
                if (isset($_POST['Bayar'])) {
                    # code...
                    
                    $error = $_FILES["file_upload"]["error"];
                    $nama_folder = "bukti_pembayaran";
                    $tmp    = $_FILES["file_upload"]["tmp_name"];
                    $nama_file    = $_FILES["file_upload"]["name"];
                    $path_file    = "$nama_folder/$nama_file";
                    $upload_gagal = false;
                    // cek apakah terdapat file dengan nama yang sama
                    if (file_exists($path_file)) {
                        $pesan_error = "File dengan nama sama sudah ada di server <br>";
                        $upload_gagal = true;
                    }
                    // cek apakah ukuran file tidak melebihi 700KB (716800 byte)
                    $ukuran_file = $_FILES["file_upload"]["size"];
                    if ($ukuran_file > 716800) {
                        $pesan_error .= "Ukuran file melebihi 700KB <br>";
                        $upload_gagal = true;
                    }
                    // cek apakah yang diupload adalah file gambar
                    $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
                    if ($check === false) {
                        $pesan_error .= "Mohon upload file gambar (gif, png, jpg)<br>";
                        $upload_gagal = true;
                    }
                    if (!$upload_gagal and move_uploaded_file($tmp, $path_file)) {
                        # code...
                        $query = "update transaksi set metode_pembayaran='$nama_file' where id_transaksi='$data[id_transaksi]'";
                        if (mysqli_query($koneksi, $query)) {
                            echo "<script> alert('Berhasil Terbayar');</script>";
                            echo "<meta http-equiv='refresh' content='1;url=http://localhost/penjualan-master/detail-pesanan.php?id=".$data['id_transaksi']."'>";
                        } else {
                            # code...
                            $pesan_error = "Gagal Tersimpan";
                            echo $pesan_error;
                        }
                    } else {
                        $pesan_error .= "File gagal di upload";
                        echo $pesan_error;
                    }
                } 
                ?>
            <?php } elseif ($data['status'] == 'Dibayar') { ?>
            <?php } elseif ($data['status'] == 'Dikirim') { ?>
                <a href="config/pesanan-diterima.php?id=<?= $data['id_transaksi']; ?>" class="btn hvr-hover">Pesanan Diterima</a>
            <?php } elseif ($data['status'] == 'Selesai') { ?>
            <?php } ?>
        </div>
    </section>
    <!--================End Order Details Area =================-->

    <!-- Start Footer  -->
    <?php include 'footer.php' ?>
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <!-- End footer Area -->
    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>