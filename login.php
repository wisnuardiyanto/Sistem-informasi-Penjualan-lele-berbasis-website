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
    include 'config/koneksi.php';
    include 'navbar.php';
    $koneksi->query("select * from pelanggan");

    ?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Login</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Account Login</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formLogin" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Enter Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
                            </div>
                        </div>
                        <button name="login" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formRegister" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" class="form-control" id="InputName" placeholder="First Name" name="firstname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name" name="lastname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputAddress" class="mb-0">Address</label>
                                <input type="text" class="form-control" id="InputAddress" placeholder="Address" name="alamat">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputKodepos" class="mb-0">Kode Pos</label>
                                <input type="text" class="form-control" id="InputKodepos" placeholder="Kode Pos" name="kodepos">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputNotelp" class="mb-0">No Telp</label>
                                <input type="text" class="form-control" id="InputNotelp" placeholder="No Telp" name="notelp">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Email" name="email1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password1">
                            </div>
                        </div>
                        <button name="register" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li>
                                <li>Saturday: 10.00am to 08.00pm</li>
                                <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Newsletter</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a>
        </p>
    </div>
    <!-- End copyright  -->

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

<?php
//jika tombol simpan di klik
$query1 = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar1 FROM pelanggan");
$data1 = mysqli_fetch_array($query1);
$kodePelanggan = $data1['kodeTerbesar1'];
$urutan1 = (int) substr($kodePelanggan, 3, 3);
$urutan1++;
$huruf1 = "PLG";
$kodePelanggan = $huruf1 . sprintf("%03s", $urutan1);

if (isset($_POST["login"])) {
    # code...
    $koneksi  =  mysqli_connect("localhost", "root", "", "db_lele");
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $login_pelanggan = $koneksi->query("select * from pelanggan where email='$email' and password='$pass'");

    //ngitung akun yang diambil
    $akunyangcocok = $login_pelanggan->num_rows;

    //jika 1 akun yang cocok, maka boleh login
    if ($akunyangcocok == 1) {
        # code... login
        $akun = $login_pelanggan->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('Anda Sukses Login');</script>";
        if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
            # code...
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>location='cart.php';</script>";
        }
    } else {
        # code... gagal login
        echo "<script>alert('Anda Gagal Login, periksa akun Anda');</script>";
        echo "<script>location='login.php';</script>";
    }
} elseif (isset($_POST['register'])) {
    # code...
    $nama_depan = $_POST['firstname'];
    $nama_belakang = $_POST['lastname'];
    $alamat = $_POST['alamat'];
    $kode_pos = $_POST['kodepos'];
    $no_telp = $_POST['notelp'];
    $email = $_POST['email1'];
    $password = $_POST['password1'];

    if (empty($nama_depan) or empty($nama_belakang) or empty($alamat) or empty($kode_pos) or empty($no_telp) or empty($email) or empty($password)) {
        echo "<script>alert('data belum di isi');</script>";
    } else {

        $ambil = $koneksi->query("select * from pelanggan where email='$email'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok == 1) {
            # code...
            echo "<script>alert('email telah digunakan');</script>";
            echo "<script>location='login.php';</script>";
        } else {
            # code...

            $koneksi->query("insert into pelanggan(id_pelanggan,nama_depan,nama_belakang,alamat,kode_pos,no_telp,email,password) 
    values('$kodePelanggan','$nama_depan','$nama_belakang','$alamat','$kode_pos','$no_telp','$email','$password')");

            echo "<script>alert('Registrasi sukses, silahkan login');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
}
?>