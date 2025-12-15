<?php
require __DIR__ . '/fpdf/fpdf.php';

$mysqli = new mysqli("localhost", "root", "", "latihan");
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$pdf = new FPDF('L','mm','A5');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'DATA MAHASISWA INFORMATIKA',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'DAFTAR MAHASISWA',0,1,'C');

$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,7,'NO',1,0,'C');
$pdf->Cell(120,7,'NAMA',1,0,'C');
$pdf->Cell(50,7,'NRP',1,1,'C');

// Isi tabel
$pdf->SetFont('Arial','',10);
$no = 1;
$query = $mysqli->query("SELECT * FROM siswa");

while ($row = $query->fetch_assoc()) {
    $pdf->Cell(20,7,$no++,1,0,'C');
    $pdf->Cell(120,7,$row['nama'],1,0);
    $pdf->Cell(50,7,$row['nrp'],1,1,'C');
}


$pdf->Output('I','laporan_siswa.pdf');
