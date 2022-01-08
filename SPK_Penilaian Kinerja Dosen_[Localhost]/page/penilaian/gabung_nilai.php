<?php
$sql = "SELECT * FROM dosen INNER JOIN nilai_gabungan_dosen on nilai_gabungan_dosen.npk_dosen=dosen.npk ORDER BY npk ASC";
$query = mysqli_query($koneksi, $sql);
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<html>

<head>
    <title>Halaman Gabungan Nilai</title>
    <h2>
        <a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
        Dashboard
        <h3 style="text-align:center;">TABEL GABUNGAN NILAI DOSEN</h3>
        <p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
        <form method="POST">
            <span class="place-right">
                <button type="hitung" name="hitung" class="button success" style="margin-bottom: 5px;">Hitung Nilai</button>
            </span>
        </form>
    </h2>

    <?php
    if (isset($_POST['hitung'])) {
        header("Location: {$_url}tabel/index");
    }
    ?>

<body>
    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr height="40px">
                <th width="1%" style="text-align: center;">No</th>
                <th width="8%" style="text-align: center;">NIDN</th>
                <th width="30%" style="text-align: center;">Nama</th>
                <th width="4%" style="text-align: center;">A1</th>
                <th width="4%" style="text-align: center;">A2</th>
                <th width="4%" style="text-align: center;">A3</th>
                <th width="4%" style="text-align: center;">A4</th>
                <th width="4%" style="text-align: center;">A5</th>
                <th width="4%" style="text-align: center;">B1</th>
                <th width="4%" style="text-align: center;">B2</th>
                <th width="4%" style="text-align: center;">B3</th>
                <th width="4%" style="text-align: center;">B4</th>
                <th width="4%" style="text-align: center;">B5</th>
                <th width="4%" style="text-align: center;">B6</th>
                <th width="4%" style="text-align: center;">C1</th>
                <th width="4%" style="text-align: center;">C2</th>
                <th width="4%" style="text-align: center;">C3</th>
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
                        <td><?= $field['npk_dosen'] ?></td>
                        <td><?= $field['nama_dosen'] ?> <?= $field['gelar'] ?></td>
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
    <style>
        td,
        th {
            font-family: Arial, Helvetica, sans-serif;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: medium;
        }
    </style>
</body>
</head>

</html>