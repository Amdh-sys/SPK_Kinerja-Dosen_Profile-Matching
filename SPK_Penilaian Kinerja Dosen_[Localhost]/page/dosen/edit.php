<html>
<title>Halaman Edit Dosen</title>

<body>
	<?php
	if ($_access == 'dosen' && $_id != $_username) {
		header("location:{$_url}dosen/edit/{$_username}");
	}

	$querya = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npk='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h2>
		<a href="<?= $_url ?>dosen<?= $_access == 'dosen' ? '/view/' . $_id . '/' . urlencode($nama) : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar dosen<br>
	</h2>
	<h2 style="text-align: center;">
		EDIT PROFILE DOSEN<br>
		<?= $nama_dosen; ?>
	</h2>
	<br>

	<?php

	if (isset($_POST['submit'])) {

		extract($_POST);

		$sql = "UPDATE dosen SET npk='{$npk}', nama_dosen='{$nama}', alamat='{$alamat}', jenis_kelamin='{$jenis_kelamin}', gelar='{$gelar}' WHERE npk='{$_id}'";
		$query = mysqli_query($koneksi, $sql);

		if ($query) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Berhasil Ubah',
    		type: 'success'
		});</script>";
			header("refresh:0.5;{$_url}dosen/edit/{$npk}/{$nama}");
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Gagal Ubah',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<form method="post">

		<div class="grid">

			<div class="row cells2">
				<div class="cell">
					<label>NIDN</label>
					<div class="input-control text full-size">
						<input type="text" name="npk" value="<?= $npk ?>">
					</div>
				</div>

				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" value="<?= $nama_dosen ?>">
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Alamat</label>
					<div class="input-control text full-size">
						<input type="text" name="alamat" value="<?= $alamat ?>">
					</div>
				</div>

				<div class="cell">
					<label>Jenis Kelamin</label>
					<div class="full-size">
						<label class="input-control radio">
							<input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin == 'Laki_laki' ? 'selected' : '' ?><?php if ($field['jenis_kelamin'] == 'Laki-laki') echo 'checked' ?> required>
							<span class="check"></span>
							<span class="caption">Laki-laki</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin == 'perempuan' ? 'selected' : '' ?><?php if ($field['jenis_kelamin'] == 'Perempuan') echo 'checked' ?> required>
							<span class="check"></span>
							<span class="caption">Perempuan</span>
						</label>
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Gelar</label>
					<div class="input-control text full-size">
						<input type="text" name="gelar" value="<?= $gelar ?>">
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