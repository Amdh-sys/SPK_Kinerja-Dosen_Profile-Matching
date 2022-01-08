<h2>
	<a href="<?= $_url ?>krs/edit_krs/<?= $_id ?>" class="mif-arrow-left mif-2x"><span></span></a>
	Pilih Matakuliah
</h2>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<h2 style="text-align: center;">

	<?php
	$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
	$field = mysqli_fetch_array($querya);
	extract($field);
	?>
	<h4 style="text-align: center; margin-top: 20px;">DAFTAR MATAKULIAH</h3>
		<form action="<?= $_url ?>krs/add/<?= $_id; ?>" method="get" style="margin-top: 20px;">
			<label>Cari:</label>
			<input type="text" name="cari" placeholder="cari matakuliah / dosen">
			<input type="submit" value="Cari" class="bottom primary">
		</form>
		<?php
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
			echo "<b>Hasil pencarian : " . $cari . "</b>";
		}
		?>

		<?php
		$npk = $_id;
		if (isset($_POST['submit'])) {
			extract($_POST);

			$querycek = mysqli_query($koneksi, "SELECT * FROM krs WHERE nim='$nim' AND dosen_mk_id='$mkid'");

			if ($querycek->num_rows > 0) {
				echo "<script>$.Notify({
			caption: 'Data Sudah Ada',
			content: 'matakuliah sudah diambil',
			type: 'warning'
		});</script>";
			} else {
				$sqlin = "INSERT INTO krs(nim,dosen_mk_id) VALUES('{$nim}','{$mkid}')";
				$query = mysqli_query($koneksi, $sqlin);

				if ($query) {
					mysqli_query($koneksi, "UPDATE dosen_matakuliah SET id={$mkid}");
					echo "<script>$.Notify({
					caption: 'Success',
					content: 'Matakuliah Berhasil Dipilih',
					type: 'success'
				});</script>";
				} else {
					echo "<script>$.Notify({
					caption: 'Failed',
					content: 'Matakuliah Gagal Dipilih',
					type: 'alert'
				});</script>";
				}
			}
		}

		$qmatakuliah = mysqli_query($koneksi, "SELECT dosen_mk_id FROM krs WHERE nim='{$nim}'");
		$dm = array();
		while ($mk = mysqli_fetch_array($qmatakuliah)) {
			$dm[] = "'{$mk['dosen_mk_id']}'";
		}
		$dm = implode(',', $dm);

		$sql = "SELECT dosen_matakuliah.*, 
	matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama_dosen as dosen_nama, dosen.gelar as dosen_gelar
	FROM dosen_matakuliah 
	INNER JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
	INNER JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk	
			";

		if ($dm != '')
			$sql .= " AND dosen_matakuliah.id NOT IN ({$dm})";

		$sql .= " ORDER BY matakuliah.kode ASC";
		$query = mysqli_query($koneksi, $sql);
		?>

		<form method="post">
			<button type="submit" name="submit" class="button primary" style="float: right; margin-top: -50px;">SUBMIT</button>
			<table class="table table-sm table-bordered table-striped">
				<thead class="thead-light">
					<tr height="40px">
						<th width="50px" style="text-align: center;">Pilih</th>
						<th width="50px" style="text-align: center;">Kode</th>
						<th width="250px" style="text-align: center;">Matakuliah</th>
						<th width="300px" style="text-align: center;">Dosen</th>
						<th width="50px" style="text-align: center;">Ket</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$qmatakuliah = mysqli_query($koneksi, "SELECT dosen_mk_id FROM krs WHERE nim='{$nim}'");
						$dm = array();
						while ($mk = mysqli_fetch_array($qmatakuliah)) {
							$dm[] = "'{$mk['dosen_mk_id']}'";
						}
						$dm = implode(',', $dm);

						$sql = "SELECT dosen_matakuliah.*, 
				matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama_dosen as dosen_nama, dosen.gelar as dosen_gelar
				FROM dosen_matakuliah 
				INNER JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
				INNER JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk WHERE matakuliah.kode LIKE '%$cari%' OR dosen.nama_dosen LIKE '%$cari%' OR matakuliah.nama LIKE '%$cari%'
				";
						if ($dm != '')
							$sql .= " AND dosen_matakuliah.id NOT IN ({$dm})";
						$query = mysqli_query($koneksi, $sql);
					} else {
					}
					?>
					<?php
					if (mysqli_num_rows($query) > 0) :
						while ($field = mysqli_fetch_array($query)) :
					?>
							<tr>
								<td style="text-align: center;"><input type="radio" name="mkid" value="<?= $field['id'] ?>"></td>
								<td style="text-align: center;"><?= $field['matakuliah_kode'] ?></td>
								<td><?= $field['matakuliah_nama'] ?></td>
								<td><?= $field['dosen_nama'] ?>, <?= $field['dosen_gelar'] ?></td>
								<td style="text-align: center;">
									<?php
									$Querykrs = mysqli_query($koneksi, "SELECT * FROM krs WHERE nim='{$nim}' AND dosen_mk_id = '{$field['id']}'");
									$QKRS = mysqli_fetch_array($Querykrs);
									extract($field);
									if ($QKRS != '') {
										echo '<a><span class="mif-checkmark fg-blue"></span></a>';
									} else {
										echo '<a><span class="mif-cross fg-blue"></span></a>';
									}
									?>
								</td>
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

		</form>