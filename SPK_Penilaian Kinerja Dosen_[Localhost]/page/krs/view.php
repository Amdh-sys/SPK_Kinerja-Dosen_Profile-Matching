<html>
<title>Halaman KRS Mahasiswa</title>

<body>
	<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}krs/view/{$_username}");
	}
	$nim_hash = base64_encode("$_id");
	$nim_unhash = base64_decode("$nim_hash");
	?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h2>
		<a href="<?= $_url ?><?= in_array($_access, array('admin')) ? 'krs' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
		KRS Mahasiswa
	</h2>

	<?php
	$querya = mysqli_query($koneksi, "SELECT *FROM mahasiswa WHERE nim='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>

	<div class="grid">
		<h4 style="margin-top: 30px; text-align: center;">PROGRES PENILAIAN MAHASISWA BERDASARKAN KRS</h4>
		<p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
		<div class="row cells2">
			<div class="cell">
				<label>NIM</label>
				<div class="input-control text full-size">
					<?= $nim_unhash ?>
				</div>
			</div>
			<div class="cell">
				<label>Nama</label>
				<div class="input-control text full-size">
					<?= $nama ?>
				</div>
			</div>
		</div>

	</div>

	<!-- <?php if (in_array($_access, array('admin'))) : ?>
	<a href="<?= $_url ?>krs/approve/<?= $_id ?>" class="button success">Approve</a>
<?php endif; ?> -->


	<?php
	//if (in_array($_access, array('admin', 'mahasiswa'))) {
	$sql = "SELECT * FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			WHERE krs.nim='{$nim}'
			ORDER BY matakuliah.kode ASC";
	/*
	} else if ($_access == 'dosen') {

	}*/


	$query = mysqli_query($koneksi, $sql);
	?>
	<table class="table table-sm table-bordered table-striped">
		<thead class="thead-light">
			<tr height="40px">
				<th>Kode</th>
				<th>Matakuliah</th>
				<th>NIDN Dosen</th>
				<th>Dosen</th>
				<th>Ket</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if (mysqli_num_rows($query) > 0) :
				while ($field = mysqli_fetch_array($query)) :
					$dosen_mk_id = $field['dosen_mk_id'];
					$npk_dosen = $field['dosen_npk'];
					$kode = $field['matakuliah_kode'];
					$url = "$_url" . "krs/nilai" . "/" . "$nim" . "/" . "$dosen_mk_id" . "/" . "$npk_dosen" . "/" . "$kode";
			?>
					<tr>
						<td class="table-success"><?= $field['matakuliah_kode'] ?></td>
						<td><?= $field['nama'] ?></td>
						<td class="table-success"><?= $field['dosen_npk'] ?></td>
						<td><?= $field['nama_dosen'] ?>, <?= $field['gelar'] ?></td>
						<td>
							<?php
							$Qkrs = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nim='{$nim_hash}' AND kode = '{$field['matakuliah_kode']}'");
							$Qnilai = mysqli_fetch_array($Qkrs);
							extract($field);
							if ($Qnilai != '') {
								echo '<a><span class="mif-checkmark fg-blue"></span></a>';
							} else {
								if ($_access == 'admin') {
									echo '<a><span class="mif-cross fg-blue"></span></a>';
								} else if ($_access == 'mahasiswa') {
									echo "<a href='$url'>" . "<span class='mif-plus fg-blue'></span>" . "<a/>";
								}
							}
							?>
						</td>
					</tr>
				<?php
				endwhile;
			else :
				?>
				<tr>
					<td colspan="4">
						Data tidak ditemukan
					</td>
				</tr>
			<?php
			endif;
			?>
		</tbody>
	</table>
	<style type="text/css">
		.input-control {
			border: 1px solid #d9d9d9;
			padding: 10px;
		}

		td,
		th {
			font-family: Arial, Helvetica, sans-serif;
			font-family: Arial, Helvetica, sans-serif !important;
			font-size: medium;
		}
	</style>
</body>

</html>