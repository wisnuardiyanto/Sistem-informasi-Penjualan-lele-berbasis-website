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
    session_start();
    include "config/koneksi.php";
    include 'navbar.php';

    if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
        # code...
        echo "<script>alert('Keranjang kosong silahkan berbelanja');</script>";
        echo "<script>location='index.php';</script>";
    }
    ?>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalbelanja = 0;
                                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                    <?php $tampil_keranjang = $koneksi->query("select * from produk where id_produk='$id_produk'");
                                    $data = $tampil_keranjang->fetch_assoc();
                                    $subtotal = $data['harga_produk'] * $jumlah;
                                    $totalbelanja += $subtotal;
                                    ?>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <img class="img-fluid" src="admin-dashboard/foto_produk/<?php echo $data['foto_produk'] ?>" alt="" />
                                        </td>
                                        <td class="name-pr">
                                            <?php echo $data['nama_produk']; ?>
                                        </td>
                                        <td class="price-pr">
                                            <p>Rp. <?php echo number_format($data['harga_produk']); ?></p>
                                        </td>
                                        <td class="quantity-box">
                                            <?php echo $jumlah; ?></td>
                                        <td class="total-pr">
                                            <p>Rp. <?php echo number_format($subtotal); ?></p>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="config/hapus_keranjang.php?id=<?php echo $id_produk; ?>&jml=<?php echo $jumlah; ?>">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Ringkasan Pesanan</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rp. <?php echo number_format($totalbelanja); ?></div>
                        </div>
                        <div class="d-flex">
                            <h4>Biaya Pengiriman</h4>
                            <div class="ml-auto font-weight-bold">Rp. 10,000 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rp. <?php echo number_format($totalbelanja + 10000); ?></div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

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