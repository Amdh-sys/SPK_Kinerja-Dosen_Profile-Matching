<html>
<title>Penilaian Dosen</title>

<body>
	<?php
	include 'aset/index_penilaian.php';
	?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h3 style="text-align:center;">TABEL PENILAIAN DOSEN</h3>
	<p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
	<form method="POST">
		<span class="place-right" style="margin-bottom: 5px ;">
			<button type="gabung" name="gabung" class="button success">Gabung Nilai</button>
		</span>
	</form>
	<table class="table table-sm table-bordered table-striped">
		<thead class="thead-light">
			<tr height="40px">
				<th width="5%" style="text-align: center;">No</th>
				<th width="7%" style="text-align: center;">NIDN</th>
				<th width="5%" style="text-align: center;">K.Makul</th>
				<th width="6%" style="text-align: center;">A1</th>
				<th width="6%" style="text-align: center;">A2</th>
				<th width="6%" style="text-align: center;">A3</th>
				<th width="6%" style="text-align: center;">A4</th>
				<th width="6%" style="text-align: center;">A5</th>
				<th width="6%" style="text-align: center;">B1</th>
				<th width="6%" style="text-align: center;">B2</th>
				<th width="6%" style="text-align: center;">B3</th>
				<th width="6%" style="text-align: center;">B4</th>
				<th width="6%" style="text-align: center;">B5</th>
				<th width="6%" style="text-align: center;">B6</th>
				<th width="6%" style="text-align: center;">C1</th>
				<th width="6%" style="text-align: center;">C2</th>
				<th width="6%" style="text-align: center;">C3</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$batas = 25;
			$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
			$previous = $halaman - 1;
			$next = $halaman + 1;
			$data = mysqli_query($koneksi, "SELECT * FROM nilai_dosen");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);
			$sql = "SELECT * FROM nilai_dosen ORDER BY nim ASC limit $halaman_awal, $batas";
			$query = mysqli_query($koneksi, $sql);
			if (mysqli_num_rows($query) > 0) :
				$nomor = $halaman_awal + 1;
				while ($field = mysqli_fetch_array($query)) :
			?>
					<tr>
						<td style="text-align: center;"><?= $nomor++; ?></td>
						<td style="text-align: center;"><?= $field['npk_dosen'] ?></td>
						<td style="text-align: center;"><?= $field['kode'] ?></td>
						<td style="text-align: center;"><?= $field['Ai1'] ?></td>
						<td style="text-align: center;"><?= $field['Ai2'] ?></td>
						<td style="text-align: center;"><?= $field['Ai3'] ?></td>
						<td style="text-align: center;"><?= $field['Ai4'] ?></td>
						<td style="text-align: center;"><?= $field['Ai5'] ?></td>
						<td style="text-align: center;"><?= $field['Bi1'] ?></td>
						<td style="text-align: center;"><?= $field['Bi2'] ?></td>
						<td style="text-align: center;"><?= $field['Bi3'] ?></td>
						<td style="text-align: center;"><?= $field['Bi4'] ?></td>
						<td style="text-align: center;"><?= $field['Bi5'] ?></td>
						<td style="text-align: center;"><?= $field['Bi6'] ?></td>
						<td style="text-align: center;"><?= $field['Ci1'] ?></td>
						<td style="text-align: center;"><?= $field['Ci2'] ?></td>
						<td style="text-align: center;"><?= $field['Ci3'] ?></td>
					</tr>
				<?php
				endwhile;
			else :
				?>
				<tr>
					<td colspan="6">
						Data tidak ditemukan
					</td>
				</tr>
			<?php
			endif;
			?>
		</tbody>
	</table>
	<nav>
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" <?php if ($halaman > 1) {
											echo "href='?halaman=$previous'";
										} ?>>Sebelumnya</a>
			</li>
			<?php
			for ($x = 1; $x <= $total_halaman; $x++) {
			?>
				<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
			<?php
			}
			?>
			<li class="page-item">
				<a class="page-link" <?php if ($halaman < $total_halaman) {
											echo "href='?halaman=$next'";
										} ?>>Selanjutnya</a>
			</li>
		</ul>
	</nav>
	<style>
		td,
		th {
			font-family: Arial, Helvetica, sans-serif;
			font-family: Arial, Helvetica, sans-serif !important;
			font-size: medium;
		}
	</style>

</body>

</html>