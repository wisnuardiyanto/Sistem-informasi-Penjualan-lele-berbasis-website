<?php
session_start();

    include "koneksi.php";
    $pasar = $_GET['id'];

    $pilih_pasar =$koneksi->query("select * from pasar where kode_pasar='$pasar'"); 
    $datapasar = $pilih_pasar->fetch_assoc();
    $_SESSION['pasar'] = $datapasar['nama_pasar'];
    echo "  <script>location='../../';</script>";



?>