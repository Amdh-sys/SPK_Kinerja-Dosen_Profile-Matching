<html>
<title>Delete KRS</title>

<body>
	<?php
	$nim_hash = base64_encode("$_id");
	$nim_unhash = base64_decode("$nim_hash");
	?>
	<?php
	if (isset($_params[5]) && $_params[5] == 'yes') {
		$queryNilai = mysqli_query($koneksi, "SELECT * FROM nilai_dosen INNER JOIN krs WHERE nilai_dosen.nim='{$nim_hash}' AND nilai_dosen.npk_dosen ='{$_params[2]}' AND nilai_dosen.kode ='{$_params[4]}'");
		$Nilai = mysqli_fetch_array($queryNilai);
		if ($queryNilai->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE krs.*,nilai_dosen.*
		FROM krs, nilai_dosen
		WHERE krs.nim = '{$_id}'
		AND nilai_dosen.nim='{$nim_hash}'
		AND nilai_dosen.npk_dosen='{$_params[2]}'
		AND krs.dosen_mk_id ='{$_params[1]}' 
		AND nilai_dosen.kode = '{$_params[4]}'");
		} else {
			$queryHapus = mysqli_query($koneksi, "DELETE FROM krs
		WHERE krs.nim = '{$_id}'
		AND krs.dosen_mk_id ='{$_params[1]}'");
		}
		if ($queryHapus) {
			echo "<script>$.Notify({
			caption: 'Success',
			content: 'Data Mahasiswa Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}krs/edit_krs/{$_id}'; }, 1500);
		</script>";
		} else {
			echo "<script>$.Notify({
			caption: 'Failed',
			content: 'Data Mahasiswa Gagal Dihapus',
			type: 'alert'
		});</script>";
		}
	}
	?>

	<h1>Hapus Matakuliah</h1>
	<h3>Apakah anda yakin akan menghapus matakuliah <?= urldecode($_params[3]) ?>?</h3>
	<a href="<?= $_url ?>krs/delete/<?= $_id ?>/<?= $_params[1] ?>/<?= $_params[2] ?>/<?= $_params[3] ?>/<?= $_params[4] ?>/yes" class="button primary">Yes</a>
	<a href="<?= $_url ?>krs/edit_krs/<?= $_id ?>/" class="button danger">No</a>
</body>

</html>