<html>
<title>Logout</title>

<body>
	<?php

	if ($_id == 'yes') {

		session_destroy();

		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Anda telah berhasil logout!',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}'; }, 2000);
		</script>";
	}
	?>

	<h1>Sign Out?</h1>
	<h3>Apakah anda yakin akan Logout?</h3>
	<a href="<?= $_url ?>sign/out/yes" class="button primary">Yes</a> <a href="<?= $_url ?>" class="button danger">No</a>

</body>

</html>