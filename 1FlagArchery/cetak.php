<?php
include ('fpdf181/fpdf.php');
include "koneksi.php";

//max width total = 190 , max total height = 266 , A4

//$pdf->Cell(width,height,data,border(1/0/L/R/T/B),new_line(0/1/2),margin(R/L/C),fill_backgroud(true/false));
//$pdf->Cell(190,260,"coba",1,0,'C');
$query_ambil_jadwal= mysqli_query($koneksi,"select * from jadwal where kode_jadwal = '".$_REQUEST['kode_jadwal']."'");
$data = mysqli_fetch_assoc($query_ambil_jadwal);
$query_nama =  mysqli_query($koneksi, "select * from peserta where kode_peserta='".$data['kode_peserta']."'");
$data_nama = mysqli_fetch_assoc($query_nama);
$query_jadwal =  mysqli_query($koneksi, "select * from kursus where kode_kursus='".$data['kode_kursus']."'");
$dataa = mysqli_fetch_assoc($query_jadwal);
$query_ajar =  mysqli_query($koneksi, "select * from pengajar where kode_pengajar='".$dataa['kode_pengajar']."'");
$data_ajar_nama = mysqli_fetch_assoc($query_ajar);

//$pdf->MultiCell(width,height, data ,border(1/0/L/R/T/B),margin(R/L/C),fill_backgroud(true/false));
//$pdf->MultiCell(190,6,"coba",1,'L',false);
$pdf = new FPDF();
$pdf->AddPage('P', 'A4');
//Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
$pdf->Image('logo1.jpg',10,10,25,25);
$pdf->SetFont('Arial','B',25);
$pdf->Cell(26);//jarak gambar

$pdf->Cell(1,13,"KLUB PANAHAN 1FLAG",0,1,'L',false); 

$pdf->SetFont('Arial','',12);
$pdf->Cell(26);//jarak gambar
$pdf->Cell(1,6,"Lapangan Komplek Timah RT 001 RW 06 Pondok Labu Cilandak Jakarta Selatan",0,1,'L',false); 

$pdf->Cell(26);//jarak gambar
$pdf->Cell(1,6,"DKI Jakarta, Pangkalan Jati Baru, Kec. Cinere, Kota Depok, Jawa Barat 16514",0,1,'L',false); 
$pdf->Ln();
$pdf->Line(10,40,200,40);
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Cell(40,6,"Kode Jadwal",0,0,'L',false); 
$pdf->Cell(130,6,": ".$data['kode_jadwal'],0,0,'L',false);
$pdf->Ln();
$pdf->Ln(); 
$pdf->Cell(40,6,"Nama Peserta",0,0,'L',false); 
$pdf->Cell(130,6,": ".$data_nama['nama'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(40,6,"Nama Kursus",0,0,'L',false); 
$pdf->Cell(130,6,": ".$dataa['nama_kursus'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(40,6,"Nama Pengajar",0,0,'L',false); 
$pdf->Cell(130,6,": ".$data_ajar_nama['nama'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(40,6,"Jenis Kursus",0,0,'L',false); 
$pdf->Cell(130,6,": ".$dataa['jenis_kursus'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(40,6,"Tanggal Kursus",0,0,'L',false); 
$pdf->Cell(130,6,": ".$dataa['tanggal'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln(); 
$pdf->Cell(40,6,"Waktu Mulai",0,0,'L',false); 
$pdf->Cell(130,6,": ".$dataa['waktu_mulai'],0,0,'L',false);
$pdf->Ln(); 
$pdf->Ln();
$pdf->Cell(40,6,"Biaya",0,0,'L',false); 
$pdf->Cell(130,6,": Rp.".$dataa['biaya'],0,0,'L',false);
$pdf->Ln();
$pdf->Line(10,145,200,145);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(1,6,"Catatan :",0,0,'L',false); 
$pdf->Ln();
$pdf->MultiCell(190,6,"Tunjukan bukti pembayaran ini pada saat kursus dan lakukan pembayaran kepada pelatih yang bertugas",0,'L',false);
$pdf->Output();

date_default_timezone_set('Asia/Jakarta');
$sekarang = date("d M Y");
$pdf->Output("I", $sekarang."_bukti_pembayaran");
?>
