<!DOCTYPE html>
<html>

<head>
	<title>Export Data Ke Excel</title>
</head>

<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=mahasiswa.xls");
	?>

	<table border="1">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tahun Masuk</th>
		</tr>
		<?php
		// koneksi database
		$koneksi = mysqli_connect("localhost", "root", "", "spk_kinerja");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi, "select * from mahasiswa");
		while ($d = mysqli_fetch_array($data)) {
		?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		<?php
		}
		?>
	</table>
</body>

</html>