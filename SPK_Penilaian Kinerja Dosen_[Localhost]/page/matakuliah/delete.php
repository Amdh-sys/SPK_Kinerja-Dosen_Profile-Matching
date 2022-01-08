<html>
<title>Halaman Delete Matakuliah</title>

<body>
	<?php
	include 'aset/query_masterdata.php';
	?>

	<?php
	if (isset($_params[2]) && $_params[2] == 'yes') {
		if ($queryND_delete->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE dosen_matakuliah.*,nilai_dosen.*, matakuliah.* 
		FROM dosen_matakuliah, nilai_dosen, matakuliah
		WHERE dosen_matakuliah.matakuliah_kode = '{$_id}'
		AND nilai_dosen.kode='{$_id}'
		AND matakuliah.kode='{$_id}'");
		} else if ($queryDM_delete->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE dosen_matakuliah.*, matakuliah.* 
		FROM dosen_matakuliah, matakuliah
		WHERE dosen_matakuliah.matakuliah_kode = '{$_id}'
		AND matakuliah.kode='{$_id}'");
		} else {
			$queryHapus = mysqli_query($koneksi, "DELETE matakuliah FROM matakuliah
		WHERE matakuliah.kode='{$_id}'");
		}
		if ($queryHapus) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data matakuliah Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}matakuliah'; }, 2000);
		</script>";
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Matakuliah Gagal Dihapus',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<h1>Hapus Matakuliah</h1>
	<h3>Apakah anda yakin akan menghapus matakuliah dengan KODE <?= $_id ?> yang berjudul <?= urldecode($_params[1]) ?>?</h3>
	<a href="<?= $_url ?>matakuliah/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>matakuliah" class="button danger">No</a>
</body>

</html>