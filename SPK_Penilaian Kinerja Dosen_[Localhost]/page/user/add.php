<html>
<title>Halaman Tambah User</title>
<?php
$queryKaprodi = mysqli_query($koneksi, "SELECT * FROM user WHERE status='kaprodi'"); ?>

<body>
	<h2>
		<a href="<?= $_url ?>user" class="mif-arrow-left mif-2x"><span></span></a>
		Tambah User
	</h2>

	<h3 style="text-align: center; margin-bottom: 20px;">HALAMAN TAMBAH USER</h3>
	<?php
	if (isset($_POST['submit'])) {
		extract($_POST);
		if ($queryKaprodi->num_rows > 0) {
			if ($status == 'kaprodi') {
				echo "<script>$.Notify({
					caption: 'Failed',
					content: 'Status Kaprodi Sudah Ada',
					type: 'alert'
				});</script>";
			} else if ($status == 'mahasiswa' or 'admin' or 'dosen') {
				$sql = "INSERT INTO user(nama,username, password, status) values('{$nama}','{$username}',('{$password}'), '{$status}')";
				$query = mysqli_query($koneksi, $sql);
				if ($query) {
					echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data User Berhasil Ditambah',
				type: 'success'
			});</script>";
					header("refresh:1;{$_url}user");
				} else {
					echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data User Gagal Ditambah',
				type: 'alert'
			});</script>";
					header("refresh:1;{$_url}user/add");
				}
			}
		}
	}
	?>

	<form method="post">

		<div class="grid">

			<div class="row cells2">
				<div class="cell">
					<label>Username</label>
					<div class="input-control text full-size">
						<input type="text" name="username" required>
					</div>
				</div>

				<div class="cell">
					<label>Password</label>
					<div class="input-control text full-size">
						<input type="password" name="password" required>
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" required>
					</div>
				</div>

				<div class="cell">
					<label>Level</label>
					<div class="full-size">
						<label class="input-control radio">
							<input type="radio" name="status" value="admin" required>
							<span class="check"></span>
							<span class="caption">Admin</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="kaprodi" required>
							<span class="check"></span>
							<span class="caption">Kaprodi</span>
						</label>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="dosen" required>
							<span class="check"></span>
							<span class="caption">Dosen</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="mahasiswa" required>
							<span class="check"></span>
							<span class="caption">Mahasiswa</span>
						</label>
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<button type="submit" name="submit" class="button primary">SUBMIT</button>
				</div>
			</div>

		</div>

	</form>
</body>

</html>