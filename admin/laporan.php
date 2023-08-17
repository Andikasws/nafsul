        <div class="row">
          <div class="col s12 m9">
            <h3 class="orange-text">Laporan Anggota</h3>
          </div> 
          <div class="col s12 m3">
            <div class="section"></div>
            <a class="waves-effect waves-light btn blue" href="cetak.php"><i class="material-icons">print</i></a>
          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Ketua</th>
                  <th>No Anggota </th>
                  <th>Nama Anggota </th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Pendidikan</th>
                  <th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM registrasi ");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nonma_ketua']; ?></td>
			<td><?php echo $r['no_anggota']; ?></td>
			<td><?php echo $r['nama_anggota']; ?></td>
			<td><?php echo date('d-m-Y',strtotime($r['tgl_lhr'])); ?></td>
			<td><?php echo $r['jenis_kelamin']; ?></td>
			<td><?php echo $r['pendidikan']; ?></td>
			<td><a class="btn blue modal-trigger" href="#laporan?id_registrasi=<?php echo $r['id_registrasi'] ?>">More</a></td>
      

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="laporan?id_registrasi=<?php echo $r['id_registrasi'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Detail</h4>
            <div class="col s12 m6">
              <p>KD Wilayah : <?php echo $r['kd_wilayah']; ?></p>
              <p>Ketua : <?php echo $r['nonma_ketua']; ?></p>
            	<p>No Anggota : <?php echo $r['no_anggota']; ?></p>
            	<p>Nama : <?php echo $r['nama_anggota']; ?></p>
              <p>Nomor KK : <?php echo $r['nik']; ?></p>
				      <p>Tanggal Lahir : <?php echo $r['tgl_lhr']; ?></p>
              <p>Kota Lahir : <?php echo $r['kota_lahir']; ?></p>
              <p>Nama Kota : <?php echo $r['nama_kota']; ?></p>
				      <p>Jenis Kelamin : <?php echo $r['jenis_kelamin']; ?></p>
              <p>Pendidikan : <?php echo $r['pendidikan']; ?></p>
              <p>Pekerjaan : <?php echo $r['pekerjaan']; ?></p>
              <p>Status Nikah : <?php echo $r['status_nikah']; ?></p>
              <p>No KTP : <?php echo $r['no_ktp']; ?></p>
              <p>Alamat : <?php echo $r['alamat']; ?></p>
              <p>Telepon : <?php echo $r['tlp']; ?></p>
              <p>Tanggal Aktif : <?php echo $r['tanggal_aktif']; ?></p>
              <p>Tanggal Non Aktif : <?php echo $r['tanggal_non']; ?></p>
              <p>Status : <?php echo $r['status']; ?></p>
              <h4>DATA KELUARGA</h4>
              <p>Nama Keluarga : <?php echo $r['nama_keluarga']; ?></p>
              <p>Hubungan : <?php echo $r['hubungan']; ?></p>
              <p>Alamat : <?php echo $r['alamat_keluarga']; ?></p>
              <p>Telepon : <?php echo $r['tlp_keluarga']; ?></p>
            </div>
          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
		</tr>
            <?php  }
             ?>
          </tbody>
        </table>        
