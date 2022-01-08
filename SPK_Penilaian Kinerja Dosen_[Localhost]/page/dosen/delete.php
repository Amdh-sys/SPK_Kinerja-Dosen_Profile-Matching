<html>
<title>Halaman Delete Dosen</title>

<body>
	<?php
	include 'aset/query_masterdata.php';
	?>
	<?php
	if (isset($_params[2]) && $_params[2] == 'yes') {
		if ($queryMatakuliah->num_rows > 0) {
			if ($queryNilaidosen->num_rows > 0) {
				$queryHapus = mysqli_query($koneksi, "DELETE dosen.*, dosen_matakuliah.*,nilai_dosen.*,user.* 
			FROM dosen, dosen_matakuliah, nilai_dosen ,user
			WHERE dosen.npk = '{$_id}' 
			AND dosen_matakuliah.dosen_npk = '{$_id}' 
			AND nilai_dosen.npk_dosen='{$_id}'
			AND user.username = '{$_id}'");
			} else {
				$queryHapus = mysqli_query($koneksi, "DELETE dosen.*, dosen_matakuliah.*,user.* 
			FROM dosen, dosen_matakuliah, user
			WHERE dosen.npk = '{$_id}' 
			AND dosen_matakuliah.dosen_npk = '{$_id}' 
			AND user.username = '{$_id}'");
			}
		} else if ($queryUser->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE dosen.*, user.* 
			FROM dosen, user
			WHERE dosen.npk = '{$_id}' 
			AND user.username = '{$_id}'");
		} else if ($queryDosen->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE FROM dosen
			WHERE dosen.npk = '{$_id}'");
		}
		if ($queryHapus) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}dosen'; }, 2000);
		</script>";
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Gagal Dihapus',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<h1>Hapus Dosen</h1>
	<h3>Apakah anda yakin akan menghapus data dosen ?
		<br> Nama : <?= urldecode($_params[1]) ?>
		<br> NIDN : <?= $_id ?>
	</h3>
	<a href="<?= $_url ?>dosen/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button danger">HAPUS</a>
	<a href="<?= $_url ?>dosen" class="button success">TIDAK</a>

</body>

</html>