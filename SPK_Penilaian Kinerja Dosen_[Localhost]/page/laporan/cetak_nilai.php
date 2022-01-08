<h4 style="text-align: center;">TABEL DAFTAR NILAI DOSEN</h4>
<?php
include 'aset/class_core.php';
date_default_timezone_set('Asia/Jakarta');
$hari = date('d-m-Y');
$jam = date('H:i:s');
$A = 3;
$B = 4;
$C = 4.5;
$MIN = ($A * ($Persentase_A['persentase'] / 100)) + ($B * ($Persentase_B['persentase'] / 100)) + ($C * ($Persentase_C['persentase'] / 100));
?>
<p style="text-align: right;"><em>Tanggal : <?= $hari; ?>, Pukul : <?= $jam; ?></em></p>
<table border="1" style="width: 100%">
    <tr>
        <th width="5%" style="text-align: center;">No</th>
        <th width="8%" style="text-align: center;">NIDN</th>
        <th width="40%" style="text-align: center;">Nama</th>
        <th width="8%">Penggunaan Teknologi</th>
        <th width="8%">Pembelajaran</th>
        <th width="8%">Kedisiplinan</th>
        <th width="5%">Nilai Akhir</th>
        <th width="5%">Ket</th>
    </tr>
    <?php
    $no = 1;
    $sql = mysqli_query($koneksi, "SELECT * FROM hasil_akhir INNER JOIN dosen WHERE  hasil_akhir.npk_dosen = dosen.npk
    ");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['npk_dosen']; ?></td>
            <td><?= $data['nama_dosen'] . " " . $data['gelar']; ?></td>
            <td style="text-align: center;"><?= $data['nilai_penggunaan_teknologi']; ?></td>
            <td style="text-align: center;"><?= $data['nilai_proses_pembelajaran']; ?></td>
            <td style="text-align: center;"><?= $data['nilai_kedisiplinan']; ?></td>
            <td style="text-align: center;"><?= $data['nilai_akhir']; ?></td>
            <td style="text-align: center;"><?= $data['nilai_akhir'] - $MIN; ?></td>
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