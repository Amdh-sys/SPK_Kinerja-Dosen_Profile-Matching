<html>
<title>Halaman Edit Matakuliah</title>

<body>
	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h2>
		<a href="<?= $_url ?>matakuliah" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar Matakuliah
	</h2><br>
	<h3 style="text-align: center;">EDIT MATAKULIAH</h3>
	<p style="text-align: center; margin-bottom: 20px;"><?= $nama ?></p>

	<?php

	if (isset($_POST['submit'])) {

		extract($_POST);

		$sql = "UPDATE matakuliah SET kode='{$kode}', nama='{$nama}', sks='{$sks}', semester='{$semester}', singkatan='{$singkatan}'
		 WHERE kode='{$_id}'";
		$query = mysqli_query($koneksi, $sql);

		if ($query) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Matakuliah Berhasil Ubah',
    		type: 'success'
		});</script>";
			header("refresh:1;{$_url}matakuliah/edit/{$kode}/{$nama}");
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Matakuliah Gagal Ubah',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<form method="post">

		<div class="grid">

			<div class="row cells2">
				<div class="cell">
					<label>Kode</label>
					<div class="input-control text full-size">
						<input type="text" name="kode" value="<?= $kode ?>">
					</div>
				</div>

				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" value="<?= $nama ?>">
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Jumlah SKS</label>
					<div class="input-control text full-size">
						<input type="number" name="sks" maxlength="1" value="<?= $sks ?>">
					</div>
				</div>

				<div class="cell">
					<label>Semester</label>
					<div class="input-control text full-size">
						<input type="number" name="semester" maxlength="2" value="<?= $semester ?>">
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Singkatan</label>
					<div class="input-control text full-size">
						<input type="text" name="singkatan" value="<?= $singkatan ?>">
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