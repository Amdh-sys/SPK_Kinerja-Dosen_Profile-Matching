<html>
<title>Halaman Aspek</title>

<body>
    <h2>
        <a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
        Dashboard
    </h2>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <h3 style="text-align: center;">ASPEK</h3>
    <p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
    <?php
    $sql = "SELECT * FROM aspek ORDER BY kode ASC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr height="40px">
                <th width="50px" style="text-align: center;">kode</th>
                <th width="500px" style="text-align: center;">Nama Aspek</th>
                <th width="80" style="text-align: center;">Prosentase</th>
                <th width="80px">Ubah Nilai</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($query) > 0) :
                while ($field = mysqli_fetch_array($query)) :
            ?>
                    <tr>
                        <td style="text-align: center;"><?= $field['kode'] ?></td>
                        <td><?= $field['nama_aspek'] ?></td>
                        <td style="text-align: center;"><?= $field['persentase'] ?>
                        </td>
                        <td style="text-align: center;">
                            <div class="inline-block">
                                <a href="<?= $_url ?>aspek/edit/<?= $field['kode'] ?>/<?= urlencode($field['nama_aspek']) ?>"><span class="mif-pencil"></span> Edit</a>
                            </div>
                        </td>
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