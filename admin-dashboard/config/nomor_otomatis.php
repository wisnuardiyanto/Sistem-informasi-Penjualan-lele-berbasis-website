	<?php
	// https://www.malasngoding.com
	// menghubungkan dengan koneksi database
	include 'koneksi.php';

	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 3, 3);
	$urutan++;
	$huruf = "BRG";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);

	$query1 = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar1 FROM pelanggan");
	$data1 = mysqli_fetch_array($query1);
	$kodePelanggan = $data1['kodeTerbesar1'];
	$urutan1 = (int) substr($kodePelanggan, 3, 3);
	$urutan1++;
	$huruf1 = "PLG";
	$kodePelanggan = $huruf1 . sprintf("%03s", $urutan1);

	$query2 = mysqli_query($koneksi, "SELECT max(id_kategori) as kodeTerbesar2 FROM kategori");
	$data2 = mysqli_fetch_array($query2);
	$kodeKategori = $data2['kodeTerbesar2'];
	$urutan2 = (int) substr($kodeKategori, 3, 3);
	$urutan2++;
	$huruf2 = "KAT";
	$kodeKategori = $huruf2 . sprintf("%03s", $urutan2);

	$query3 = mysqli_query($koneksi, "SELECT max(id_login) as kodeTerbesar3 FROM login");
	$data3 = mysqli_fetch_array($query3);
	$kodeAdmin = $data3['kodeTerbesar3'];
	$urutan3 = (int) substr($kodeAdmin, 3, 3);
	$urutan3++;
	$huruf3 = "US";
	$kodeAdmin = $huruf3 . sprintf("%03s", $urutan3);

	function randomString($length)
	{
		$str        = "";
		$characters = 'abcdef123456789';
		$max        = strlen($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	$kodeTransaksi = randomString(8) . "-" . randomString(4) . "-" . randomString(4) . "-" . randomString(4) . "-" . randomString(12);


	$kodeOrder = rand(1000000000, 9999999999);
