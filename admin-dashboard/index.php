<?php
session_start();
if (!isset($_SESSION['admin'])) {
  # code...
  echo "<script> alert('Silahkan Login');</script>";
  echo "<script>location='login.php';</script>";
}
include 'config/koneksi.php';
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
          <?php
          if ($_SESSION['admin']['tipe_login'] == 'A') {
          ?>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Input Data</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="input-produk.php">input Produk</a></li>
                  <li class="nav-item"><a class="nav-link" href="input-pelanggan.php">input Pelanggan</a></li>
                  <li class="nav-item"><a class="nav-link" href="input-kategori.php">input Kategori</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="data-produk.php">input Produk</a></li>
                  <li class="nav-item"><a class="nav-link" href="data-pelanggan.php">input Pelanggan</a></li>
                  <li class="nav-item"><a class="nav-link" href="data-kategori.php">input Kategori</a></li>
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
          <?php
            # code...
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="input-admin.php">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Input Admin</span>
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
          <?php
          }
          ?>
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
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Pendapatan</p>
                            <h3 class="rate-percentage">Rp. <?php $data1 = $hitung_pendapatan->fetch_assoc();
                                                            echo number_format($data1['pendapatan']);  ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">transaksi</p>
                            <h3 class="rate-percentage"><?php $data = $total_transaksi->fetch_assoc();
                                                        echo number_format($data['total_transaksi']);  ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">Stok</p>
                            <h3 class="rate-percentage"><?php $data = $stok->fetch_assoc();
                                                        echo number_format($data['total_stok']);  ?> Bibit</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pelanggan</p>
                            <h3 class="rate-percentage"><?php $data = $total_pelanggan->fetch_assoc();
                                                        echo number_format($data['total_pelanggan']);  ?></h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <p class="text-danger d-flex"><span></span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                            <p class="text-success d-flex"><span></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Detail Penjualan</h4>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                    <h2 class="me-2 fw-bold">Rp. <?php echo number_format($data1['pendapatan']);  ?></h2>
                                  </div>
                                  <div class="me-3">
                                    <div id="marketing-overview-legend"></div>
                                  </div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">Detail Penjualan</h4>
                                    </div>
                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
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
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="footer-copyright">
            <p class=class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">All Rights Reserved. &copy; 2022 <a href="index.php">Website</a> Design By :
              <a href="https://html.design/">Lancar Ajeg</a>
            </p>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="index.php" target="_blank">admin </a> from Penjualan</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer>
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
  <!-- <script src="js/dashboard.js"></script> -->
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <?php

  $data_penjualan = mysqli_query($koneksi, "select month(waktu_transaksi) as tanggal,COUNT(total_tagihan) as total
      from transaksi
      group by month(waktu_transaksi) ASC limit 12");
  $data_total = array();
  while ($data = mysqli_fetch_array($data_penjualan)) {
    $data_total[] = $data['total']; // Memasukan total ke dalam array
    $data_bulan[] = $data['tanggal']; // Memasukan total ke dalam array
  }

  $data_transaksi = mysqli_query($koneksi, "SELECT COUNT(*) as total
        FROM `transaksi` WHERE status='Selesai' or status='Dikirim' or status='Dibayar' ORDER BY `waktu_transaksi` DESC");
  $data1 = $data_transaksi->fetch_assoc();
  $selesai = $data1['total'];

  $data_transaksi1 = mysqli_query($koneksi, "SELECT COUNT(*) as total
          FROM `transaksi` WHERE status='Gagal' or status='Pending' ORDER BY `waktu_transaksi` DESC");
  $data2 = $data_transaksi1->fetch_assoc();
  $expire = $data2['total'];


  ?>
  <script>
    (function($) {
      'use strict';
      $(function() {


        if ($("#marketingOverview").length) {
          var marketingOverviewChart = document.getElementById("marketingOverview").getContext('2d');
          var marketingOverviewData = {
            labels: <?php echo json_encode($data_bulan) ?>,
            datasets: [{
              label: 'Total Transaksi',
              data: <?php echo json_encode($data_total) ?>,
              backgroundColor: "#1F3BB3",
              borderColor: [
                '#1F3BB3',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill

            }]
          };

          var marketingOverviewOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                gridLines: {
                  display: true,
                  drawBorder: false,
                  color: "#F0F0F0",
                  zeroLineColor: '#F0F0F0',
                },
                ticks: {
                  beginAtZero: true,
                  autoSkip: true,
                  maxTicksLimit: 5,
                  fontSize: 10,
                  color: "#6B778C"
                }
              }],
              xAxes: [{
                stacked: true,
                barPercentage: 0.35,
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: false,
                  autoSkip: true,
                  maxTicksLimit: 12,
                  fontSize: 10,
                  color: "#6B778C"
                }
              }],
            },
            legend: false,
            legendCallback: function(chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul>');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push('<li class="text-muted text-small">');
                text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                text.push(chart.data.datasets[i].label);
                text.push('</li>');
              }
              text.push('</ul></div>');
              return text.join("");
            },

            elements: {
              line: {
                tension: 0.4,
              }
            },
            tooltips: {
              backgroundColor: 'rgba(31, 59, 179, 1)',
            }
          }
          var marketingOverview = new Chart(marketingOverviewChart, {
            type: 'bar',
            data: marketingOverviewData,
            options: marketingOverviewOptions
          });
          document.getElementById('marketing-overview-legend').innerHTML = marketingOverview.generateLegend();
        }

        if ($("#marketingOverview-dark").length) {
          var marketingOverviewChartDark = document.getElementById("marketingOverview-dark").getContext('2d');
          var marketingOverviewDataDark = {
            labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
            datasets: [{
              label: 'Last week',
              data: [110, 220, 200, 190, 220, 110, 210, 110, 205, 202, 201, 150],
              backgroundColor: "#52CDFF",
              borderColor: [
                '#52CDFF',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill

            }, {
              label: 'This week',
              data: [215, 290, 210, 250, 290, 230, 290, 210, 280, 220, 190, 300],
              backgroundColor: "#1F3BB3",
              borderColor: [
                '#1F3BB3',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill
            }]
          };

          var marketingOverviewOptionsDark = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                gridLines: {
                  display: true,
                  drawBorder: false,
                  color: "rgba(255,255,255,.05)",
                  zeroLineColor: "rgba(255,255,255,.05)",
                },
                ticks: {
                  beginAtZero: true,
                  autoSkip: true,
                  maxTicksLimit: 5,
                  fontSize: 10,
                  color: "#6B778C"
                }
              }],
              xAxes: [{
                stacked: true,
                barPercentage: 0.35,
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: false,
                  autoSkip: true,
                  maxTicksLimit: 7,
                  fontSize: 10,
                  color: "#6B778C"
                }
              }],
            },
            legend: false,
            legendCallback: function(chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul>');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push('<li class="text-muted text-small">');
                text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                text.push(chart.data.datasets[i].label);
                text.push('</li>');
              }
              text.push('</ul></div>');
              return text.join("");
            },

            elements: {
              line: {
                tension: 0.4,
              }
            },
            tooltips: {
              backgroundColor: 'rgba(31, 59, 179, 1)',
            }
          }
          var marketingOverviewDark = new Chart(marketingOverviewChartDark, {
            type: 'bar',
            data: marketingOverviewDataDark,
            options: marketingOverviewOptionsDark
          });
          document.getElementById('marketing-overview-legend').innerHTML = marketingOverviewDark.generateLegend();
        }
        if ($("#doughnutChart").length) {
          var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
          var doughnutPieData = {
            datasets: [{
              data: [<?php echo json_encode($selesai) ?>, <?php echo json_encode($expire) ?>],
              backgroundColor: [
                "#1F3BB3",
                "#03dbfc"
              ],
              borderColor: [
                "#1F3BB3",
                "#03dbfc"
              ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
              'Selesai/Dikirim/Dibayar',
              'Gagal/Pending'
            ]
          };
          var doughnutPieOptions = {
            cutoutPercentage: 50,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            legend: false,
            legendCallback: function(chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul class="justify-content-center">');
              for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                text.push('</span>');
                if (chart.data.labels[i]) {
                  text.push(chart.data.labels[i]);
                }
                text.push('</li>');
              }
              text.push('</div></ul>');
              return text.join("");
            },

            layout: {
              padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
              }
            },
            tooltips: {
              callbacks: {
                title: function(tooltipItem, data) {
                  return data['labels'][tooltipItem[0]['index']];
                },
                label: function(tooltipItem, data) {
                  return data['datasets'][0]['data'][tooltipItem['index']];
                }
              },

              backgroundColor: '#fff',
              titleFontSize: 14,
              titleFontColor: '#0B0F32',
              bodyFontColor: '#737F8B',
              bodyFontSize: 11,
              displayColors: false
            }
          };
          var doughnutChart = new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
          });
          document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
        }


      });
    })(jQuery);
  </script>
</body>

</html>