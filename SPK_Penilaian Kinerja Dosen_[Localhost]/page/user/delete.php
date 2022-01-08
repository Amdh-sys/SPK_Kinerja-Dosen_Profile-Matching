<html>
<title>Delete User</title>

<body>

	<?php

	if (isset($_params[2]) && $_params[2] == 'yes') {
		$query = mysqli_query($koneksi, "DELETE FROM user WHERE id='{$_id}'");

		if ($query) {
			echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data User Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}user'; }, 2000);
		</script>";
		} else {
			echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data User Gagal Dihapus',
		    type: 'alert'
		});</script>";
		}
	}
	?>

	<h1>Hapus User</h1>
	<h3>Apakah anda yakin akan menghapus user dengan username <?= urldecode($_params[1]) ?>?</h3>
	<a href="<?= $_url ?>user/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>user" class="button danger">No</a>

</body>

</html>