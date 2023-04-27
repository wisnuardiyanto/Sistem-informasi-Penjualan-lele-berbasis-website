    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>IDR</option>
                            <option>USD</option>
                            <option>EUR</option>
                        </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Hubungi Kami <a href="https://wa.me/081804587567"> +62 818 0458 7567</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <?php
                            if (isset($_SESSION['pelanggan'])) :
                            ?>
                                <li><a href="config/logout.php"><i class="fa fa-user s_color"></i> Log Out</a></li>
                                <li><a href="akun.php"><i class="fa fa-user s_color"></i> Account</a></li>
                            <?php else : ?>
                                <li><a href="login.php"><i class="fa fa-user s_color"></i> Login</a></li>
                            <?php endif; ?>
                            <!-- <li><a href="contact.php"><i class="fas fa-headset"></i> Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Cari tempat pembelian bibit ikan lele
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i>  ya disini!!! tanpa ribet tanpa harus datang kelokasi
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Dijamin Berkualitas
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Dengan Harga murah tapi bukan murahan
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Bibit sudah terstandarisasi 
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Kami hadir untuk anda Pecinta maupun Pebisnis Ikan lele
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Tunggu apalagi 
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Silahkan membeli di website penjualan kami
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo.svg" class="logo" alt="" width="350"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="etalase.php">Etalase</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href=" "></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">
                                    <?php
                                    if (empty($_SESSION["keranjang"])) {
                                        # code...
                                        echo '0';
                                    } else {
                                        echo count($_SESSION["keranjang"]);
                                    } ?></span>
                                <p>My Cart</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                        if (empty($_SESSION["keranjang"])) {
                            # code...
                        } else {
                        ?>
                            <?php $totalbelanja = 0;
                            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                <?php $tampil_keranjang = $koneksi->query("select * from produk where id_produk='$id_produk'");
                                $data1 = $tampil_keranjang->fetch_assoc();
                                $subtotal = $data1['harga_produk'] * $jumlah;
                                $totalbelanja += $subtotal;
                                ?>
                                <li>
                                    <a href="#" class="photo"><img src="admin-dashboard/foto_produk/<?php echo $data1['foto_produk'] ?>" class="cart-thumb" alt="" /></a>
                                    <h6><a href="#"><?php echo $data1['nama_produk']; ?></a></h6>
                                    <p><?php echo $jumlah; ?>x - <span class="price">Rp. <?php echo number_format($data1['harga_produk']); ?></span></p>
                                </li>
                            <?php endforeach ?>
                            <li class="total">
                                <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                                <span class="float-right"><strong>Total</strong>: Rp. <?php echo number_format($subtotal); ?></span>
                            <?php } ?>
                            </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->