<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Wali dari Mahasiswa
</h1>
    <div class="content">
		<?php
			$sqlb = "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM dosen_wali 
			LEFT JOIN mahasiswa ON mahasiswa.nim=dosen_wali.mahasiswa_nim
			LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode
			WHERE dosen_wali.dosen_npk='{$_username}'
			ORDER BY mahasiswa.nim ASC";
			$queryb = mysqli_query($koneksi, $sqlb);
		?>

		<table class="table striped hovered border bordered">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Tahun Masuk</th>
					<th>Program Studi</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

			<?php
				if (mysqli_num_rows($queryb) > 0):
					while($field = mysqli_fetch_array($queryb)):
			?>
				<tr>
					<td><?= $field['nim'] ?></td>
					<td><?= $field['nama'] ?></td>
					<td><?= $field['tahun_masuk'] ?></td>
					<td><?= $field['prodi_nama'] ?></td>
					<td>
						<div class="inline-block">
						    <button class="button mini-button dropdown-toggle">Aksi</button>
						    <ul class="split-content d-menu" data-role="dropdown">
								<li><a href="<?= $_url ?>mahasiswa/view/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-zoom-in"></span> View</a></li>
								<li><a href="<?= $_url ?>krs/view/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil"></span> KRS</a></li>
						    </ul>
						</div>
					</td>
				</tr>
			<?php
					endwhile;
				else:
			?>
				<tr>
					<td colspan="5">
					Data tidak ditemukan
					</td>
				</tr>
			<?php
				endif;
			?>
				
			</tbody>
		</table>
	</div>
</div>