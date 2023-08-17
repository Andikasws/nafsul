<?php include './conn/koneksi.php' ?>
<div class="card" style="padding: 50px; width: 40%; margin: 0 auto; margin-top: 10%;">
<h3 style="text-align: center;" class="orange-text">LOGIN</h3>
<br><center><p><img src="img/OIP.jpg"></p></center>
<!--Form Login -->
	<div class="container mt-5">
		<div class="row">
			<div class="col">
				<form id='login' method="post">
					  <div class="form-group">
						<label class="form-label float-left" for="username" aria-placeholder="">Username</label>
						<input type="text" name="username" class="form-control" />
					  </div>
					  <!-- Password input -->
					  <div class="form-group">
						<label class="form-label float-left" for="password" type="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" />
					  </div>
					  <!-- Submit button -->
					  <div class="form-group mb-4">
						<button name="login" class="btn btn-warning">LOGIN</button>
					  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $ambil = $koneksi->query("SELECT * FROM petugas where username='$_POST[username]' and password='$_POST[password]'");

          $validasi = $ambil->num_rows;

          if ($validasi == 1) {
            $akun = $ambil->fetch_assoc();
            $_SESSION['admin'] = $akun;
            echo "<div class='alert alert-success text-center'>Login Sukses!</div>";
            echo "<script>location='./admin/index.php'</script>";
          } else {
            echo "<div class='alert alert-danger text-center'>Login Gagal ! Silahkan cek username dan password anda kembali');</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
          }
		
        }
        ?>
