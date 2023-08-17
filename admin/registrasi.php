<div class="containere m5">
          <div class="col s12 m9">
            <h3 class="orange-text">Pendaftaran Anggota</h3>
          </div>  
          <div class="col col-md-6">
            <div class="section"></div>
            <a class="waves-effect waves-light btn modal-trigger blue" href="#modal1"><i class="material-icons">add</i></a>

          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
					<th>No</th>
					<th>Ketua</th>
					<th>No Anggota</th>
					<th>Nama Anggota</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Pendidikan</th>
					<th>Tanggal Aktif</th>
					<th>Tanggal Non Aktif</th>
					<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		// $bil1=7;
		// $bil2=100;
		// $total=0;

		$query = mysqli_query($koneksi,"SELECT * FROM registrasi ORDER BY id_registrasi ASC");
		while ($r=mysqli_fetch_assoc($query)) { 
			?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nonma_ketua']; ?></td>
			<td><?php echo $r['no_anggota']; ?></td>
			<td><?php echo $r['nama_anggota']; ?></td>
			<td><?php echo date('d-m-Y',strtotime($r['tgl_lhr'])); ?></td>
			<td><?php echo $r['jenis_kelamin']; ?></td>
			<td><?php echo $r['pendidikan']; ?></td>
			<td><?php echo date('d-m-Y',strtotime($r['tanggal_aktif'])); ?></td>
			<td><?php echo date('d-m-Y',strtotime($r['tanggal_non'])); ?></td>
			<td><a class="btn teal modal-trigger" href="#regis_edit?id_registrasi=<?php echo $r['id_registrasi'] ?>">Edit</a> <a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" class="btn red" href="index.php?p=regis_hapus&id_registrasi=<?php echo $r['id_registrasi'] ?>">Hapus</a></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
  <!-- Modal Structure -->
  		<div id="regis_edit?id_registrasi=<?php echo $r['id_registrasi'] ?>" class="modal">
          <div class="modal-content">
            <h4>Edit</h4>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="id_registrasi">ID Registrasi</label>
					<input id="id_registrasi" type="text" name="id_registrasi" readonly value="<?php echo $r['id_registrasi']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="nonma_ketua">Nama Ketua</label>
					<input id="nonma_ketua" type="text" name="nonma_ketua" readonly value="<?php echo $r['nonma_ketua']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="no_anggota">No Anggota</label>
					<input id="no_anggota" type="number" name="no_anggota" readonly value="<?php echo $r['no_anggota']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="nama_anggpta">Nama Anggota</label>		
					<input id="nama_anggota" type="text" name="nama_anggota" readonly value="<?php echo $r['nama_anggota']; ?>"><br><br>
				</div>
				<div class="col s12 input-field">
					<p> Status
						<label>
						  <input value="STS1 (Aktif)" class="with-gap" name="status" type="radio" <?php if($r['status']=="STS1 (Aktif)"){echo "checked";} ?> />
						  <span>STS1 (Aktif)</span>
						</label>
						<label>
						  <input value="STS2 (Non Aktif)" class="with-gap" name="status" type="radio" <?php if($r['status']=="STS2 (Non Aktif)"){echo "checked";} ?> />
						  <span>STS2 (Non Aktif)</span>
						</label>
						<label>
						  <input value="STS3 (Mengundurkan Diri)" class="with-gap" name="status" type="radio" <?php if($r['status']=="STS3 (Mengundurkan Diri)"){echo "checked";} ?> />
						  <span>STS3 (Mengundurkan Diri)</span>
						</label>
					</p>
				</div>
				<div class="col s12 input-field">
					<p> Kunjungan
						<label>
						  <input value="L" class="with-gap" name="kunjungan" type="radio" <?php if($r['kunjungan']=="STS1 (Aktif)"){echo "checked";} ?> />
						  <span>L</span>
						</label>
						<label>
						  <input value="B" class="with-gap" name="kunjungan" type="radio" <?php if($r['kunjungan']=="B"){echo "checked";} ?> />
						  <span>B</span>
						</label>
					</p>
				</div>
				<div class="col s12 input-field">
					<input type="submit" name="Update" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
				if(isset($_POST['Update'])){
					$update=mysqli_query($koneksi,"UPDATE registrasi SET id_registrasi='".$_POST['id_registrasi']."',nonma_ketua='".$_POST['nonma_ketua']."',nama_anggota='".$_POST['nama_anggota']."',status='".$_POST['status']."',kunjungan='".$_POST['kunjungan']."' WHERE id_registrasi='".$r['id_registrasi']."' ");
					if($update){
						echo "<script>alert('Data Ditambahkan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        

			<div id="modal1" class="modal">
				<div class="modal-content">
					<h4>ADD</h4>
					<form method="POST">
					<div class="col s12 input-field">
							<td> KD Wilayah :</td>
							<td><label for="kd_wilayah"></label>
								<select name="kd_wilayah" id="kd_wilayah">
								<option select> --Pilih-- </option>
								<?php 
								include "koneksi.php";
								$sql = mysqli_query($koneksi,"SELECT * FROM kd_wilayah") or die (mysqli_error($$koneksi));
								while($data = mysqli_fetch_array($sql)){
								?>
									<option value="<?=$data['nama']?>"><?=$data['kode']?><?=$data['nama']?></option>
								<?php
								}
								?>
								</select>
						</div>
						<div class="col s12 input-field">
							<td> No dan Nama Ketua :</td>
							<td><label for="nonma_ketua"></label>
								<select name="nonma_ketua" id="nonma_ketua">
								<option select> --Pilih-- </option>
								<?php 
								include "..conn/koneksi.php";
								$sql = mysqli_query($koneksi,"SELECT * FROM ketua") or die (mysqli_error($$koneksi));
								while($data = mysqli_fetch_array($sql)){
								?>
									<option value="<?=$data['nama']?>"><?=$data['kode']?><?=$data['nama']?></option>
								<?php
								}
								?>
								</select>
						</div>
						<div class="col s12 input-field">
							<label for="no_anggota">No Anggota</label>
							<input id="no_anggota" type="number" name="no_anggota">
						</div>
						<div class="col s12 input-field">
							<label for="nama_anggota">Nama Anggota</label>
							<input id="nama_anggota" type="text" name="nama_anggota">
						</div>
						<div class="col s12 input-field">
							<label for="nik">Nomor KK</label>
							<input id="nik" type="number" name="nik">
						</div>
						<div class="col s12 input-field">
							<td>Tanggal Lahir</td>
							<label for="tgl_lhr"></label>
							<input id="tgl_lhr" type="date" name="tgl_lhr">
						</div>
						<div class="col s12 input-field">
							<td> Kota Lahir :</td>
							<td><label for="kota_lahir"></label>
								<select name="kota_lahir" id="kota_lahir">
								<option select> --Pilih-- </option>
								<?php 
								include "koneksi.php";
								$sql = mysqli_query($koneksi,"SELECT * FROM nma_kota") or die (mysqli_error($$koneksi));
								while($data = mysqli_fetch_array($sql)){
								?>
									<option value="<?=$data['kota']?>"><?=$data['kota']?></option>
								<?php
								}
								?>
								</select>
						</div>
						<div class="col s12 input-field">
							<label for="nama_kota">Nama Kota</label>
							<input id="nama_kota" type="text" name="nama_kota">
						</div>
						<div class="col s12 input-field">
							<td> Jenis Kelamin :</td>
							<td><label for="jenis_kelamin"></label>
								<select name="jenis_kelamin" id="jenis_kelamin">
									<option select> --Pilih-- </option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
						</div>
						<div class="col s12 input-field">
							<td> Pendidikan :</td>
							<td><label for="pendidikan"></label>
								<select name="pendidikan" id="pendidikan">
								<option select> --Pilih-- </option>
								<?php 
								include "koneksi.php";
								$sql = mysqli_query($koneksi,"SELECT * FROM pendidikan") or die (mysqli_error($$koneksi));
								while($data = mysqli_fetch_array($sql)){
								?>
									<option value="<?=$data['pndkn']?>"><?=$data['pndkn']?></option>
								<?php
								}
								?>
								</select>
						</div>
						<div class="col s12 input-field">
							<td> Pekerjaan :</td>
							<td><label for="pekerjaan"></label>
								<select name="pekerjaan" id="pekerjaan">
								<option select> --Pilih-- </option>
								<?php 
								include "koneksi.php";
								$sql = mysqli_query($koneksi,"SELECT * FROM pkrjaan") or die (mysqli_error($$koneksi));
								while($data = mysqli_fetch_array($sql)){
								?>
									<option value="<?=$data['nama']?>"><?=$data['nama']?></option>
								<?php
								}
								?>
								</select>
						</div>
						<div class="col s12 input-field">
							<td> Status Menikah :</td>
							<td><label for="status_nikah"></label>
								<select id="status_nikah" name="status_nikah">
									<option select> --Pilih-- </option>
									<option value="Menikah">Menikah</option>
									<option value="Belum Menikah">Belum Menikah</option>
								</select>
						</div>
						<div class="col s12 input-field">
							<label for="no_ktp">No KTP</label>
							<input id="no_ktp" type="number" name="no_ktp">
						</div>
						<div class="col s12 input-field">
							<label for="alamat">Alamat</label>
							<input id="alamat" type="text" name="alamat">
						</div>
						<div class="col s12 input-field">
							<label for="tlp">Telepon</label>
							<input id="tlp" type="number" name="tlp">
						</div>
						<div class="col s12 input-field">
							<input type="hidden"  id="tanggal_aktif" name="tanggal_aktif" value="<?php echo date("Y-m-d"); ?>">
						</div>
						<div class="col s12 input-field">
							<th>Tanggal Non-Aktif</th>
							<label for="tanggal_non"></label>
							<input id="tanggal_non" type="date" name="tanggal_non">
						</div>
						<div class="col s12 input-field">
							<td> Status :</td>
							<td><label for="status"></label>
								<select id="status" type="dropdown" name="status">
									<option select> --Pilih-- </option>
									<option select value="STS1 (Aktif)">STS 1 (Aktif)</option>
									<option select value="STS2 (Non Aktif)">STS 2 (Tidak Aktif)</option>
									<option select value="STS3 (Mengundurkan Diri)">STS 3 (Mengundurkan Diri)</option>
								</select>
						</div>
						<div class="col s12 input-field">
							<label for="jmlh_iuran">Jumlah Iuaran</label>
							<input id="jmlh_iuran" type="text" name="jmlh_iuran"><br>
						</div>
						<div class="col s12 input-field">
							<label for="p_anggota">Potonggan Anggota (tanpa tanda %)</label>
							<input id="p_anggota" type="text" name="p_anggota">
						</div>
						<div class="col s12 input-field">
							<td> Kunjungan</td>
							<td><label for="kunjungan"></label>
								<select id="kunjungan" type="dropdown" name="kunjungan">
									<option select> --Pilih-- </option>
									<option select value="L">L</option>
									<option select value="B">B</option>
								</select>
						</div>
						<h4> DATA KELUARGA </h4>
						<div class="col s12 input-field">
							<label for="nama_keluarga">Nama Keluarga</label>
							<input id="nama_keluarga" type="text" name="nama_keluarga">
						</div>
						<div class="col s12 input-field">
							<label for="hubungan">Hubungan</label>
							<input id="hubungan" type="text" name="hubungan">
						</div>
						<div class="col s12 input-field">
							<label for="alamat_keluarga">Alamat</label>
							<input id="alamat_keluarga" type="text" name="alamat_keluarga">
						</div>
						<div class="col s12 input-field">
							<label for="tlp_keluarga">Telepon</label>
							<input id="tlp_keluarga" type="number" name="tlp_keluarga">
						</div>
						<div class="col s12 input-field">
							<input type="submit" name="simpan" value="Simpan" class="btn right">
							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
						</div>
					</form>
				</div>
			</div>


			<?php
			if(isset($_POST['simpan'])){
				
				$password = md5($_POST['simpan']);
				$query=mysqli_query($koneksi,"INSERT INTO registrasi VALUES (NULL,'".$_POST['kd_wilayah']."','".$_POST['nonma_ketua']."','".$_POST['no_anggota']."','".$_POST['nama_anggota']."','".$_POST['nik']."','".$_POST['tgl_lhr']."','".$_POST['kota_lahir']."','".$_POST['nama_kota']."','".$_POST['jenis_kelamin']."','".$_POST['pendidikan']."','".$_POST['pekerjaan']."','".$_POST['status_nikah']."','".$_POST['no_ktp']."','".$_POST['alamat']."','".$_POST['tlp']."','".$_POST['tanggal_aktif']."','".$_POST['tanggal_non']."','".$_POST['status']."','".$_POST['jmlh_iuran']."','".$_POST['p_anggota']."','".$_POST['kunjungan']."','".$_POST['nama_keluarga']."','".$_POST['hubungan']."','".$_POST['alamat_keluarga']."','".$_POST['tlp_keluarga']."')");
				if($query){
					echo "<script>alert('Data Ditambahkan')</script>";
					echo "<script>location='index.php?p=registrasi'</script>";
				}else{
					echo"<script>alert('Data Gagal Ditambahkan')</script>";
				}
			}
			?>
          </div>
        </div>