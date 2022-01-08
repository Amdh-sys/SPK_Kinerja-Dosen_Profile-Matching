<html>
<title>Halaman Daftar Dosen</title>

<body>
	<h2>
		<a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
		Dashboard
	</h2>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h3 style="text-align: center;">
		DAFTAR DOSEN
		<br>
		<span class="place-right">
			<a href="<?= $_url ?>dosen/add" class="button primary" style="margin-bottom: 10px; margin-top: 10px;">Tambah Dosen</a>
		</span>
	</h3>

	<form action="<?= $_url ?>dosen" method="get" style="margin-top: 10px;">
		<label>Cari:</label>
		<input type="text" name="cari" placeholder="cari dosen">
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
				<th width="50px" style="text-align: center;">NIDN</th>
				<th width="300px" style="text-align: center;">Nama</th>
				<th width="200px" style="text-align: center;">Alamat</th>
				<th width="40px" style="text-align: center;">Jenis Kelamin</th>
				<th width="150px" style="text-align: center;">Gelar</th>
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
			$data = mysqli_query($koneksi, "SELECT * FROM dosen");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);
			if (isset($_GET['cari'])) {
				$cari = $_GET['cari'];
				$dataD = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nama_dosen LIKE '%" . $cari . "%' OR npk LIKE '%" . $cari . "%' OR jenis_kelamin LIKE '%" . $cari . "%' limit $halaman_awal, $batas");
			} else {
				$dataD = mysqli_query($koneksi, "SELECT * FROM dosen limit $halaman_awal, $batas");
			}
			$nomor = $halaman_awal + 1;
			while ($dataDosen = mysqli_fetch_array($dataD)) {
			?>
				<tr>
					<td width="20px"><?= $nomor++; ?></td>
					<td width="50px"><?= $dataDosen['npk'] ?></td>
					<td width="300px"><?= $dataDosen['nama_dosen'] ?></td>
					<td width="200px"><?= $dataDosen['alamat'] ?></td>
					<td width="40px"><?= $dataDosen['jenis_kelamin'] ?></td>
					<td width="150px"><?= $dataDosen['gelar'] ?></td>
					<td width="20px">
						<div class="inline-block">
							<button class="button mini-button dropdown-toggle">Aksi</button>
							<ul class="split-content d-menu" data-role="dropdown">
								<li><a href="<?= $_url ?>dosen/view/<?= $dataDosen['npk'] ?>/<?= urlencode($dataDosen['nama_dosen']) ?>"><span class="mif-zoom-in"></span> View</a></li>
								<li><a href="<?= $_url ?>dosen/edit/<?= $dataDosen['npk'] ?>/<?= urlencode($dataDosen['nama_dosen']) ?>"><span class="mif-pencil"></span> Edit</a></li>
								<li><a href="<?= $_url ?>dosen/delete/<?= $dataDosen['npk'] ?>/<?= urlencode($dataDosen['nama_dosen']) ?>"><span class="mif-cross"></span> Delete</a></li>
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