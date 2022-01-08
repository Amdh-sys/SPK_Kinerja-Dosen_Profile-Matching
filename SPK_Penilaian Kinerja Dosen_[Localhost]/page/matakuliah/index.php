<html>
<title>Halaman Daftar Matakuliah</title>

<body>
	<h2>
		<a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Dashboard
	</h2>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h2 style="text-align: center;">

		<h3 style="text-align: center;">
			DAFTAR MATAKULIAH
		</h3>
		<span class="place-right">
			<a href="<?= $_url ?>matakuliah/add" class="button primary" style="margin-bottom: 10px;">Tambah Matakuliah</a>
		</span>

		<form action="<?= $_url ?>matakuliah" method="get" style="margin-top: 10px;">
			<label>Cari:</label>
			<input type="text" name="cari" placeholder="cari matakuliah">
			<input type="submit" value="Cari" class="bottom primary">
		</form>

		<?php
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
			echo "<b>Hasil pencarian : " . $cari . "</b>";
		}
		?>

		<table class="table table-sm table-bordered table-striped">
			<thead class="thead-light">
				<tr height="40px">
					<th width="20px" style="text-align: center;">No</th>
					<th width="80px" style="text-align: center;">Kode</th>
					<th width="400px" style="text-align: center;">Nama</th>
					<th width="20px" style="text-align: center;">SKS</th>
					<th width="50px" style="text-align: center;">Semester</th>
					<th width="20px" style="text-align: center;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$batas = 10;
				$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
				$previous = $halaman - 1;
				$next = $halaman + 1;
				$data = mysqli_query($koneksi, "SELECT * FROM matakuliah");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$dataM = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode LIKE '%" . $cari . "%' OR nama LIKE '%" . $cari . "%' OR singkatan LIKE '%" . $cari . "%' limit $halaman_awal, $batas");
				} else {
					$dataM = mysqli_query($koneksi, "SELECT * FROM matakuliah limit $halaman_awal, $batas");
				}
				$nomor = $halaman_awal + 1;
				while ($dataMakul = mysqli_fetch_array($dataM)) {
				?>
					<tr>
						<td style="text-align: center;"><?= $nomor++; ?></td>
						<td style="text-align: center;"><?= $dataMakul['kode'] ?></td>
						<td><?= $dataMakul['nama'] ?></td>
						<td style="text-align: center;"><?= $dataMakul['sks'] ?></td>
						<td style="text-align: center;"><?= $dataMakul['semester'] ?></td>
						<td style="text-align: center;">
							<div class="inline-block">
								<button class="button mini-button dropdown-toggle">Aksi</button>
								<ul class="split-content d-menu" data-role="dropdown">
									<li><a href="<?= $_url ?>matakuliah/view/<?= $dataMakul['kode'] ?>/<?= urlencode($dataMakul['nama']) ?>">
											<span class="mif-zoom-in"></span> View</a></li>
									<li><a href="<?= $_url ?>matakuliah/edit/<?= $dataMakul['kode'] ?>/<?= urlencode($dataMakul['nama']) ?>">
											<span class="mif-pencil"></span> Edit</a></li>
									<li><a href="<?= $_url ?>matakuliah/delete/<?= $dataMakul['kode'] ?>/<?= urlencode($dataMakul['nama']) ?>">
											<span class="mif-cross"></span> Delete</a></li>
								</ul>
							</div>
						</td>
					</tr>
				<?php } ?>
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