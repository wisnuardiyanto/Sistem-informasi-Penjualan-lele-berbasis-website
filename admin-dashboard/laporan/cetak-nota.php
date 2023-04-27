<?php
ob_start();
require 'fpdf184/fpdf.php';
include '../config/koneksi.php';

class myPDF extends FPDF
{
    function header()
    {
        // $this->Image('../logo.jpg',30,6,30);
        $this->SetLineWidth(1);
        $this->Line(20, 15, 315, 15);

        $this->SetLineWidth(1);
        $this->Line(20, 200, 315, 200);

        $this->SetLineWidth(1);
        $this->Line(20, 15, 20, 200);

        $this->SetLineWidth(1);
        $this->Line(315, 15, 315, 200);

        $this->Ln();
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(220, 10, '', 0, 1, 'C');
        $this->Cell(320, 10, 'SISTEM INFORMASI PENJUALAN IKAN LELE', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 18);
        $this->Cell(320, 10, 'Usaha Pembibitan Lele Lancar Ajeg', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(320, 8, 'Dk. Garingan rt12/rw05 Ds. Tlingsing Kecamatan Cawas Kabupaten Klaten', 0, 0, 'C');
        $this->Ln();
        $this->SetLineWidth(1);
        $this->Line(30, 51, 305, 51);
        $this->SetLineWidth(0);
        $this->Line(30, 52, 305, 52);
        $this->Ln();
        $this->SetFont('Times', 'B', 20);
        $this->Cell(320, 10, 'NOTA PESANAN', 0, 0, 'C');
        $this->Ln();
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function ttd()
    {
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(100);
        $this->Cell(100, 5, 'Klaten, ' . date('d F Y'), 0, 1, 'C');
        $this->Cell(100);
        $this->Cell(100, 5, 'Pemilik Usaha Budidaya Ikan Lele', 0, 1, 'C');
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Cell(100);
        $this->Cell(100, 5, 'Wisnu Ardiyanto', 0, 1, 'C');
    }
    function headerTable()
    {
        $this->SetFillColor(24, 2440, 23);
        $this->SetLeftMargin(10);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(64, 10, 'Produk', 1, 0, 'C');
        $this->Cell(64, 10, 'Jumlah', 1, 0, 'C');
        $this->Cell(64, 10, 'Harga', 1, 0, 'C');
        $this->Cell(64, 10, 'Total', 1, 0, 'C');
        $this->Ln();
    }
    function viewHari($koneksi)
    {
        $this->id = $_GET['id'];
        $this->SetFont('Times', '', 12);
        $tampil_transaksi = $koneksi->query("select * from transaksi join pelanggan on transaksi.id_pelanggan=pelanggan.id_pelanggan where transaksi.id_transaksi='$this->id'");
        $no = 1;
        while ($data = $tampil_transaksi->fetch_assoc()) {

            $this->SetFillColor(24, 2440, 23);
            $this->SetFont('Times', 'B', 12);
            $this->SetLeftMargin(40);
            $this->Cell(90, 5, 'Info Pesanan', 0, 0, 'L');
            $this->Cell(90, 10, 'Alamat Tagihan', 0, 0, 'L');
            $this->Cell(90, 10, 'Alamat Pengiriman', 0, 0, 'L');
            $this->Ln();

            $this->Cell(30, 5, 'ID Transaksi', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['id_transaksi'], 0, 0, 'L');
            $this->Cell(30, 5, 'Nama', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['nama_depan'] . " " . $data['nama_belakang'], 0, 0, 'L');
            $this->Cell(30, 5, 'Nama', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['nama_depan'] . " " . $data['nama_belakang'], 0, 0, 'L');
            $this->Ln();


            $this->Cell(30, 5, 'Tanggal', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['waktu_transaksi'], 0, 0, 'L');
            $this->Cell(30, 5, 'No. Telp', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['no_telp'], 0, 0, 'L');
            $this->Cell(30, 5, 'No. Telp', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['no_telp'], 0, 0, 'L');
            $this->Ln();

            $this->Cell(30, 5, 'Total', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, "Rp." .$data['total_tagihan'], 0, 0, 'L');
            $this->Cell(30, 5, 'Alamat', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, substr($data['alamat'],0,15), 0, 0, 'L');
            $this->Cell(30, 5, 'Alamat', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['pdf_url'], 0, 0, 'L');
            $this->Ln();

            $this->Cell(30, 5, '', 0, 0, 'L');
            $this->Cell(10, 5, '', 0, 0, 'L');
            $this->Cell(50, 5, '', 0, 0, 'L');
            $this->Cell(30, 5, 'Kode POS', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['kode_pos'], 0, 0, 'L');
            $this->Cell(30, 5, 'Status', 0, 0, 'L');
            $this->Cell(10, 5, ':', 0, 0, 'L');
            $this->Cell(50, 5, $data['status'], 0, 0, 'L');
            $this->Ln();
            $this->Ln();
        }
    }

    function detail($koneksi)
    {
        // $this->hari = $_POST['tanggal'];
        $this->SetFont('Times', '', 9);

        $this->SetLeftMargin(40);
        $tampil_transaksi = $koneksi->query("select *,(detail_transaksi.harga_produk*detail_transaksi.jumlah_produk) as subtotal  from detail_transaksi join produk on detail_transaksi.id_produk=produk.id_produk where detail_transaksi.id_transaksi='$this->id'");
        $no = 1;
        while ($data = $tampil_transaksi->fetch_assoc()) {

            $this->SetFillColor(24, 2440, 23);
            $this->Cell(64, 10, $data['nama_produk'], 1, 0, 'C');
            $this->Cell(64, 10, $data['jumlah_produk'] . ' x', 1, 0, 'C');
            $this->Cell(64, 10, "Rp." .($data['harga_produk']), 1, 0, 'C');
            $this->Cell(64, 10, "Rp." .($data['subtotal']), 1, 0, 'C');
            $this->Ln();
        }
    }

    function detail1($koneksi)
    {
        // $this->hari = $_POST['tanggal'];
        $this->SetFont('Times', '', 9);

        $this->SetLeftMargin(40);
        $tampil_transaksi = $koneksi->query("select *,sum(detail_transaksi.harga_produk*detail_transaksi.jumlah_produk) as subtotal from detail_transaksi join transaksi on detail_transaksi.id_transaksi=transaksi.id_transaksi where detail_transaksi.id_transaksi='$this->id'");
        $no = 1;
        $data = $tampil_transaksi->fetch_assoc(); {

            $this->SetFillColor(24, 2440, 23);
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, 'Subtotal', 1, 0, 'C');
            $this->Cell(64, 10, "Rp. ".$data['subtotal'], 1, 0, 'C');
            $this->Ln();
        }
    }

    function detail2($koneksi)
    {
        // $this->hari = $_POST['tanggal'];
        $this->SetFont('Times', '', 9);

        $this->SetLeftMargin(40);
        $tampil_transaksi = $koneksi->query("select * from detail_transaksi join transaksi on detail_transaksi.id_transaksi=transaksi.id_transaksi where detail_transaksi.id_transaksi='$this->id'");
        $no = 1;
        $data = $tampil_transaksi->fetch_assoc(); {


            $this->SetFillColor(24, 2440, 23);
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, 'Kode Bayar', 1, 0, 'C');
            $this->Cell(64, 10, "Rp. ".substr($data['total_tagihan'],-2), 1, 0, 'C');
            $this->Ln();

            $this->SetFillColor(24, 2440, 23);
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, 'Ongkos Kirim', 1, 0, 'C');
            $this->Cell(64, 10, 'Rp. 10000', 1, 0, 'C');
            $this->Ln();

            $this->SetFillColor(24, 2440, 23);
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, ' ', 1, 0, 'C');
            $this->Cell(64, 10, 'Total', 1, 0, 'C');
            $this->Cell(64, 10, "Rp. ".($data['total_tagihan']), 1, 0, 'C');
            $this->Ln();
        }
    }
}
ob_end_clean();
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'LEGAL', 0);
$pdf->viewHari($koneksi);
$pdf->headerTable();
$pdf->detail($koneksi);
$pdf->detail1($koneksi);
$pdf->detail2($koneksi);
$pdf->Output();
