<?php
require('../pdf/fpdf.php');
require('../conn/function.php');

date_default_timezone_set('Asia/Jakarta');

class PDF extends FPDF{    	
	// Page header
	function Header()
	{
		// Logo
		// $this->Image('../img/OIP.jpg',10,8,69);
		// $this->Image('../img/paripurna.jpg',233,10,50);
		// Arial bold 15'
		$this->SetFont('Arial','B',10);
		// Move to the right
		$this->SetLineWidth(1);
		$this->Ln();
		$this->Cell(95,0,'LAPORAN PEMBAYARAN BERDASARKAN KUNJUNGAN',0,5, 'C');
		$this->Ln(6);
		$this->SetFont('Arial','B',18);
		$this->Cell(119,0, 'UNIT LAYANAN NAFSUL MUTMAINNAH',0,0, 'C');
		$this->Ln(6);
		$this->Cell(109,0, 'RS. ISLAM JAKARTA PONDOK KOPI',0,0, 'C');
		$this->Ln(20);
		$this->SetlineWidth(0);
		$this->Line(11,31,202,31);
        $this->SetFont('Arial','B',16);
        $this->Cell(77,10,('Laporan Bulan : ').date('F Y'),0,0,'C');
        $this->Ln(10);
    }
	
}
// Instanciation of inherited class
$pdf = new PDF('p');
$pdf->AddPage('');
// $pdf->SetWidths(Array(10,70,40,25,40));
// $pdf->SetLineHeight(5);
$pdf->SetFont('Times','B',10);
$pdf->Cell(7,6,'NO',1,0, 'C');
$pdf->Cell(20,6,'TANGGAL',1,0, 'C');
$pdf->Cell(25,6,'NO ANGGOTA',1,0, 'C');
$pdf->Cell(40,6,'NAMA ANGGOTA',1,0,'C');
$pdf->Cell(20,6,'KUNJU',1,0,'C');
$pdf->Cell(35,6,'JUMLAH IURAN',1,0,'C');
$pdf->Cell(45,6,'POTONGAN ANGGOTA',1,0,'C');
$pdf->SetFont('Times','',10);
$pdf->ln();
 
//koneksi ke database
$mysqli = new mysqli("localhost","root","","nafsul");
$total = 0;
$total_potongan = 0;
$total_iuran = 0;
$total_semua = 0;
$no = 1;
$tampil = mysqli_query($mysqli, "SELECT * FROM registrasi WHERE tanggal_aktif");

while($hasil=mysqli_fetch_array($tampil)){
		// total adalah hasil dari harga x qty;
		$iuran = ($hasil['jmlh_iuran']);
		$total = ($hasil['jmlh_iuran'] * $hasil['p_anggota'])/100;
		$seluruh = $total + $iuran;
		// $semua = $total_iuran + $total_potongan ;
		// total bayar adalah penjumlahan dari keseluruhan total
		$total_potongan += $total;
		$total_iuran += $iuran;
		$total_semua += $seluruh;
		$cellWidth=40; //lebar sel
		$cellHeight=9; //tinggi sel satu baris normal
	
	//periksa apakah teksnya melibihi kolom?
	if($pdf->GetStringWidth($hasil['nama_anggota']) < $cellWidth){
		$line=1;
		//jika tidak, maka tidak melakukan apa-apa
	}else{
		//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
		//dengan memisahkan teks agar sesuai dengan lebar sel
		//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
		$textLength=strlen($hasil['nama_anggota']);	//total panjang teks
		$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
		$startChar=0;		//posisi awal karakter untuk setiap baris
		$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
		$textArray=array();	//untuk menampung data untuk setiap baris
		$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
		
		while($startChar < $textLength){ //perulangan sampai akhir teks
			//perulangan sampai karakter maksimum tercapai
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($hasil['nama_anggota'],$startChar,$maxChar);
			}
			//pindahkan ke baris berikutnya
			$startChar=$startChar+$maxChar;
			//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
			array_push($textArray,$tmpString);
			//reset variabel penampung
			$maxChar=0;
			$tmpString='';
			
		}
		//dapatkan jumlah baris
		$line=count($textArray);
	}
	
    //tulis selnya
    $pdf->SetFillColor(255,255,255);
	$pdf->Cell(7,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
	$pdf->Cell(20,($line * $cellHeight),$hasil['tanggal_aktif'],1,0, 'C');
	$pdf->Cell(25,($line * $cellHeight),$hasil['no_anggota'],1,0, 'C');
	
	// $pdf->Cell(29,($line * $cellHeight),$hasil['nama_anggota'],1,0);
	//memanfaatkan MultiCell sebagai ganti Cell
	//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
	//ingat posisi x dan y sebelum menulis MultiCell
	$xPos=$pdf->GetX(); 
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth, $cellHeight,$hasil['nama_anggota'],1,'L');
	//kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(20,($line * $cellHeight),$hasil['kunjungan'],1,0, 'C'); //sesuaikan ketinggian dengan jumlah garis
	$pdf->Cell(35,($line * $cellHeight),'Rp. '.number_format($hasil['jmlh_iuran']),1,0);
	$pdf->Cell(45,($line * $cellHeight),$hasil['p_anggota'],1,1);
	
}
$pdf->Output();
?>