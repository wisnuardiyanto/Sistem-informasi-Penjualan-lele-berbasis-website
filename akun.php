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

<body>
    <?php
    SESSION_Start();
    include "config/koneksi.php";
    include "navbar.php";

    if (empty($_SESSION["pelanggan"]) or !isset($_SESSION["pelanggan"])) {
        # code...
        echo "<script>alert('Silahkan Login');</script>";
        echo "<script>location='index.php';</script>";
    }
    ?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2  style="text-align: left;">Akun Anda <br>
                    <?php echo $_SESSION['pelanggan']['nama_depan'] . " " . $_SESSION['pelanggan']['nama_belakang']; ?>
                </h2>
                    <h3></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!--================Informasi =================-->
    <section class="container-fuild shop-box-inner">
        <div class="container">
            <div class="card text-white">
                <div class="card-header ">
                    <h3>Riwayat Belanja <?php echo $_SESSION['pelanggan']['nama_depan'] . " " . $_SESSION['pelanggan']['nama_belakang']; ?></h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover" style="color : black" ;>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <Th>Total</Th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                            $ambil = $koneksi->query("select * from transaksi where id_pelanggan='$id_pelanggan' order by waktu_transaksi DESC");
                            while ($data = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $nomor;  ?></td>
                                    <td><?php echo $data['waktu_transaksi'];  ?></td>
                                    <td>
                                        <?php echo $data['status'];  ?>
                                        <br>
                                        <?php if (!empty($data['resi'])) : ?>
                                            Resi : <?php echo $data['resi'];  ?>
                                        <?php endif ?>
                                    </td>
                                    <td>Rp. <?php echo number_format($data['total_tagihan']);  ?></td>
                                    <td>
                                        <a href="detail-pesanan.php?id=<?php echo $data['id_transaksi'];  ?>" class="btn btn-primary">Detail</a>
                                        <a href="admin-dashboard\laporan\cetak-nota.php?id=<?php echo $data['id_transaksi'];  ?>" class="btn btn-warning">Cetak</a>
                                    </td>
                                </tr>
                            <?php $nomor++;
                            }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Informasi =================-->

    <!-- Start Footer  -->
    <?php include 'footer.php' ?>
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

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