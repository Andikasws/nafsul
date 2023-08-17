<div class= "container m5">
  <div class="col s12 m9">
    <h3 class="orange-text">Laporan Keuangan Layanan Nafsul Mutmainnah</h3>
  </div>
  <div class="col col -md-6"><br>
    <div class="section"></div>
      <a class="waves-effect waves-light btn blue" href="cetakuang.php"><i class="material-icons">print</i></a>
    </div>
  </div>

<!-- </div>
 
<div id="modal1" class="modal1">
    <div class="modal-content">
      <div class="col s12 input-field">
        <form method="POST" action="" class="col s12 m3">
        <label for="jmlh_iuaran">Jumlah Iuaran&nbsp;</label>
        <input type="text" name="jmlh_iuaran" id="jmlh_iuaran" class="form-control mr-sm-2">
        <label for="p_anggota">Pottongan Anggota&nbsp;</label>
        <input type="number" name="p_anggota" id="p_anggota" class="form-control mr-sm-2">
        <button type="submit" name="submit" class="btn btn-primary">Hitung</button>
      </div>
    </div>
  </div>
</form> -->
 
<!--code menampilkan data-->
  <table class="table table-bordered table-hover">
    </thead>
      <tr>
        <th>NO</th>
        <th>TANGGAL</th>
        <th>NOMOR ANGGOTA</th>
        <th>KUNJU</th>
        <th>JUMLAH IURAN</th>
        <th>POTONGAN ANGGOTA</th>
      </tr>
    </thead>
  <?php
    // perintah tampil data
    include '../conn/koneksi.php';
    $q = mysqli_query($koneksi, "SELECT * FROM registrasi");
    
    $total = 0;
    $total_potongan = 0;
    $total_iuran = 0;
    $total_semua = 0;
    $no = 1;
    
    while ($r = $q->fetch_assoc()) {
      // total adalah hasil dari harga x qty;
      $iuran = ($r['jmlh_iuran']);
      $total = ($r['jmlh_iuran'] * $r['p_anggota'])/100;
      $seluruh = $total + $iuran;
      // $semua = $total_iuran + $total_potongan ;
      // total bayar adalah penjumlahan dari keseluruhan total
      $total_potongan += $total;
      $total_iuran += $iuran;
      $total_semua += $seluruh;

  ?>

    <tr>
          <td><?= $no++ ?></td>
          <td><?php echo date('d-m-Y',strtotime($r['tanggal_aktif'])); ?></td>
          <td><?php echo $r['no_anggota']; ?></td>
          <td><?php echo $r['kunjungan']; ?></td>
          <td>Rp. <?php echo number_format($r['jmlh_iuran']) ?></td>
          <td>Rp. <?php echo number_format($total)?></td>
        </tr>
    
          <?php
          }
          ?>

          <tr>
            <th colspan="5">TOTAL IURAN </th>
            <th>Rp. <?php echo number_format($total_iuran) ?></th>
          </tr>

          <tr>
            <th colspan="5">TOTAL POTONGAN </th>
            <th>Rp. <?php echo number_format( $total_potongan) ?></th>
          </tr>

          <tr>
            <th colspan="5">TOTAL BIAYA </th>
            <th>Rp. <?php echo number_format( $total_semua) ?></th>
          </tr>
  </table>
</div>
