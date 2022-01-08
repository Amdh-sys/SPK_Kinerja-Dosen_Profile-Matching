<html>
<title>Halaman Detail Dosen</title>

<body>
	<?php
	if ($_access == 'dosen' && $_id != $_username) {
		header("location:{$_url}dosen/view/{$_username}");
	}
	?>
	<style type="text/css">
		.input-control {
			border: 1px solid #d9d9d9;
			padding: 10px;
		}
	</style>

	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npk='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h2>
		<a href="<?= $_url ?><?= $_access == 'admin' ? 'dosen' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar dosen
	</h2>
	<h3 style="text-align: center;">PROFILE DOSEN</h3>
	<p style="text-align: center; margin-bottom: 20px;"><?= $nama_dosen; ?></p>

	<div class="grid">

		<div class="row cells2">
			<div class="cell">
				<label>NIDN</label>
				<div class="input-control text full-size">
					<?= $npk ?>
				</div>
			</div>

			<div class="cell">
				<label>Nama</label>
				<div class="input-control text full-size">
					<?= $nama_dosen ?>
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
				<label>Gelar</label>
				<div class="input-control text full-size">
					<?= $gelar ?>
				</div>
			</div>
		</div>
	</div>
	<a href="<?= $_url ?>dosen/edit/<?= $_id ?>/<?= urlencode($nama_dosen) ?>" class="button success">Edit Profile</a>

	<div class="panel" data-role="panel">
		<div class="heading">
			<span class="title">Mengajar Matakuliah</span>
		</div>
		<div class="content">
			<?php
			$sqlb = "SELECT * FROM matakuliah 
		INNER JOIN dosen_matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
		WHERE dosen_matakuliah.dosen_npk='{$_id}'
		ORDER BY matakuliah.kode ASC";
			$queryb = mysqli_query($koneksi, $sqlb);
			?>

			<table class="table striped hovered border bordered">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>SKS</th>
						<th>Semester</th>
					</tr>
				</thead>
				<tbody>

					<?php
					if (mysqli_num_rows($queryb) > 0) :
						while ($field = mysqli_fetch_array($queryb)) :
					?>
							<tr>
								<td><?= $field['kode'] ?></td>
								<td><?= $field['nama'] ?></td>
								<td><?= $field['sks'] ?></td>
								<td><?= $field['semester'] ?></td>
							</tr>
						<?php
						endwhile;
					else :
						?>
						<tr>
							<td colspan="5">
								Data tidak ditemukan
							</td>
						</tr>
					<?php
					endif;
					?>

				</tbody>
			</table>
		</div>
	</div>
</body>

</html>