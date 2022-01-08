<html>
<title>Halaman Upload Mahasiswa</title>

<body>
	<h2 style="margin-bottom: 20px;">
		<a href="<?= $_url ?>mahasiswa" class="mif-arrow-left mif-2x"><span></span></a>
		Daftar Mahasiswa
	</h2>

	<h2 style="text-align: center;">UPLOAD DATA MAHASISWA</h2>
	<h4 style="margin-top: 20px;">Masukan data excel untuk mengupload data mahasiswa</h4>
	<?php
	include 'koneksi.php';
	?>

	<form method="post" enctype="multipart/form-data" action="<?= $_url ?>upload_aksi.php">
		Pilih File:
		<input name="filemahasiswa" type="file" required="required">
		<br><br>
		<input name="upload" type="submit" class="button primary" value="Import">
	</form>

	<h4>Download Temlate Update Data Mahasiswa</h4>
	<a href="<?= $_url ?>export_excel.php" class="button primary">download</a>

</body>

</html>