<?php
 
// koneksi
$conn = new mysqli('localhost', 'root', '', 'nafsul');
 
// simpan data
if (isset($_POST['submit'])) {
$hrg = $_POST['jmlh'];
$qty = $_POST['diskon'];
 
$q = mysqli_query($conn, "INSERT INTO registrasi (jmlh_iuran, p_anggota) VALUES ('$hrg', '$qty')");
 
if($q) {
header('Location: index.php');
} else {
echo "<script>alert('Gagal menambahkan data'); window.location.href = index.php;</script>";
}
}
 
?>
<div class = "container m5">
<div class="col s12 ">
<center>
<h1>Menghitung total bayar dengan PHP</h1>
<hr/> <h2><a href="https://www.youtube.com/c/DemiTahu">Subscribe Demi Tahu </a></h2>
</center>
 
<div class="card mt-5">
<div class="card-body mx-auto">
<form method="POST" action="" class="form-inline mt-3">
<label for="jmlh_iuran">Jumlah Iuran&nbsp;</label>
<input type="number" name="jmlh_iuran" id="jmlh_iuran" class="form-control mr-sm-2">
<label>Potongan Anggota &nbsp;</label>
<input type="number" name="p_anggota" id="p_anggota" class="form-control mr-sm-2">
<button type="submit" name="submit" class="btn btn-primary">Hitung</button>
</form>
<hr/>
 
<!--code menampilkan data-->
<table class="table table-bordered mt-5">
<tr>
<th>#</th>
<th>jumlah Iuran </th>
<th>Pottongan Anggota</th>
<th>Total Potongan Anggota </th>
</tr>
 
<?php
// perintah tampil data
$q = mysqli_query($conn, "SELECT * FROM registrasi");
 
$total = 0;
$tot_bayar = 0;
$no = 1;
 
while ($r = $q->fetch_assoc()) {
// total adalah hasil dari harga x qty
$total = ($r['jmlh_iuran'] * $r['p_anggota']);
// total bayar adalah penjumlahan dari keseluruhan total
$tot_bayar += $total;
?>
 
<tr>
<td><?= $no++ ?></td>
<td><?= $r['jmlh_iuran'] ?></td>
<td><?= $r['p_anggota'] ?></td>
<td><?= $total ?></td>
</tr>
 
<?php
}
?>
 
<tr>
<th colspan="4">Total Potongan</th>
<th><?= $tot_bayar ?></th>
</tr>