<html>
<title>Halaman Kriteria</title>

<body>


    <h2>
        <a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
        Dashboard
    </h2>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <?php
    if (isset($_POST['csf'])) {
        header("Location: {$_url}kriteria/edit_csf_kriteria");
    } else if (isset($_POST['nilai'])) {
        header("Location: {$_url}kriteria/edit_nilai_kriteria");
    }
    ?>
    <h3 style="text-align: center;">KRITERIA</h3>
    <p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
    <?php
    $sql = "SELECT kriteria.*, aspek.nama_aspek FROM kriteria 
    LEFT JOIN aspek 
    ON aspek.kode=kriteria.kode_aspek";
    $query = mysqli_query($koneksi, $sql);

    $Nilai = "SELECT * FROM nilai_kriteria";
    $queryNilai = mysqli_query($koneksi, $Nilai);

    $Core = "SELECT * FROM core_factor";
    $queryCore = mysqli_query($koneksi, $Core);

    $rows = array();
    $Tabel = "SHOW COLUMNS FROM nilai_kriteria";
    $result = mysqli_query($koneksi, $Tabel);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row['Field'];
    }

    $rowsf = array();
    $Tabel = "SHOW COLUMNS FROM core_factor";
    $result = mysqli_query($koneksi, $Tabel);
    while ($rowf = mysqli_fetch_assoc($result)) {
        $rowsf[] = $rowf['Field'];
    }


    ?>
    <form method="POST">
        <span class="place-right" style="margin-right: px;">
            <button type="csf" name="csf" class="button success">Edit CSF</button>
        </span>
        <span class="place-right" style="margin-right: 5px;">
            <button type="nilai" name="nilai" class="button success">Edit Nilai</button>
        </span>
    </form>
    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr height="40px">
                <th width="40px" style="text-align: center;">Kode</th>
                <th width="40px" style="text-align: center;">Aspek</th>
                <th width="200px" style="text-align: center;">Nama Aspek</th>
                <th width="500px" style="text-align: center;">Nama Kriteria</th>
                <th width="50px" style="text-align: center;">Nilai</th>
                <th width="50px" style="text-align: center;">Core</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            $nof = 1;
            if (mysqli_num_rows($queryNilai) > 0) :
                if (mysqli_num_rows($queryCore) > 0) :
                    if (mysqli_num_rows($query) > 0) :
                        while ($Nilai = mysqli_fetch_array($queryNilai)) :
                            while ($Core = mysqli_fetch_array($queryCore)) :
                                while ($field = mysqli_fetch_array($query)) :
            ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $field['kode'] ?></td>
                                        <td style="text-align: center;"><?= $field['kode_aspek'] ?></td>
                                        <td><?= $field['nama_aspek'] ?></td>
                                        <td><?= $field['nama_kriteria'] ?></td>
                                        <td style="text-align: center;"><?= $Nilai{
                                                                            $rows[$no++]} ?></td>
                                        <td style="text-align: center;"><?= $Core{
                                                                            $rowsf[$nof++]} ?></td>
                                    </tr>
                        <?php
                                endwhile;
                            endwhile;
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
                endif;
            endif;
            ?>

        </tbody>
    </table>
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