<html>
<title>Halaman Detail Mahasiswa</title>

<body>
	<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}mahasiswa/view/{$_username}");
	}
	?>
	<style type="text/css">
		.input-control {
			border: 1px solid #d9d9d9;
			padding: 10px;
		}
	</style>

	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h2>
		<a href="<?= $_url ?><?= $_access == 'admin' ? 'mahasiswa' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a> Daftar Mahasiswa
	</h2>
	<h4 style="text-align:center; margin-top: 20px;">
		PROFILE <?= $nama ?>
	</h4>

	<?php if (in_array($_access, array('admin', 'mahasiswa'))) : ?>
		<a href="<?= $_url ?>mahasiswa/edit/<?= $_id ?>/<?= urlencode($nama) ?>" class="button success" style="margin-bottom: 10px;">Edit Data</a>
	<?php endif; ?>

	<div class="grid">

		<div class="row cells2">
			<div class="cell">
				<label>NIM</label>
				<div class="input-control text full-size">
					<?= $nim ?>
				</div>
			</div>

			<div class="cell">
				<label>Nama</label>
				<div class="input-control text full-size">
					<?= $nama ?>
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label>Alamat</label>
				<div class="input-control text full-size">
					<?= $alamat ?>
				</div>
			</div>


			<div class="cell">
				<label>Jenis Kelamin</label>
				<div class="input-control text full-size">
					<?= $jenis_kelamin ?>
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label>Tahun Masuk</label>
				<div class="input-control text full-size">
					<?= $tahun_masuk ?>
				</div>
			</div>
			<div class="cell">

			</div>

		</div>

	</div>
</body>

</html>