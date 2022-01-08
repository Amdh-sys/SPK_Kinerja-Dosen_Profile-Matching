<html>
<title>Halaman Manajemen KRS</title>

<body>
    <?php
    if ($_access == 'mahasiswa' && $_id != $_username) {
        header("location:{$_url}krs/view/{$_username}");
    }
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <h2 style="text-align: center;">

        <h2>
            <a href="<?= $_url ?><?= in_array($_access, array('admin')) ? 'krs' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
            KRS Mahasiswa
        </h2>

        <?php
        $querya = mysqli_query($koneksi, "SELECT *FROM mahasiswa WHERE nim='{$_id}'");
        $field = mysqli_fetch_array($querya);
        extract($field);
        ?>

        <div class="grid">

            <div class="row cells2">
                <div class="cell">
                    <label>NIM</label>
                    <div class="input-control text full-size">
                        <?= $nim ?>
                    </div>
                </div>

                <div class="cell">
                    <label>Nama</label>
                    <div class="input-control text full-size">
                        <?= $nama ?>
                    </div>
                </div>
            </div>

        </div>

        <a href="<?= $_url ?>krs/add/<?= $_id ?>" class="button primary">Pilih Matakuliah</a>
        <!-- <?php if (in_array($_access, array('admin'))) : ?>
	<a href="<?= $_url ?>krs/approve/<?= $_id ?>" class="button success">Approve</a>
<?php endif; ?> -->

        <?php
        //if (in_array($_access, array('admin', 'mahasiswa'))) {
        $sql = "SELECT * FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			WHERE krs.nim='{$nim}'
			ORDER BY matakuliah.kode ASC";
        /*
	} else if ($_access == 'dosen') {
		$sql = "SELECT krs.*,matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama as dosen_nama, dosen.gelar as dosen_gelar 
			FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			LEFT JOIN dosen_wali ON dosen_wali.mahasiswa_nim=krs.nim
			WHERE krs.nim='{$nim}' AND dosen_wali.dosen_npk='{$_username}'
			ORDER BY matakuliah.kode ASC";
	}*/

        $query = mysqli_query($koneksi, $sql);
        ?>

        <table class="table table-sm table-bordered table-striped">
            <thead class="thead-light">
                <tr height="40px">
                    <th width="20px" style="text-align: center;">No</th>
                    <th width="50px" style="text-align: center;">Kode</th>
                    <th width="250px" style="text-align: center;">Matakuliah</th>
                    <th width="300px" style="text-align: center;">Dosen</th>
                    <th width="50px" style="text-align: center;">Hapus</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (mysqli_num_rows($query) > 0) :
                    $no = 1;
                    while ($field = mysqli_fetch_array($query)) :
                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td style="text-align: center;"><?= $field['matakuliah_kode'] ?></td>
                            <td><?= $field['nama'] ?></td>
                            <td><?= $field['nama_dosen'] ?>, <?= $field['gelar'] ?></td>
                            <td style="text-align: center;">
                                <a href="<?= $_url ?>krs/delete/<?= $nim ?>/<?= $field['dosen_mk_id'] ?>/<?= $field['dosen_npk']; ?>/<?= urlencode($field['nama']) ?>/<?= $field['matakuliah_kode']; ?>"><span class="mif-cross"></span></a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                else :
                    ?>
                    <tr>
                        <td colspan="4">
                            Data tidak ditemukan
                        </td>
                    </tr>
                <?php
                endif;
                ?>

            </tbody>
        </table>
        <style type="text/css">
            .input-control {
                border: 1px solid #d9d9d9;
                padding: 10px;
            }

            td,
            th {
                font-family: Arial, Helvetica, sans-serif;
                font-family: Arial, Helvetica, sans-serif !important;
                font-size: medium;
            }
        </style>
</body>

</html>