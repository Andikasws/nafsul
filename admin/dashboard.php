
<h3 class="orange-text">Dahsboard</h3>

	<div class="row">
		<div class="col -sm-6 col -md-3">
		  <div class="card blue">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM registrasi WHERE status='STS1 (Aktif)'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
				?>
				<span class="card-title">STS 1 (Aktif)<b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>	

		<div class="col -sm-7 col stats">
		    <div class="card teal">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM registrasi WHERE status='STS2 (Non Aktif)'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title">STS 2(Non Aktif) <b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>
		<div class="col sm-6 col -md-3">
		    <div class="card red">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM registrasi WHERE status='STS3 (Mengundurkan Diri)'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title">STS 3(Mengundurkan Diri) <b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>
	</div>
	<h4>Menampilkan Data Berdasarkan Status</h4>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
        <label for="sel1">STATUS :</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <select type="dropdown" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
                <option select> --Pilih-- </option>
                <option select value="STS1 (Aktif)">STS 1 (Aktif)</option>
                <option select value="STS2 (Non Aktif)">STS 2 (Tidak Aktif)</option>
                <option select value="STS3 (Mengundurkan Diri)">STS 3 (Mengundurkan Diri)</option>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
    </form>

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Status</th>

        </tr>
        </thead>
        <?php

        include "../conn/koneksi.php";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $sql="SELECT * FROM registrasi where status like '%".$kata_kunci."%' or nama_anggota like '%".$kata_kunci."%' or id_registrasi like '%".$kata_kunci."%' order by nik asc";

        }else {
            $sql="select * from registrasi order by nik asc";
        }


        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nik"]; ?></td>
                <td><?php echo $data["nama_anggota"];   ?></td>
                <td><?php echo $data["jenis_kelamin"];   ?></td>
                <td><?php echo date('d-m-Y',strtotime($data["tgl_lhr"]));   ?></td>
                <td><?php echo $data["status"]; ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>