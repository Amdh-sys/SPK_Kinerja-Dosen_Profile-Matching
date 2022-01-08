<html>
<title>Halaman Delete Mahasiswa</title>

<body>
	<?php
	include 'aset/query_masterdata.php';
	$id_hash = base64_encode("$_id");
	?>

	<?php
	if (isset($_params[2]) && $_params[2] == 'yes') {
		if ($queryKrs->num_rows > 0) {
			if ($query_nilai_mhs->num_rows > 0) {
				$queryHapus = mysqli_query($koneksi, "DELETE mahasiswa.*, krs.*,user.*,nilai_dosen.* 
			FROM mahasiswa, krs ,user, nilai_dosen
			WHERE mahasiswa.nim ='{$_id}' 
			AND krs.nim = '{$_id}' 
			AND user.username = '{$_id}'
			AND nilai_dosen.nim='{$id_hash}'");
			} else {
				$queryHapus = mysqli_query($koneksi, "DELETE mahasiswa.*, krs.*,user.* 
			FROM mahasiswa, krs ,user
			WHERE mahasiswa.nim = '{$_id}' 
			AND krs.nim = '{$_id}'
			AND user.username = '{$_id}'");
			}
		} elseif ($queryUser->num_rows > 0) {
			$queryHapus = mysqli_query($koneksi, "DELETE mahasiswa.*, user.* 
		FROM mahasiswa, user 
		WHERE mahasiswa.nim = '{$_id}' 
		AND user.username = '{$_id}'");
		} else {
			$queryHapus = mysqli_query($koneksi, "DELETE FROM mahasiswa
		WHERE mahasiswa.nim = '{$_id}'");
		}

		if ($queryHapus) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}mahasiswa'; }, 2000);
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

	<h1>Hapus Mahasiswa</h1>
	<h3>Apakah anda yakin akan menghapus data mahasiswa ?
		<br>NIM: <?= $_id ?>
		<br>Nama: <?= urldecode($_params[1]) ?>
	</h3>
	<a href="<?= $_url ?>mahasiswa/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button danger">HAPUS</a> <a href="<?= $_url ?>mahasiswa" class="button success">TIDAK</a>
</body>

</html>