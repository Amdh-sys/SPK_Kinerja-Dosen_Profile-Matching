<html>
<title>Nilai Akhir Dosen</title>

<body>

    <?php
    include 'aset/query_masterdata.php';
    include 'aset/class_core.php';
    // Nilai Standar
    $A = 3;
    $B = 4;
    $C = 4.5;
    $MIN = ($A * ($Persentase_A['persentase'] / 100)) + ($B * ($Persentase_B['persentase'] / 100)) + ($C * ($Persentase_C['persentase'] / 100));
    $queryNGD = mysqli_query($koneksi, "SELECT * FROM nilai_gabungan_dosen");
    // TANGGAL
    date_default_timezone_set('Asia/Jakarta');
    $hari = date('d-m-Y');
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM hasil_akhir INNER JOIN dosen WHERE hasil_akhir.npk_dosen = dosen.npk AND hasil_akhir.npk_dosen = $uri_segments[4]");
    $LHA = mysqli_fetch_array($data);
    ?>
    <h3>
        <a href="<?= $_url ?>laporan" class="mif-arrow-left mif-2x"><span></span></a>
        Laporan Evaluasi Dosen
        <h3 style="text-align: center; margin-top: 20px;">
            NILAI AKHIR KINERJA DOSEN
        </h3>
        <p style="text-align: center;">SPK Penilaian Kinerja Dosen Mengajar Secara Daring</p>
        <p style="text-align: left; margin-top: 10px;">
            Nama Dosen : <?= $LHA['nama_dosen'] . " " . $LHA['gelar']; ?>
        </p>
    </h3>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <tr height="40px">
                <th width="5%" style="text-align: center;">NIDN</th>
                <th width="30%" style="text-align: center;">Nama</th>
                <th width="10%">Penggunaan Teknologi</th>
                <th width="10%">Pembelajaran</th>
                <th width="10%">Kedisiplinan</th>
                <th width="10%">Nilai Akhir</th>
                <th width="5%">Ket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $LHA['npk_dosen']; ?></td>
                <td><?= $LHA['nama_dosen']; ?>, <?= $LHA['gelar']; ?></td>
                <td style="text-align: center;"><?= $LHA['nilai_penggunaan_teknologi']; ?></td>
                <td style="text-align: center;"><?= $LHA['nilai_proses_pembelajaran']; ?></td>
                <td style="text-align: center;"><?= $LHA['nilai_kedisiplinan']; ?></td>
                <td style="text-align: center;"><?= $LHA['nilai_akhir']; ?></td>
                <td style="text-align: center;"><?= $LHA['nilai_akhir'] - $MIN; ?></td>
            </tr>
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