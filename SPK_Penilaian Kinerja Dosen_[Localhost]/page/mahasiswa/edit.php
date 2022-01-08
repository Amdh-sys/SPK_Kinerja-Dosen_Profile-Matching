<html>
<title>Halaman Edit Mahasiswa</title>

<body>
	<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}mahasiswa/edit/{$_username}");
	}

	$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h2>
		<a href="<?= $_url ?>mahasiswa<?= $_access == 'mahasiswa' ? '/view/' . $_id . '/' . urlencode($nama) : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar Mahasiswa
	</h2>
	<h4 style="margin-top: 30px; text-align: center;">HALAMAN EDIT MAHASISWA </h4>
	<p style="text-align: center; margin-bottom: 20px;"><?= $nama ?></p>

	<?php
	if (isset($_POST['submit'])) {

		extract($_POST);

		$sql = "UPDATE mahasiswa SET nim='{$nim}', nama='{$nama}', alamat='{$alamat}', jenis_kelamin='{$jenis_kelamin}', tahun_masuk='{$tahun_masuk}' WHERE nim='{$_id}'";
		$query = mysqli_query($koneksi, $sql);

		if ($query) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Ubah',
    		type: 'success'
		});</script>";
			header("refresh:1;{$_url}mahasiswa/edit/{$nim}/{$nama}");
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Ubah',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<form method="post">

		<div class="grid">

			<div class="row cells2">
				<?php if ($_access == 'admin') : ?>
					<div class="cell">
						<label>NIM</label>
						<div class="input-control text full-size">
							<input type="text" name="nim" value="<?= $nim ?>">
						</div>
					</div>
				<?php endif; ?>

				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" value="<?= $nama ?>">
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

			<?php if ($_access == 'admin') : ?>
				<div class="row cells2">
					<div class="cell">
						<label>Tahun Masuk</label>
						<div class="input-control text full-size">
							<input type="text" name="tahun_masuk" value="<?= $tahun_masuk ?>">
						</div>
					</div>

				</div>
			<?php endif; ?>

			<div class="row cells2">
				<div class="cell">
					<button type="submit" name="submit" class="button primary">SUBMIT</button>
				</div>
			</div>

		</div>

	</form>

</body>

</html>