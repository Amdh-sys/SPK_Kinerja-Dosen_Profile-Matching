<html>
<title>Ganti Password</title>

<body>
	<h1>
		<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
		Change Password
	</h1>

	<?php
	$password = '';
	$password_repeat = '';
	if (isset($_POST['submit'])) {

		extract($_POST);

		$sql = "UPDATE user SET password=('{$password}') WHERE username='{$_username}'";

		if ($password == $password_repeat && mysqli_query($koneksi, $sql)) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Ubah Password Berhasil',
    		type: 'success'
		});</script>";
			header("refresh:1;{$_url}");
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Ubah Password Gagal.<br>Check lagi password baru dan ulangi password baru harus sama.',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<form method="post">

		<div class="grid">

			<div class="row cells2">
				<div class="cell">
					<label>Password Baru</label>
					<div class="input-control password full-size" data-role="input">
						<input type="password" name="password" value="<?= $password ?>">
						<button class="button helper-button reveal"><span class="mif-eye"></span></button>
					</div>
				</div>

				<div class="cell">
					<label>Ulangi Password Baru</label>
					<div class="input-control password full-size" data-role="input">
						<input type="password" name="password_repeat" value="<?= $password_repeat ?>">
						<button class="button helper-button reveal"><span class="mif-eye"></span></button>
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