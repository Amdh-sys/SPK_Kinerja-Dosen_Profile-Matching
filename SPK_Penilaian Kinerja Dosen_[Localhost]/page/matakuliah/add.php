<html>
<title>Halaman Tambah Matakuliah</title>

<body>
	<h2>
		<a href="<?= $_url ?>matakuliah" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar Matakuliah
	</h2><br>
	<h3 style="text-align: center; margin-bottom:20px;">
		TAMBAH MATAKULIAH
	</h3>

	<?php
	if (isset($_POST['submit'])) {
		extract($_POST);
		$QMakul = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode ='{$kode}'");
		$dataQMakul = mysqli_num_rows($QMakul);
		if ($dataQMakul > 0) {
			echo "<script>$.Notify({
			caption: 'Failed',
			content: 'Matakuliah Kode Sudah Ada',
			type: 'alert'
		});</script>";
		} else {
			$sql = "INSERT INTO matakuliah values('{$kode}', '{$nama}', '{$sks}', '{$singkatan}', '{$semester}');";
			$query = mysqli_query($koneksi, $sql);

			if ($query) {
				echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data Matakuliah Berhasil Ditambah',
				type: 'success'
			});</script>";
				header("refresh:0.5;{$_url}matakuliah");
			} else {
				echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data Matakuliah Gagal Ditambah',
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
					<label>Kode</label>
					<div class="input-control text full-size">
						<input type="text" name="kode">
					</div>
				</div>

				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama">
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Jumlah SKS</label>
					<div class="input-control number full-size">
						<input type="number" maxlength="1" name="sks">
					</div>
				</div>

				<div class="cell">
					<label>Semester</label>
					<div class="input-control text full-size">
						<input type="number" maxlength="1" name="semester">
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Singkatan</label>
					<div class="input-control text full-size">
						<input type="text" name="singkatan">
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