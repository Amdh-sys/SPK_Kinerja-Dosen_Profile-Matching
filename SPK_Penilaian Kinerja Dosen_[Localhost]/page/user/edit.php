<html>
<title>Halaman Edit User</title>

<body>

	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM user WHERE id='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	$queryKaprodi = mysqli_query($koneksi, "SELECT * FROM user WHERE status='kaprodi'");
	?>
	<h2>
		<a href="<?= $_url ?>user" class="mif-arrow-left mif-2x"><span></span></a>
		Dashboard
	</h2>
	<h3 style="text-align: center;">EDIT USER</h3>
	<p style="text-align: center;margin-bottom: 20px;"><?= $nama ?></p>

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
				header("refresh:1;{$_url}user/edit/{$_id}/{$nama}");
			} else if ($status == 'admin' or 'mahasiswa' or 'dosen') {
				$setdb = array("username='{$username}'", "nama='{$nama}'");
				if ($password != null)
					$setdb[] = "password=('{$password}')";
				$setdb = implode(',', $setdb);
				$sql = "UPDATE user SET 
	nama='$nama', username='$username', password='$password', status='$status' WHERE id='{$_id}'";
				$query = mysqli_query($koneksi, $sql);
				if ($query) {
					echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data User Berhasil Ubah',
				type: 'success'
			});</script>";
					header("refresh:1;{$_url}user/edit/{$_id}/{$nama}");
				} else {
					echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data User Gagal Ubah',
				type: 'alert'
			});</script>";
				}
			}
		} else {
			$setdb = array("username='{$username}'", "nama='{$nama}'");
			if ($password != null)
				$setdb[] = "password=('{$password}')";
			$setdb = implode(',', $setdb);
			$sql = "UPDATE user SET 
	nama='$nama', username='$username', password='$password', status='$status' WHERE id='{$_id}'";
			$query = mysqli_query($koneksi, $sql);
			if ($query) {
				echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data User Berhasil Ubah',
				type: 'success'
			});</script>";
				header("refresh:1;{$_url}user/edit/{$_id}/{$nama}");
			} else {
				echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data User Gagal Ubah',
				type: 'alert'
			});</script>";
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
						<input type="text" name="username" value="<?= $username ?>">
					</div>
				</div>

				<div class="cell">
					<label>Password</label>
					<div class="input-control password full-size">
						<input type="password" name="password" value="<?= $password ?>" required>
					</div>
				</div>
			</div>

			<div class=" row cells2">
				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" value="<?= $nama ?>">
					</div>
				</div>

				<div class="cell">
					<label>Level</label>
					<div class="full-size">
						<label class="input-control radio">
							<input type="radio" name="status" value="admin" <?= $status == 'admin ' ? 'selected' : '' ?><?php if ($field['status'] == 'admin') echo 'checked' ?> required>
							<span class="check"></span>
							<span class="caption">Admin</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="kaprodi" <?= $status == 'kaprodi ' ? 'selected' : '' ?><?php if ($field['status'] == 'kaprodi') echo 'checked' ?> required>
							<span class="check"></span>
							<span class="caption">Kaprodi</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="dosen" <?= $status == 'dosen ' ? 'selected' : '' ?><?php if ($field['status'] == 'dosen') echo 'checked' ?> required>
							<span class="check"></span>
							<span class="caption">Dosen</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="status" value="mahasiswa" <?= $status == 'mahasiswa ' ? 'selected' : '' ?><?php if ($field['status'] == 'mahasiswa') echo 'checked' ?> required>
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