<h1>
<a href="<?= $_url ?>dosen/view/<?= $_id ?>" class="nav-button transform"><span></span></a>
Pilih Mahasiswa
</h1>

<?php
	$npk = $_id;
	if (isset($_POST['submit'])) {
		$nims = $_POST['nim'];
		$sqlin = "INSERT INTO dosen_wali(dosen_npk,mahasiswa_nim) VALUES";
		$sqlinar = array();
		foreach ($nims as $key=>$value) {
			$sqlinar[] = "('{$npk}','{$value}')";
		}
		$sqlin .= implode(',', $sqlinar);
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			echo "<script>$.Notify({
			    caption: 'Success',
			    content: 'Data Mahasiswa Berhasil Ditambah',
	    		type: 'success'
			});</script>";
		} else {
			echo "<script>$.Notify({
			    caption: 'Failed',
			    content: 'Data Mahasiswa Gagal Ditambah',
			    type: 'alert'
			});</script>";
		}
	}

	$dosen_wali = mysqli_query($koneksi, "SELECT mahasiswa_nim as nim FROM dosen_wali");
	$dm = array();
	while ($wali = mysqli_fetch_array($dosen_wali)) {
		$dm[] = "'{$wali['nim']}'";
	}
	$dm = implode(',', $dm);

	$sql = "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM mahasiswa LEFT JOIN prodi ON mahasiswa.prodi_kode=prodi.kode";

	if ($dm!='')
		$sql .= " WHERE nim not in ({$dm})";
	$query= mysqli_query($koneksi, $sql);
?>

<form method="post">

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th></th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Program Studi</th>
			<th>Tahun Masuk</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><input type="checkbox" name="nim[]" value="<?= $field['nim'] ?>"></td>
			<td><?= $field['nim'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['prodi_nama'] ?></td>
			<td><?= $field['tahun_masuk'] ?></td>
		</tr>
	<?php
			endwhile;
		else:
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

<button type="submit" name="submit" class="button primary">SUBMIT</button>

</form>