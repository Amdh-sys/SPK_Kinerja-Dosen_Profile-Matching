<html>
<title>Halaman Tambah Dosen</title>

<body>
	<h2>
		<a href="<?= $_url ?>dosen" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar dosen
	</h2><br>
	<h3 style="text-align: center; margin-bottom: 20px;">
		TAMBAH DOSEN
		</h4>

		<?php
		if (isset($_POST['submit'])) {
			extract($_POST);
			$QD = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npk ='{$npk}'");
			$dataQD = mysqli_num_rows($QD);
			if ($dataQD > 0) {
				echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data Dosen Sudah Ada',
				type: 'alert'
			});</script>";
			} else {
				$sql = "INSERT INTO dosen values('{$npk}', '{$nama}', '{$alamat}', '{$jenis_kelamin}', '{$gelar}')";
				$query = mysqli_query($koneksi, $sql);
				if ($query) {
					echo "<script>$.Notify({
				caption: 'Success',
				content: 'Data Dosen Berhasil Ditambah',
				type: 'success'
			});</script>";
					header("refresh:1;{$_url}dosen");
				} else {
					echo "<script>$.Notify({
				caption: 'Failed',
				content: 'Data Dosen Gagal Ditambah',
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
						<label>NIDN</label>
						<div class="input-control text full-size">
							<input type="number" name="npk">
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
						<label>Alamat</label>
						<div class="input-control text full-size">
							<input type="text" name="alamat">
						</div>
					</div>

					<div class="cell">
						<label>Jenis Kelamin</label>
						<div class="full-size">
							<label class="input-control radio">
								<input type="radio" name="jenis_kelamin" value="Laki-laki">
								<span class="check"></span>
								<span class="caption">Laki-laki</span>
							</label>
							<label class="input-control radio">
								<input type="radio" name="jenis_kelamin" value="Perempuan">
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
							<input type="text" name="gelar">
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