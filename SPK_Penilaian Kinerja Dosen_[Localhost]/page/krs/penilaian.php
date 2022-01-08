<html>
<title>Penilaian Dosen</title>

<body>
	<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}krs/view/{$_username}");
	}
	?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h2>
		<a href="<?= $_url ?><?= in_array($_access, array('admin', 'dosen')) ? 'krs' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Dashboard
	</h2>
	<h3 style="text-align: center; margin-bottom: 20px;">
		PENILAIAN KINERJA DOSEN
	</h3>


	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>

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
				<label>Tahun Masuk</label>
				<div class="input-control text full-size">
					<?= $tahun_masuk ?>
				</div>
			</div>
		</div>

		<div class="cell">
		</div>
	</div>

	<?php if (in_array($_access, array('admin'))) : ?>
		<a href="<?= $_url ?>krs/add/<?= $_id ?>" class="button primary">Pilih Matakuliah</a>
		<a href="<?= $_url ?>krs/approve/<?= $_id ?>" class="button success">Approve</a>
	<?php endif; ?>

	<?php
	//if (in_array($_access, array('admin', 'mahasiswa'))) {
	$sql = "SELECT krs.*,matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.npk as dosen_npk, dosen.nama_dosen as dosen_nama, dosen.gelar as dosen_gelar 
			FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			WHERE krs.nim='{$nim}'
			ORDER BY matakuliah.kode ASC";
	/*
	} else if ($_access == 'dosen') {
		$sql = "SELECT krs.*,matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama as dosen_nama, dosen.gelar as dosen_gelar 
			FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			LEFT JOIN dosen_wali ON dosen_wali.mahasiswa_nim=krs.nim
			WHERE krs.nim='{$nim}' AND dosen_wali.dosen_npk='{$_username}'
			ORDER BY matakuliah.kode ASC";
	}*/

	$query = mysqli_query($koneksi, $sql);
	?>

	<?php
	$querya = mysqli_query($koneksi, "SELECT dosen_matakuliah.dosen_npk FROM dosen_matakuliah 
								JOIN krs ON dosen_matakuliah.id = krs.dosen_mk_id");
	$field = mysqli_fetch_array($querya);
	?>

	<table class="table table-sm table-bordered table-striped">
		<thead class="thead-light">
			<tr height="40px">
				<th>Kode</th>
				<th style="text-align: center;">Matakuliah</th>
				<th>Dosen NPK</th>
				<th style="text-align: center;">Dosen</th>
				<th style="text-align: center;">Nilai</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if (mysqli_num_rows($query) > 0) :
				while ($field = mysqli_fetch_array($query)) :
			?>
					<tr>
						<td class="table-success"><?= $field['matakuliah_kode'] ?></td>
						<td><?= $field['matakuliah_nama'] ?></td>
						<td class="table-success"><?= $field['dosen_npk'] ?></td>
						<td><?= $field['dosen_nama'] ?>, <?= $field['dosen_gelar'] ?></td>
						<td>
							<a href="<?= $_url ?>krs/nilai/<?= $nim ?>/<?= $field['dosen_mk_id'] ?>/<?= $field['dosen_npk'] ?>/<?= $field['matakuliah_kode'] ?>"><span style="margin: auto; display:table;" class="mif-user-check"></span></a>
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