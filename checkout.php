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
    include 'navbar.php';

    if (!isset($_SESSION['pelanggan'])) {
        # code...

        echo "<script>alert('Silahkan Login');</script>";
        echo "<script>location='login.php';</script>";
    }
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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Alamat Pengiriman</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="<?php print_r($_SESSION['pelanggan']['nama_depan']) ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="<?php print_r($_SESSION['pelanggan']['nama_belakang']) ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="" value="<?php print_r($_SESSION['pelanggan']['email']) ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="notelp">No Telp</label>
                                    <input type="text" class="form-control" id="notelp" placeholder="" value="<?php print_r($_SESSION['pelanggan']['no_telp']) ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" placeholder="" value="<?php print_r($_SESSION['pelanggan']['alamat']) ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputsayur1">Kode POS</label>
                                <input type="text" class="form-control" id="zip" name="kode_pos" value="<?php print_r($_SESSION['pelanggan']['kode_pos']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="inputsayur1">Alamat Pengiriman</label>
                                <textarea name="alamat_pengiriman" class="form-control" id="" rows="4"></textarea>
                            </div>
                            <hr class="mb-1">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Pengiriman</h3>
                                    </div>
                                    <div class="mb-4">
                                        <div class="custom-control custom-radio">
                                            <label class="" for="shippingOption1">Biaya Pengiriman</label> <span class="float-right font-weight-bold">Rp. 10,000</span>
                                        </div>
                                        <div class="ml-4 mb-2 small">(3-7 Hari Kerja)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Keranjang Belanja</h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        <?php $totalbelanja = 0;
                                        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                            <?php $tampil_keranjang = $koneksi->query("select * from produk where id_produk='$id_produk'");
                                            $data = $tampil_keranjang->fetch_assoc();
                                            $subtotal = $data['harga_produk'] * $jumlah;
                                            $totalbelanja += $subtotal;
                                            ?>
                                            <div class="media mb-2 border-bottom">
                                                <div class="media-body"> <a href=""><?php echo $data['nama_produk']; ?></a>
                                                    <div class="small text-muted">Rp. <?php echo number_format($data['harga_produk']); ?><span class="mx-2">|</span> Qty: <?php echo $jumlah; ?> <span class="mx-2">|</span> Subtotal: Rp. <?php echo number_format($subtotal); ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <!-- <div class="title-left">
                                        <h3>Payment</h3>
                                    </div> -->
                                    <!-- <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="LinkAja" name="paymentMethod" type="radio" class="custom-control-input" checked required value="LinkAja">
                                            <label class="custom-control-label" for="LinkAja">LinkAja (Dicek Otomatis)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Dana" name="paymentMethod" type="radio" class="custom-control-input" required value="Dana">
                                            <label class="custom-control-label" for="Dana">Dana (Dicek Otomatis)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="Ovo" name="paymentMethod" type="radio" class="custom-control-input" required value="Ovo">
                                            <label class="custom-control-label" for="Ovo">Ovo (Dicek Otomatis)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="GoPay" name="paymentMethod" type="radio" class="custom-control-input" required value="GoPay">
                                            <label class="custom-control-label" for="GoPay">GoPay (Dicek Otomatis)</label>
                                        </div>
                                    </div> -->
                                    <div class="title-left">
                                        <h3>Pesanan Anda</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Product</div>
                                        <div class="ml-auto font-weight-bold">Total</div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"> Rp. <?php echo number_format($totalbelanja); ?></div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Biaya Pengiriman</h4>
                                        <div class="ml-auto font-weight-bold"> Rp. 10,000</div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5>Grand Total</h5>
                                        <div class="ml-auto h5"> Rp. <?php echo number_format($totalbelanja + 10000); ?> </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-12 d-flex shopping-box"> <button name="bayar" class="ml-auto btn hvr-hover">Bayar</button> </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
            $kodeTransaksi = rand(100000, 999999);
            $kodeOrder = rand(1000000000, 9999999999);
            $kodeBayar = rand(10, 99);
            if (isset($_POST["bayar"])) {
                # code...
                $pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                $alamat_pengiriman = $_POST['alamat_pengiriman'];
                $metode = $_POST['paymentMethod'];
                $total = $kodeBayar + $totalbelanja + 10000;
                $waktu = date("Y-m-d");
                $koneksi->query("insert into transaksi values('$kodeTransaksi','$kodeOrder','$pelanggan','$total','null','$waktu','Pending','$alamat_pengiriman','Diambil','null')");
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    # code...
                    $tampil_keranjang = $koneksi->query("select * from produk where id_produk='$id_produk'");
                    $data = $tampil_keranjang->fetch_assoc();
                    $id = $data['id_produk'];
                    $nama = $data['nama_produk'];
                    $harga = $data['harga_produk'];
                    $koneksi->query("insert into detail_transaksi (id_transaksi,id_produk,nama_produk,harga_produk,jumlah_produk) values ('$kodeTransaksi','$id','$nama','$harga','$jumlah')");
                    $koneksi->query("update produk set stok_produk=stok_produk-$jumlah where id_produk='$id_produk'");
                
                }
                //mengosongkan keranjang
                unset($_SESSION['keranjang']);
                //tampilan dialihkan kehalaman nota dari pembelian baru
                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='http://localhost/Penjualan-master/detail-pesanan.php?id=" . $kodeTransaksi . "';</script>";
            }
            ?>
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