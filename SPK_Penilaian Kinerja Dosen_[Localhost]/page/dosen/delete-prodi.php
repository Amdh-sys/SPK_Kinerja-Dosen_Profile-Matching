<?php
$npk = $_id;
$prodi_kode = $_params[1];

if (isset($_params[3]) && $_params[3] == 'yes') {

	$query = mysqli_query($koneksi, "DELETE FROM dosen_prodi WHERE dosen_npk='{$npk}' AND prodi_kode='{$prodi_kode}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Program Studi Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}dosen/view/{$npk}'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Program Studi Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>

<h1>Hapus Program Studi</h1>
<h3>Apakah anda yakin akan menghapus Program Studi <?= urldecode($_params[2]) ?>?</h3>
<a href="<?= $_url ?>dosen/delete-prodi/<?= $npk ?>/<?= $prodi_kode ?>/<?= $_params[2] ?>/yes" class="button primary">Yes</a>
<a href="<?= $_url ?>dosen/view/<?= $npk ?>" class="button danger">No</a>