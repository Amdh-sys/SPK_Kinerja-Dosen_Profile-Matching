<h1>
<a href="<?= $_url ?>dosen/view/<?= $_id ?>" class="nav-button transform"><span></span></a>
Pilih Program Studi
</h1>

<?php
	$npk = $_id;
	if (isset($_POST['submit'])) {
		$prodi_kode = $_POST['prodi_kode'];
		$sqlin = "INSERT INTO dosen_prodi(dosen_npk,prodi_kode) VALUES('{$npk}','{$prodi_kode}')";
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			echo "<script>$.Notify({
			    caption: 'Success',
			    content: 'Data Program Studi Berhasil Ditambah',
	    		type: 'success'
			});</script>";
		} else {
			echo "<script>$.Notify({
			    caption: 'Failed',
			    content: 'Data Program Studi Gagal Ditambah',
			    type: 'alert'
			});</script>";
		}
	}

	$dosen_prodi = mysqli_query($koneksi, "SELECT prodi_kode FROM dosen_prodi WHERE dosen_npk='{$npk}'");
	$dm = array();
	while ($prodi = mysqli_fetch_array($dosen_prodi)) {
		$dm[] = "'{$prodi['prodi_kode']}'";
	}
	$dm = implode(',', $dm);

	$sql = "SELECT * FROM prodi";

	if ($dm!='')
		$sql .= " WHERE kode not in ({$dm})";

	$query= mysqli_query($koneksi, $sql);
?>

<form method="post">

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th></th>
			<th>Kode</th>
			<th>Nama</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><input type="radio" name="prodi_kode" value="<?= $field['kode'] ?>"></td>
			<td><?= $field['kode'] ?></td>
			<td><?= $field['nama'] ?></td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="3">
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