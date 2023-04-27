<?php
session_start();
include 'config/koneksi.php';
//include 'assets/php/nomor_otomatis.php';
// include 'assets/php/assets.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin-Penjualan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.php">
                        <img src="images/logo.png" width="200" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.php">
                        <img src="images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold"><?= $_SESSION['admin']['nama'] ?></span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?= $_SESSION['admin']['nama'] ?></p>
                                <p class="fw-light text-muted mb-0"><?= $_SESSION['admin']['email'] ?></p>
                            </div>
                            <a href="config/logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Forms and Data</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Input Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="input-produk.php">Input Produk</a></li>
                                <li class="nav-item"><a class="nav-link" href="input-pelanggan.php">Input Pelanggan</a></li>
                                <li class="nav-item"><a class="nav-link" href="input-kategori.php">Input Kategori</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Table Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="data-produk.php">Data Produk</a></li>
                                <li class="nav-item"><a class="nav-link" href="data-pelanggan.php">Data Pelanggan</a></li>
                                <li class="nav-item"><a class="nav-link" href="data-kategori.php">Data Kategori</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cek-pembayaran.php">
                            <i class="mdi mdi-cash-100 menu-icon"></i>
                            <span class="menu-title">Cek Pembayaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-transaksi.php">
                            <i class="mdi mdi-send menu-icon"></i>
                            <span class="menu-title">Pengiriman</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="penjualan.php">
                            <i class="mdi mdi-cart menu-icon"></i>
                            <span class="menu-title">Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="tables">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Laporan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="laporan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="laporan/laporan-produk.php">Laporan Produk</a></li>
                                <li class="nav-item"><a class="nav-link" href="laporan/laporan-pelanggan.php">Laporan Pelanggan</a></li>
                                <li class="nav-item"><a class="nav-link" href="laporan/laporan-transaksi.php">Laporan Transaksi</a></li>
                                <li class="nav-item"><a class="nav-link" href="laporan/laporan-detail-transaksi.php">Laporan Detail Transaksi</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank">
                            <i class="mdi mdi-menu-icon"></i>
                            <span class="menu-title"> </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="../index.php">
                            <i class="mdi mdi-web menu-icon"></i>
                            <span class="menu-title">Direct to Website</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2>
                                        <center>Penjualan</center>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Cari Produk</h4>
                                    <input type="text" id="cari" class="form-control" name="cari" placeholder=" id / Nama produk [ENTER] ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Hasil Pencarian Produk</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="hasil_cari"></div>
                                        <div id="tunggu"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Keranjang Belanja</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped-hover" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Id Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Produk</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BRG002</td>
                                                    <td>Bibit Lele Lokal 3-4cm</td>
                                                    <td>
                                                        <a href="">-&nbsp;</a>
                                                        <span class="border" style="padding: 1px 30px;">100</span>
                                                        <a class="keranjang" href="">&nbsp;+</a>
                                                    </td>
                                                    <td>Rp. 350</td>
                                                    <td>Rp. 35,000</td>
                                                    <td>
                                                        <a href="" class="btn btn-danger btn-rounded btn-fw" data-toggle="tooltip" data-placement="top" title="Hapus Produk">
                                                            <i class="mdi mdi-delete" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BRG003</td>
                                                    <td>Bibit Lele Dumbo 7-8cm</td>
                                                    <td>
                                                        <a href="">-&nbsp;</a>
                                                        <span class="border" style="padding: 1px 30px;">50</span>
                                                        <a class="keranjang" href="">&nbsp;+</a>
                                                    </td>
                                                    <td>Rp. 500</td>
                                                    <td>Rp. 20,000</td>
                                                    <td>
                                                        <a href="" class="btn btn-danger btn-rounded btn-fw" data-toggle="tooltip" data-placement="top" title="Hapus Produk">
                                                            <i class="mdi mdi-delete" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="card-title">Nama Konsumen</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <span>Total Belanja</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="total_belanja" class="form-control" value="Rp. 55,000" readonly>
                                                        <br>
                                                        <button name="save" class="btn btn-primary me-1 mb-1">Checkout</button>
                                                        <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Midrtans</button>    -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- <footer class="footer">
                
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="index.php" target="_blank">admin </a> from Penjualan</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
                </div>
            </footer> -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>