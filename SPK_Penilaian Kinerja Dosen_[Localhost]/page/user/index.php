<html>
<title>Daftar User</title>

<body>
	<h2>
		<a href="<?= $_url ?>" class="mif-arrow-left mif-2xm"><span></span></a>
		Dashboard
	</h2>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<h3 style="text-align: center;">
		DAFTAR PENGGUNA
		<h3>
			<span class="place-right">
				<a href="<?= $_url ?>user/synchronize" class="button success" style="margin-bottom: 10px; margin-top: 10px;">Sinkronisasi User</a>
				<a href="<?= $_url ?>user/add" class="button button primary" style="margin-bottom: 10px; margin-top: 10px;">Tambah User</a>
			</span>
		</h3>
	</h3>

	<form action="<?= $_url ?>user" method="get" style="margin-top: 20px;">
		<label>Cari:</label>
		<input type="text" name="cari" placeholder="cari user">
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
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Level</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

			<?php
			$batas = 25;
			$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
			$previous = $halaman - 1;
			$next = $halaman + 1;
			$data = mysqli_query($koneksi, "SELECT * FROM user");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);
			if (isset($_GET['cari'])) {
				$cari = $_GET['cari'];
				$dataU = mysqli_query($koneksi, "SELECT * FROM user WHERE nama LIKE '%" . $cari . "%' OR username LIKE '%" . $cari . "%' OR status LIKE '%" . $cari . "%'limit $halaman_awal, $batas");
			} else {
				$dataU = mysqli_query($koneksi, "SELECT * FROM user ORDER BY status ASC limit $halaman_awal, $batas");
			}

			$nomor = $halaman_awal + 1;
			while ($dataUser = mysqli_fetch_array($dataU)) {
			?>
				<tr>
					<td><?= $nomor++; ?></td>
					<td><?= $dataUser['nama'] ?></td>
					<td><?= $dataUser['username'] ?></td>
					<td><?= $dataUser['status'] ?></td>
					<td>
						<div class="inline-block">
							<button class="button mini-button dropdown-toggle">Aksi</button>
							<ul class="split-content d-menu" data-role="dropdown">
								<li><a href="<?= $_url ?>user/edit/<?= $dataUser['id'] ?>/<?= urlencode($dataUser['username']) ?>"><span class="mif-pencil"></span> Edit</a></li>
								<li><a href="<?= $_url ?>user/delete/<?= $dataUser['id'] ?>/<?= urlencode($dataUser['username']) ?>"><span class="mif-cross"></span> Delete</a></li>
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