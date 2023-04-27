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
    include 'config/koneksi.php';
    include 'navbar.php';
    ?>
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="img/banner 01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat Datang <br> Website Kami</strong></h1>
                            <p class="m-b-40">Silahkan mencari bibit yang ada inginkan</p>
                            <p><a class="btn hvr-hover" href="shop.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="img/banner 02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> <br> </strong></h1>
                            <p class="m-b-40"> </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="img/banner 03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat Datang <br> Website Kami</strong></h1>
                            <p class="m-b-40">Silahkan mencari bibit yang ada inginkan</p>
                            <p><a class="btn hvr-hover" href="shop.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop" style="padding-bottom:0px">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-3 col-md-3 col-sm-9 col-xs-9">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/category 3-4cm.jpg" alt="" />
                        <a class="btn hvr-hover" href="etalase.php?id=3">ikan lele 3-4cm</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-9 col-xs-9">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/category 5-6cm.jpg" alt="" />
                        <a class="btn hvr-hover" href="etalase.php?id=5">ikan lele 5-6cm</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-9 col-xs-9">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/category 7-8cm.jpg" alt="" />
                        <a class="btn hvr-hover" href="etalase.php?id=7">ikan lele 7-8cm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Product kami</h1>
                        <p>   </p>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                <?php
                while ($data = $tampil_produk->fetch_assoc()) { ?>
                    <div class="col-lg-3 col-md-6 special-grid ">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="new">New</p>
                                </div>
                                <img src="admin-dashboard/foto_produk/<?php echo $data['foto_produk']; ?>" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="shop-detail.php?id=<?php echo $data['id_produk']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="config/beli.php?id=<?php echo $data['id_produk']; ?> ">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?php echo $data['nama_produk']; ?></h4>
                                <h5>Rp. <?php echo $data['harga_produk']; ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Instagram Feed  -->
    <!-- <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <?php
            include 'config/koneksi.php';
            while ($data = $tampil_produk->fetch_assoc()) { ?>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="admin-dashboard/foto_produk/<?php echo $data['foto_produk']; ?>" alt="" />
                        <div class="hov-in">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div> -->
    <!-- End Instagram Feed  -->

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