<html>
<title>Cetak Evaluasi</title>

<body>

    <h4 style="text-align: center;">TABEL HASIL EVALUASI DOSEN</h4>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $hari = date('d-m-Y');
    $jam = date('H:i:s');
    ?>
    <p style="text-align: right;"><em>Tanggal : <?= $hari; ?>, Pukul : <?= $jam; ?></em></p>
    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th width="10%">NIDN</th>
            <th width="20%">Nama Dosen</th>
            <th width="3%">Peng. Teknologi</th>
            <th width="3%">Pros. Pembelajaran</th>
            <th width="3%">Kedisiplinan</th>
            <th width="71%">Evaluasi</th>
            <th width="5%">Total Nilai</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM laporan INNER JOIN hasil_akhir INNER JOIN dosen WHERE laporan.npk_dosen = hasil_akhir.npk_dosen AND hasil_akhir.npk_dosen = dosen.npk
    ");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['npk_dosen']; ?></td>
                <td><?= $data['nama_dosen'] . " " . $data['gelar']; ?></td>
                <td style="text-align: center;"><?= $data['penggunaan_teknologi']; ?></td>
                <td style="text-align: center;"><?= $data['proses_pembelajaran']; ?></td>
                <td style="text-align: center;"><?= $data['kedisiplinan']; ?></td>
                <td><?= $data['hasil']; ?></td>
                <td><?= $data['nilai_akhir']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>