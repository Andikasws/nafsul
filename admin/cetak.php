<?php
require('../pdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');

class PDF extends FPDF{    
	// Page header
	function Header()
	{
		// Logo
		$this->Image('../img/RSJIPK.jpg',10,8,69);
		$this->Image('../img/paripurna.jpg',225,10,50);
		// Arial bold 15'
		$this->SetFont('Arial','B',10);
		// Move to the right
		$this->SetLineWidth(1);
		$this->Ln();
		$this->Cell(0,5,'RUMAH SAKIT ISLAM JAKARTA PONDOK KOPI',0,5, 'C');
		$this->Ln(3);
		$this->SetFont('Arial','B',9);
		$this->Cell(0,0, 'JL.PONDOK KOPI JAKARTA TIMUR - INDONESIA 13460',0,0, 'C');
		$this->Ln(5);
		$this->Cell(0,0, 'TLP 021 8630654 Ext 4109 / 4110 FAX 021-8611101 EMAIL :Rsijpondokkopi.Co.Id ',0,0, 'C');
		$this->Ln(20);
		$this->SetlineWidth(0);
		$this->Line(10,31,250,31);
	}
	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		$this->SetlineWidth(0);
		$this->Line(10,31,282,31);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
		$this->Ln(4);
		$this->Cell(0,10,('Dicetak Pada : ').date('F j, Y, g:i a'),0,0,'C');
	}
	}	

// Instanciation of inherited class
$pdf = new PDF('L');
$pdf->AddPage('');
// $pdf->SetWidths(Array(10,70,40,25,40));
// $pdf->SetLineHeight(5);
$pdf->Cell(0,0,'LAPORAN NAFSUL MUTMAINNAH',0,0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(7,6,'NO',1,0, 'C');
$pdf->Cell(50,6,'NAMA ANGGOTA',1,0, 'C');
$pdf->Cell(40,6,'NO KK',1,0, 'C');
$pdf->Cell(35,6,'NO KTP',1,0,'C');
$pdf->Cell(105,6,'ALAMAT',1,0,'C');
$pdf->Cell(41,6,'STATUS',1,0,'C');
$pdf->SetFont('Times','',10);
$pdf->ln();
 
//koneksi ke database
$mysqli = new mysqli("localhost","root","","nafsul");
$no = 1;
$tampil = mysqli_query($mysqli, "SELECT * FROM registrasi");

while($hasil=mysqli_fetch_array($tampil)){
 	$cellWidth=105; //lebar sel
	$cellHeight=5; //tinggi sel satu baris normal
	
	//periksa apakah teksnya melibihi kolom?
	if($pdf->GetStringWidth($hasil['alamat']) < $cellWidth){
		$line=1;
		//jika tidak, maka tidak melakukan apa-apa
	}else{
		//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
		//dengan memisahkan teks agar sesuai dengan lebar sel
		//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
		
		$textLength=strlen($hasil['alamat']);	//total panjang teks
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
				$tmpString=substr($hasil['alamat'],$startChar,$maxChar);
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
	$pdf->Cell(50,($line * $cellHeight),$hasil['nama_anggota'],1,0);
	$pdf->Cell(40,($line * $cellHeight),$hasil['nik'],1,0);
	$pdf->Cell(35,($line * $cellHeight),$hasil['no_ktp'],1,0);
	//memanfaatkan MultiCell sebagai ganti Cell
	//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
	//ingat posisi x dan y sebelum menulis MultiCell
	$xPos=$pdf->GetX(); 
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth, $cellHeight,$hasil['alamat'],1,'L');
	
	//kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
    $pdf->Cell(41,($line * $cellHeight),$hasil['status'],1,1); //sesuaikan ketinggian dengan jumlah garis
}
$pdf->Output();
?>
