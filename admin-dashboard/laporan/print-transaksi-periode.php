<?php
ob_start();
require 'fpdf184/fpdf.php';
include '../config/koneksi.php';

class myPDF extends FPDF
{
    function header()
    {
        // $this->Image('../logo.jpg',30,6,30);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(200, 10, 'LAPORAN PENJUALAN BIBIT IKAN LELE', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 22);
        $this->Cell(200, 10, 'Usaha Pembibitan Lele Lancar Ajeg', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 14);
        $this->Cell(200, 10, 'Dk. Garingan rt12/rw05 Ds. Tlingsing Kecamatan Cawas Kabupaten Klaten', 0, 0, 'C');
        $this->Ln();
        $this->SetLineWidth(1);
        $this->Line(9, 41, 207, 41);
        $this->SetLineWidth(0);
        $this->Line(9, 42, 207, 42);
        $this->SetFont('Times', 'B', 14);
        $this->Cell(200, 15, 'LAPORAN DATA TRANSAKSI PERIODE', 0, 0, 'C');
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
        $this->Cell(100);
        $this->Cell(100, 5, 'Wisnu Ardiyanto', 0, 1, 'C');
    }
    function headerTable()
    {
        $this->SetFillColor(24, 2440, 23);
        $this->SetLeftMargin(10);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(10, 10, 'No', 1, 0, 'C');
        $this->Cell(20, 10, 'Id Transaksi', 1, 0, 'C');
        $this->Cell(20, 10, 'Id Order', 1, 0, 'C');
        $this->Cell(20, 10, 'Id Pelanggan', 1, 0, 'C');
        $this->Cell(25, 10, 'Total Tagihan', 1, 0, 'C');
        $this->Cell(25, 10, 'Bukti Pembayaran', 1, 0, 'C');
        $this->Cell(30, 10, 'Tanggal Transaksi', 1, 0, 'C');
        $this->Cell(15, 10, 'Status', 1, 0, 'C');
        $this->Cell(15, 10, 'Alamat', 1, 0, 'C');
        $this->Cell(15, 10, 'Resi', 1, 0, 'C');
        $this->Ln();
    }
    function viewHari($koneksi)
    {
        $this->hari = $_POST['tanggal'];
        $this->SetFont('Times', '', 9);
        $tampil_transaksi = $koneksi->query("select * from transaksi where waktu_transaksi='$this->hari' ");
        $no = 1;
        while ($data = $tampil_transaksi->fetch_assoc()) {
            $this->Cell(10, 10, $no++, 1, 0, 'C');
            $this->Cell(20, 10, $data['id_transaksi'], 1, 0, 'C');
            $this->Cell(20, 10, $data['id_order'], 1, 0, 'C');
            $this->Cell(20, 10, $data['id_pelanggan'], 1, 0, 'C');
            $this->Cell(25, 10, "Rp." . $data['total_tagihan'], 1, 0, 'C');
            $this->Cell(25, 10, $data['metode_pembayaran'], 1, 0, 'C');
            $this->Cell(30, 10, $data['waktu_transaksi'], 1, 0, 'C');
            $this->Cell(15, 10, $data['status'], 1, 0, 'C');
            $this->Cell(15, 10, $data['pdf_url'], 1, 0, 'C');
            $this->Cell(15, 10, $data['resi'], 1, 0, 'C');
            $this->Ln();
        }
    }
    function viewPeriode($koneksi)
    {
        $this->bulan = $_POST['bulan'];
        $this->tahun = $_POST['tahun'];
        $this->SetFont('Times', '', 9);
        $tampil_transaksi = $koneksi->query("select * from transaksi where  (month(waktu_transaksi)='$this->bulan' and year(waktu_transaksi)='$this->tahun')");
        $no = 1;
        while ($data = $tampil_transaksi->fetch_assoc()) {
            $this->Cell(10, 10, $no++, 1, 0, 'C');
            $this->Cell(20, 10, $data['id_transaksi'], 1, 0, 'C');
            $this->Cell(20, 10, $data['id_order'], 1, 0, 'C');
            $this->Cell(20, 10, $data['id_pelanggan'], 1, 0, 'C');
            $this->Cell(25, 10, "Rp." . $data['total_tagihan'], 1, 0, 'C');
            $this->Cell(25, 10, $data['metode_pembayaran'], 1, 0, 'C');
            $this->Cell(30, 10, $data['waktu_transaksi'], 1, 0, 'C');
            $this->Cell(15, 10, $data['status'], 1, 0, 'C');
            $this->Cell(15, 10, $data['pdf_url'], 1, 0, 'C');
            $this->Cell(15, 10, $data['resi'], 1, 0, 'C');
            $this->Ln();
        }
    }
}
ob_end_clean();
if (isset($_POST['hari'])) {
    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'LEGAL', 0);
    $pdf->headerTable();
    $pdf->viewHari($koneksi);
    $pdf->ttd();
    $pdf->Output();
} elseif (isset($_POST['periode'])) {
    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'LEGAL', 0);
    $pdf->headerTable();
    $pdf->viewPeriode($koneksi);
    $pdf->ttd();
    $pdf->Output();
}
