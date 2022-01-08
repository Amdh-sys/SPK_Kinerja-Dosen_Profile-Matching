<html>
<title>Halaman Tambah Mahasiswa</title>

<body>
	<h2 style="margin-bottom: 20px;">
		<a href="<?= $_url ?>mahasiswa" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar Mahasiswa
	</h2>
	<h3 style="text-align: center; margin-bottom: 20px;">
		TAMBAH MAHASISWA</h3>

	<?php
	if (isset($_POST['submit'])) {
		extract($_POST);
		$QM = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim ='{$nim}'");
		$dataQM = mysqli_num_rows($QM);
		if ($dataQM > 0) {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Sudah Ada',
		    type: 'alert'
		});</script>";
		} else {
			$sql = "INSERT INTO mahasiswa values('{$nim}', '{$nama}', '{$alamat}','{$jenis_kelamin}', '{$tahun_masuk}')";
			$query = mysqli_query($koneksi, $sql);
			if ($query) {
				echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data Mahasiswa Berhasil Ditambah',
				type: 'success'
			});</script>";
				header("refresh:1;{$_url}mahasiswa");
			} else {
				echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data Mahasiswa Gagal Ditambah',
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
					<label>NIM</label>
					<div class="input-control text full-size">
						<input type="text" name="nim" required>
					</div>
				</div>

				<div class="cell">
					<label>Nama</label>
					<div class="input-control text full-size">
						<input type="text" name="nama" required>
					</div>
				</div>
			</div>

			<div class="row cells2">
				<div class="cell">
					<label>Alamat</label>
					<div class="input-control text full-size">
						<input type="text" name="alamat">
					</div>
				</div>

				<div class="cell">
					<label>Jenis Kelamin</label>
					<div class="full-size">
						<label class="input-control radio">
							<input type="radio" name="jenis_kelamin" value="Laki-laki" required>
							<span class="check"></span>
							<span class="caption">Laki-laki</span>
						</label>
						<label class="input-control radio">
							<input type="radio" name="jenis_kelamin" value="Perempuan" required>
							<span class="check"></span>
							<span class="caption">Perempuan</span>
						</label>
					</div>
				</div>
			</div>


			<div class="row cells2">
				<div class="cell">
					<label>Tahun Masuk</label>
					<div class="input-control text full-size">
						<input type="text" name="tahun_masuk">
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