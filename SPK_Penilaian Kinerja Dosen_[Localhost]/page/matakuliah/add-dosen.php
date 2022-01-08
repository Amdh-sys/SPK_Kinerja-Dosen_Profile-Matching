<h2>
	<a href="<?= $_url ?>matakuliah/view/<?= $_id ?>" class="mif-arrow-left mif-2x"><span></span></a>
	Detail Matakuliah
</h2>
<?php
$Qmatakuliah = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE matakuliah.kode = '{$_id}'");
$QM = mysqli_fetch_array($Qmatakuliah);
?>

<h3 style="text-align: center; margin-top: 30px;">Tambah Dosen Pengajar</h3>
<p>Matakuliah : <?= $QM['nama']; ?> </p>


<?php
$matakuliah_kode = $_id;
if (isset($_POST['submit'])) {
	$npk = $_POST['npk'];
	$queryMdosen = mysqli_query($koneksi, "SELECT * FROM dosen_matakuliah WHERE dosen_matakuliah.dosen_npk = '{$npk}' AND dosen_matakuliah.matakuliah_kode='{$matakuliah_kode}'");
	if ($queryMdosen->num_rows > 0) {
		echo "<script>$.Notify({
			caption: 'Gagal',
			content: 'Data Sudah Ada',
			type: 'alert'
		});</script>";
	} else {
		$sqlin = "INSERT INTO dosen_matakuliah(dosen_npk,matakuliah_kode) VALUES('{$npk}','{$matakuliah_kode}')";
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			echo "<script>$.Notify({
					caption: 'Success',
					content: 'Data Dosen Pengajar Berhasil Ditambah',
					type: 'success'
				});</script>";
		} else {
			echo "<script>$.Notify({
					caption: 'Failed',
					content: 'Data Dosen Pengajar Gagal Ditambah',
					type: 'alert'
				});</script>";
		}
	}
}


$dosen_matakuliah = mysqli_query($koneksi, "SELECT dosen_npk FROM dosen_matakuliah WHERE matakuliah_kode='{$matakuliah_kode}'");
$dm = array();
while ($dosen = mysqli_fetch_array($dosen_matakuliah)) {
	$dm[] = "'{$dosen['dosen_npk']}'";
}
$dm = implode(',', $dm);

$sql = "SELECT * FROM dosen";
if (!empty($dm))
	$sql .= " WHERE dosen.npk NOT IN ({$dm})";

$sql .= " ORDER BY nama_dosen ASC";

$query = mysqli_query($koneksi, $sql);
?>

<form method="post">

	<table class="table striped hovered border bordered">
		<thead>
			<tr>
				<th></th>
				<th>NIDN</th>
				<th>Nama</th>
				<th>Gelar</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if (mysqli_num_rows($query) > 0) :
				while ($field = mysqli_fetch_array($query)) :
			?>
					<tr>
						<td><input type="radio" name="npk" value="<?= $field['npk'] ?>"></td>
						<td><?= $field['npk'] ?></td>
						<td><?= $field['nama_dosen'] ?></td>
						<td><?= $field['gelar'] ?></td>
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

	<button type="submit" name="submit" class="button primary">SUBMIT</button>

</form>