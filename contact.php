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
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Have you any question?</h2>
                        <hr>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="fullname">Full name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Your Name" required data-error="Please enter your name">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="notelp">Phone</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Phone" required data-error="Please enter your name">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="subjek">Subject</label>
                                    <input type="text" placeholder="Subject" id="subjek" class="form-control" name="name" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="subjek">Subject</label>
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Send</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>
                            <center>CONTACT INFO</center>
                        </h2>
                        <hr>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Alamat: Garingan, RT12/RT05 Tlingsing <br>Kec. Cawas, Kab. Klaten, Jawa Tengah<br> Kodepos 57463 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>No. Telp: <a href="tel:+1-888705770">+62-818 0458 7567</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">Officiallancarajeg@gmail.com</a></p>
                            </li>
                            <li>
                                <p> <br> <br> <br> <br> <br> </p>
                            </li>
                        </ul>
                    </div>
                </div>
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