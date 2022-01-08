<html>
<title>Penilaian CSF dan Hasil Akhir</title>

<body>

    <?php
    include 'aset/query_gap.php';
    include 'aset/class_core.php';
    include 'aset/hitung_bobot.php';
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <h2>
        <a href="<?= $_url ?>" class="mif-arrow-left mif-2x"><span></span></a>
        Dashboard
    </h2>

    <h3 style="margin-bottom: 20px; margin-top: 40px;">
        CORE DAN SECONDARY FACTOR
        <h4>1. Aspek <?= $Persentase_A['nama_aspek']; ?></h4>
    </h3>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <?php $cf = mysqli_fetch_array($query_cf); ?>
            <tr height="40px">
                <th width="5%" style="text-align: center;">No</th>
                <th width="10%" style="text-align: center;">NIDN</th>
                <th width="35%" style="text-align: center;">Nama</th>
                <th width="5%" style="text-align: center;">Ai1</th>
                <th width="5%" style="text-align: center;">Ai2</th>
                <th width="5%" style="text-align: center;">Ai3</th>
                <th width="5%" style="text-align: center;">Ai4</th>
                <th width="5%" style="text-align: center;">Ai5</th>
                <th width="5%" style="text-align: center;">NCF</th>
                <th width="5%" style="text-align: center;">NSF</th>
                <th width="8%" style="text-align: center;">Nilai Total</th>
            </tr>
        </thead>
        <?php include 'aset/class_core.php'; ?>
        <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) :
                $no = 1;
                while ($field = mysqli_fetch_array($query)) :
                    $cfa1 = ($cfAi1 == 1) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                    $cfa2 = ($cfAi2 == 1) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                    $cfa3 = ($cfAi3 == 1) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                    $cfa4 = ($cfAi4 == 1) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                    $cfa5 = ($cfAi5 == 1) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                    $ncfA = ($cfa1 + $cfa2 + $cfa3 + $cfa4 + $cfa5) / $banyak_cfA;
                    $output_ncfA = number_format($ncfA, 2, '.', '');

                    $sfa1 = ($cfAi1 == 0) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                    $sfa2 = ($cfAi2 == 0) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                    $sfa3 = ($cfAi3 == 0) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                    $sfa4 = ($cfAi4 == 0) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                    $sfa5 = ($cfAi5 == 0) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                    $nsfA = ($sfa1 + $sfa2 + $sfa3 + $sfa4 + $sfa5) / $banyak_sfA;
                    $output_nsfA = number_format($nsfA, 2, '.', '');

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntA = ($cfPercentage / 100 * $ncfA) + ($sfPercentage / 100 * $nsfA);
                    $output_ntA = number_format($ntA, 2, '.', '');
            ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $field['npk'] ?></td>
                        <td><?= $field['nama_dosen'] ?> <?= $field['gelar'] ?></td>
                        <td style="text-align: center;"><?= $b_Ai1 = hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) ?></td>
                        <td style="text-align: center;"><?= $b_Ai2 = hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Ai3 = hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Ai4 = hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) ?></td>
                        <td style="text-align: center;"><?= $b_Ai5 = hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) ?></td>
                        <td style="text-align: center;"><?= $output_ncfA ?></td>
                        <td style="text-align: center;"><?= $output_nsfA ?></td>
                        <td style="text-align: center;" class="table-success"><?= $output_ntA ?></td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </tbody>
    </table>

    <?php
    include 'aset/query_gap.php';
    include 'aset/class_core.php';
    ?>

    <h3 style="margin-bottom: 20px;">
        <h4>2. Aspek <?= $Persentase_B['nama_aspek']; ?></h4>
    </h3>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <?php $cf = mysqli_fetch_array($query_cf); ?>
            <tr height="40px">
                <th width="5%" style="text-align: center;">No</th>
                <th width="10%" style="text-align: center;">NIDN</th>
                <th width="30%" style="text-align: center;">Nama</th>
                <th width="5%" style="text-align: center;">Bi1</th>
                <th width="5%" style="text-align: center;">Bi2</th>
                <th width="5%" style="text-align: center;">Bi3</th>
                <th width="5%" style="text-align: center;">Bi4</th>
                <th width="5%" style="text-align: center;">Bi5</th>
                <th width="5%" style="text-align: center;">Bi6</th>
                <th width="5%" style="text-align: center;">NCF</th>
                <th width="5%" style="text-align: center;">NSF</th>
                <th width="8%" style="text-align: center;">Nilai Total</th>
            </tr>
        </thead>
        <?php include 'aset/class_core.php'; ?>
        <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) :
                $no = 1;
                while ($field = mysqli_fetch_array($query)) :
                    $cfb1 = ($cfBi1 == 1) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                    $cfb2 = ($cfBi2 == 1) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                    $cfb3 = ($cfBi3 == 1) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                    $cfb4 = ($cfBi4 == 1) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                    $cfb5 = ($cfBi5 == 1) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                    $cfb6 = ($cfBi6 == 1) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                    $ncfB = ($cfb1 + $cfb2 + $cfb3 + $cfb4 + $cfb5 + $cfb6) / $banyak_cfB;
                    $output_ncfB = number_format($ncfB, 2, '.', '');

                    $sfb1 = ($cfBi1 == 0) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                    $sfb2 = ($cfBi2 == 0) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                    $sfb3 = ($cfBi3 == 0) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                    $sfb4 = ($cfBi4 == 0) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                    $sfb5 = ($cfBi5 == 0) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                    $sfb6 = ($cfBi6 == 0) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                    $nsfB = ($sfb1 + $sfb2 + $sfb3 + $sfb4 + $sfb5 + $sfb6) / $banyak_sfB;
                    $output_nsfB = number_format($nsfB, 2, '.', '');

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntB = ($cfPercentage / 100 * $ncfB) + ($sfPercentage / 100 * $nsfB);
                    $output_ntB = number_format($ntB, 2, '.', '');
            ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $field['npk'] ?></td>
                        <td><?= $field['nama_dosen'] ?><?= $field['gelar'] ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Bi1 = hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) ?></td>
                        <td style="text-align: center;"><?= $b_Bi2 = hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Bi3 = hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Bi4 = hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Bi5 = hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) ?></td>
                        <td style="text-align: center;"><?= $b_Bi6 = hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) ?></td>
                        <td style="text-align: center;"><?= $output_ncfB ?></td>
                        <td style="text-align: center;"><?= $output_nsfB ?></td>
                        <td style="text-align: center;" class="table-success"><?= $output_ntB ?></td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </tbody>
    </table>

    <?php
    include 'aset/query_gap.php';
    include 'aset/class_core.php';
    ?>

    <h3 style="margin-bottom: 20px;">
        <h4>3. Aspek <?= $Persentase_C['nama_aspek']; ?></h4>
    </h3>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <?php $cf = mysqli_fetch_array($query_cf); ?>
            <tr height="40px">
                <th width="5%" style="text-align: center;">No</th>
                <th width="10%" style="text-align: center;">NIDN</th>
                <th width="52%" style="text-align: center;">Nama</th>
                <th width="5%" style="text-align: center;">Ci1</th>
                <th width="5%" style="text-align: center;">Ci2</th>
                <th width="5%" style="text-align: center;">Ci3</th>
                <th width="5%" style="text-align: center;">NCF</th>
                <th width="5%" style="text-align: center;">NSF</th>
                <th width="8%" style="text-align: center;">Nilai Total</th>
            </tr>
        </thead>
        <?php include 'aset/class_core.php'; ?>
        <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) :
                $no = 1;
                while ($field = mysqli_fetch_array($query)) :
                    $cfc1 = ($cfCi1 == 1) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                    $cfc2 = ($cfCi2 == 1) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                    $cfc3 = ($cfCi3 == 1) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;;
                    $ncfC = ($cfc1 + $cfc2 + $cfc3) / $banyak_cfC;
                    $output_ncfC = number_format($ncfC, 2, '.', '');

                    $sfc1 = ($cfCi1 == 0) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                    $sfc2 = ($cfCi2 == 0) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                    $sfc3 = ($cfCi3 == 0) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;
                    $nsfC = ($sfc1 + $sfc2 + $sfc3) / $banyak_sfC;
                    $output_nsfC = number_format($nsfC, 2, '.', '');

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntC = ($cfPercentage / 100 * $ncfC) + ($sfPercentage / 100 * $nsfC);
                    $output_ntC = number_format($ntC, 2, '.', '');
            ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $field['npk'] ?></td>
                        <td><?= $field['nama_dosen'] ?><?= $field['gelar'] ?></td>
                        <td style="text-align: center;" class="table-danger"><?= $b_Ci1 = hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) ?></td>
                        <td style="text-align: center;"><?= $b_Ci2 = hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) ?></td>
                        <td style="text-align: center;"><?= $b_Ci3 = hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) ?></td>
                        <td style="text-align: center;"><?= $output_ncfC ?></td>
                        <td style="text-align: center;"><?= $output_nsfC ?></td>
                        <td style="text-align: center;" class="table-success"><?= $output_ntC ?></td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </tbody>
    </table>

    <?php
    include 'aset/query_gap.php';
    include 'aset/class_core.php';
    ?>

    <h3 style="margin-bottom: 20px;">
        <h4>4. Tabel Nilai Akhir</h4>
        <p>Aspek A : <?= $Persentase_A['persentase']; ?>% , Aspek B : <?= $Persentase_B['persentase']; ?>% , Aspek C : <?= $Persentase_C['persentase']; ?>%</p>
    </h3>

    <table class="table table-sm table-bordered table-striped">
        <thead class="thead-light">
            <?php $cf = mysqli_fetch_array($query_cf); ?>
            <tr height="40px">
                <th width="5%" style="text-align: center;">No</th>
                <th width="10%" style="text-align: center;">NIDN</th>
                <th width="35%" style="text-align: center;">Nama</th>
                <th width="12%" style="text-align: center;">Nilai Total A</th>
                <th width="12%" style="text-align: center;">Nilai Total B</th>
                <th width="12%" style="text-align: center;">Nilai Total C</th>
                <th width="12%" style="text-align: center;">Hasil Akhir</th>
            </tr>
        </thead>
        <?php include 'aset/class_core.php'; ?>
        <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) :
                $no = 1;
                while ($field = mysqli_fetch_array($query)) :
                    // Perhitungan Core dan Secondary Aspek A
                    $cfa1 = ($cfAi1 == 1) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                    $cfa2 = ($cfAi2 == 1) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                    $cfa3 = ($cfAi3 == 1) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                    $cfa4 = ($cfAi4 == 1) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                    $cfa5 = ($cfAi5 == 1) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                    $ncfA = ($cfa1 + $cfa2 + $cfa3 + $cfa4 + $cfa5) / $banyak_cfA;


                    $sfa1 = ($cfAi1 == 0) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                    $sfa2 = ($cfAi2 == 0) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                    $sfa3 = ($cfAi3 == 0) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                    $sfa4 = ($cfAi4 == 0) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                    $sfa5 = ($cfAi5 == 0) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                    $nsfA = ($sfa1 + $sfa2 + $sfa3 + $sfa4 + $sfa5) / $banyak_sfA;

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntA = ($cfPercentage / 100 * $ncfA) + ($sfPercentage / 100 * $nsfA);
                    $output_nilai_akhir_A = number_format($ntA, 2, '.', '');

                    // Perhitungan Core dan Secondary Aspek B
                    $cfb1 = ($cfBi1 == 1) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                    $cfb2 = ($cfBi2 == 1) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                    $cfb3 = ($cfBi3 == 1) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                    $cfb4 = ($cfBi4 == 1) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                    $cfb5 = ($cfBi5 == 1) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                    $cfb6 = ($cfBi6 == 1) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                    $ncfB = ($cfb1 + $cfb2 + $cfb3 + $cfb4 + $cfb5 + $cfb6) / $banyak_cfB;

                    $sfb1 = ($cfBi1 == 0) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                    $sfb2 = ($cfBi2 == 0) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                    $sfb3 = ($cfBi3 == 0) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                    $sfb4 = ($cfBi4 == 0) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                    $sfb5 = ($cfBi5 == 0) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                    $sfb6 = ($cfBi6 == 0) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                    $nsfB = ($sfb1 + $sfb2 + $sfb3 + $sfb4 + $sfb5 + $sfb6) / $banyak_sfB;

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntB = ($cfPercentage / 100 * $ncfB) + ($sfPercentage / 100 * $nsfB);
                    $output_nilai_akhir_B = number_format($ntB, 2, '.', '');

                    // Perhitungan Core dan Secondary Aspek C
                    $cfc1 = ($cfCi1 == 1) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                    $cfc2 = ($cfCi2 == 1) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                    $cfc3 = ($cfCi3 == 1) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;;
                    $ncfC = ($cfc1 + $cfc2 + $cfc3) / $banyak_cfC;

                    $sfc1 = ($cfCi1 == 0) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                    $sfc2 = ($cfCi2 == 0) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                    $sfc3 = ($cfCi3 == 0) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;
                    $nsfC = ($sfc1 + $sfc2 + $sfc3) / $banyak_sfC;

                    $cfPercentage = $cf['percentage'];
                    $sfPercentage = 100 - $cfPercentage;
                    $ntC = ($cfPercentage / 100 * $ncfC) + ($sfPercentage / 100 * $nsfC);
                    $output_nilai_akhir_C = number_format($ntC, 2, '.', '');

                    //Nilai Hasil Akhir Aspek A : 20% Aspek B: 50% Aspek C: 30%
                    $nHA = (($ntA * ($Persentase_A['persentase'] / 100)) + ($ntB * ($Persentase_B['persentase'] / 100)) + ($ntC * ($Persentase_C['persentase']) / 100));
                    $output_nilai_total_akhir = number_format($nHA, 2, '.', '');
            ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $field['npk'] ?></td>
                        <td><?= $field['nama_dosen'] ?> <?= $field['gelar'] ?></td>
                        <td style="text-align: center;"><?= $output_nilai_akhir_A ?></td>
                        <td style="text-align: center;"><?= $output_nilai_akhir_B ?></td>
                        <td style="text-align: center;"><?= $output_nilai_akhir_C ?></td>
                        <td style="text-align: center;" class="table-success"><?= $output_nilai_total_akhir ?></td>
                    </tr>
            <?php
                endwhile;
            endif;
            ?>
        </tbody>
    </table>

    <?php
    include 'aset/query_gap.php';
    if (isset($_POST['simpan'])) {
        extract($_POST);
        if (mysqli_num_rows($query) > 0) {
            while ($field = mysqli_fetch_array($query)) {
                $cfa1 = ($cfAi1 == 1) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                $cfa2 = ($cfAi2 == 1) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                $cfa3 = ($cfAi3 == 1) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                $cfa4 = ($cfAi4 == 1) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                $cfa5 = ($cfAi5 == 1) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                $ncfA = ($cfa1 + $cfa2 + $cfa3 + $cfa4 + $cfa5) / $banyak_cfA;


                $sfa1 = ($cfAi1 == 0) ? hitungBobot($field['Ai1'] - $queryKriteria['Ai1']) : 0;
                $sfa2 = ($cfAi2 == 0) ? hitungBobot($field['Ai2'] - $queryKriteria['Ai2']) : 0;
                $sfa3 = ($cfAi3 == 0) ? hitungBobot($field['Ai3'] - $queryKriteria['Ai3']) : 0;
                $sfa4 = ($cfAi4 == 0) ? hitungBobot($field['Ai4'] - $queryKriteria['Ai4']) : 0;
                $sfa5 = ($cfAi5 == 0) ? hitungBobot($field['Ai5'] - $queryKriteria['Ai5']) : 0;
                $nsfA = ($sfa1 + $sfa2 + $sfa3 + $sfa4 + $sfa5) / $banyak_sfA;

                $cfPercentage = $cf['percentage'];
                $sfPercentage = 100 - $cfPercentage;
                $ntA = ($cfPercentage / 100 * $ncfA) + ($sfPercentage / 100 * $nsfA);
                $output_nilai_akhir_A = number_format($ntA, 2, '.', '');

                // Perhitungan Core dan Secondary Aspek B
                $cfb1 = ($cfBi1 == 1) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                $cfb2 = ($cfBi2 == 1) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                $cfb3 = ($cfBi3 == 1) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                $cfb4 = ($cfBi4 == 1) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                $cfb5 = ($cfBi5 == 1) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                $cfb6 = ($cfBi6 == 1) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                $ncfB = ($cfb1 + $cfb2 + $cfb3 + $cfb4 + $cfb5 + $cfb6) / $banyak_cfB;

                $sfb1 = ($cfBi1 == 0) ? hitungBobot($field['Bi1'] - $queryKriteria['Bi1']) : 0;
                $sfb2 = ($cfBi2 == 0) ? hitungBobot($field['Bi2'] - $queryKriteria['Bi2']) : 0;
                $sfb3 = ($cfBi3 == 0) ? hitungBobot($field['Bi3'] - $queryKriteria['Bi3']) : 0;
                $sfb4 = ($cfBi4 == 0) ? hitungBobot($field['Bi4'] - $queryKriteria['Bi4']) : 0;
                $sfb5 = ($cfBi5 == 0) ? hitungBobot($field['Bi5'] - $queryKriteria['Bi5']) : 0;
                $sfb6 = ($cfBi6 == 0) ? hitungBobot($field['Bi6'] - $queryKriteria['Bi6']) : 0;
                $nsfB = ($sfb1 + $sfb2 + $sfb3 + $sfb4 + $sfb5 + $sfb6) / $banyak_sfB;

                $cfPercentage = $cf['percentage'];
                $sfPercentage = 100 - $cfPercentage;
                $ntB = ($cfPercentage / 100 * $ncfB) + ($sfPercentage / 100 * $nsfB);
                $output_nilai_akhir_B = number_format($ntB, 2, '.', '');

                // Perhitungan Core dan Secondary Aspek C
                $cfc1 = ($cfCi1 == 1) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                $cfc2 = ($cfCi2 == 1) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                $cfc3 = ($cfCi3 == 1) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;;
                $ncfC = ($cfc1 + $cfc2 + $cfc3) / $banyak_cfC;

                $sfc1 = ($cfCi1 == 0) ? hitungBobot($field['Ci1'] - $queryKriteria['Ci1']) : 0;
                $sfc2 = ($cfCi2 == 0) ? hitungBobot($field['Ci2'] - $queryKriteria['Ci2']) : 0;
                $sfc3 = ($cfCi3 == 0) ? hitungBobot($field['Ci3'] - $queryKriteria['Ci3']) : 0;
                $nsfC = ($sfc1 + $sfc2 + $sfc3) / $banyak_sfC;

                $cfPercentage = $cf['percentage'];
                $sfPercentage = 100 - $cfPercentage;
                $ntC = ($cfPercentage / 100 * $ncfC) + ($sfPercentage / 100 * $nsfC);
                $output_nilai_akhir_C = number_format($ntC, 2, '.', '');

                //Nilai Hasil Akhir Aspek A : 20% Aspek B: 50% Aspek C: 30%
                $nHA = (($ntA * ($Persentase_A['persentase'] / 100)) + ($ntB * ($Persentase_B['persentase'] / 100)) + ($ntC * ($Persentase_C['persentase']) / 100));
                $output_nilai_hasil_akhir = number_format($nHA, 2, '.', '');

                // Menyimpan Data Ke Tabel Hasil Akhir
                if (mysqli_num_rows($queryHasil_Akhir) <= 0) {
                    $sqlInput =  mysqli_query($koneksi, "INSERT INTO hasil_akhir values('', '{$field['npk']}', '{$output_nilai_akhir_A}', '{$output_nilai_akhir_B}', '{$output_nilai_akhir_C}', '{$output_nilai_hasil_akhir}')");
                } else if (mysqli_num_rows($queryHasil_Akhir) > 0) {
                    $sqlInput =  mysqli_query($koneksi, "DELETE FROM hasil_akhir WHERE npk_dosen='{$field['npk']}'");
                    $sqlInput =  mysqli_query($koneksi, "REPLACE INTO hasil_akhir SET id='', npk_dosen='{$field['npk']}', nilai_penggunaan_teknologi='{$output_nilai_akhir_A}', nilai_proses_pembelajaran='{$output_nilai_akhir_B}', nilai_kedisiplinan='{$output_nilai_akhir_C}', nilai_akhir='{$output_nilai_hasil_akhir}'");
                }
            }
            // ALERT
            if ($sqlInput or $sqlLaporan) {
                echo "<script>$.Notify({
                caption: 'Success',
                content: 'Data Nilai Berhasil Disimpan',
                type: 'success'
            });
            </script>";
            } else {
                echo "<script>$.Notify({
                caption: 'Failed',
                content: 'Data Nilai Gagal Disimpan',
                type: 'alert'
            });</script>";
            }
        }
    }
    ?>
    <?php if (isset($_POST['laporan'])) {
        $QHA = mysqli_query($koneksi, "SELECT * FROM hasil_akhir");
        $QLAP = mysqli_query($koneksi, "SELECT * FROM laporan");
        while ($field = mysqli_fetch_array($QHA)) {
            $NTA = $field['nilai_penggunaan_teknologi'];
            $NTB = $field['nilai_proses_pembelajaran'];
            $NTC = $field['nilai_kedisiplinan'];
            $NHA = $field['nilai_akhir'];
            $NPK_DOSEN = $field['npk_dosen'];
            // Nilai Minimum 
            $MinHA = (
                ($Persentase_A['nilai_standar'] * ($Persentase_A['persentase'] / 100)) +
                ($Persentase_B['nilai_standar'] * ($Persentase_B['persentase'] / 100)) +
                ($Persentase_C['nilai_standar'] * ($Persentase_C['persentase'] / 100)));
            if ($NTA < $Persentase_A['nilai_standar']) {
                $LapA = " kurang ";
            } else {
                $LapA = " bagus ";
            }
            if ($NTB < $Persentase_B['nilai_standar']) {
                $LapB = " kurang ";
            } else {
                $LapB = " bagus ";
            }
            if ($NTC < $Persentase_C['nilai_standar']) {
                $LapC = " kurang ";
            } else {
                $LapC = " bagus ";
            }
            // Query Nilai Gabungan Dosen
            $QE = mysqli_query($koneksi, "SELECT * FROM nilai_gabungan_dosen INNER JOIN dosen WHERE nilai_gabungan_dosen.npk_dosen = '$NPK_DOSEN' AND dosen.npk = '$NPK_DOSEN'");
            while ($Evaluasi = mysqli_fetch_array($QE)) {

                if ($NHA < $MinHA) {
                    $QK = mysqli_query($koneksi, "SELECT * FROM kriteria");
                    $Kriteria = mysqli_fetch_all($QK);
                    // EVALUASI A B C
                    if ($NTA < $Persentase_A['nilai_standar'] && $NTB < $Persentase_B['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6
                            . "3." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI A B 
                    else if ($NTA < $Persentase_A['nilai_standar'] && $NTB < $Persentase_B['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6;
                    } // EVALUASI A C 
                    else if ($NTA < $Persentase_A['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5
                            . "2." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI B C
                    else if ($NTB < $Persentase_B['nilai_standar'] && $NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6
                            . "2." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    } // EVALUASI A 
                    else if ($NTA < $Persentase_A['nilai_standar']) {
                        if ($Evaluasi['Ai1'] < 2) {
                            $EA1 = "-" . $Kriteria[0][2] . "<br>" . "\r\n";
                        } else {
                            $EA1 = '';
                        }
                        if ($Evaluasi['Ai2'] < 3) {
                            $EA2 = "-" . $Kriteria[1][2] . "<br>" . "\r\n";
                        } else {
                            $EA2 = '';
                        }
                        if ($Evaluasi['Ai3'] < 3) {
                            $EA3 = "-" . $Kriteria[2][2] . "<br>" . "\r\n";
                        } else {
                            $EA3 = '';
                        }
                        if ($Evaluasi['Ai4'] < 3) {
                            $EA4 = "-" . $Kriteria[3][2] . "<br>" . "\r\n";
                        } else {
                            $EA4 = '';
                        }
                        if ($Evaluasi['Ai5'] < 2) {
                            $EA5 = "-" . $Kriteria[4][2] . "<br>" . "\r\n";
                        } else {
                            $EA5 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekA . '<br>' . "\r\n"
                            . $EA1 . $EA2 . $EA3 . $EA4 . $EA5;
                    } // EVALUASI B
                    else if ($NTB < $Persentase_B['nilai_standar']) {
                        if ($Evaluasi['Bi1'] < 2) {
                            $EB1 = "-" . $Kriteria[5][2] . "<br>" . "\r\n";
                        } else {
                            $EB1 = '';
                        }
                        if ($Evaluasi['Bi2'] < 2) {
                            $EB2 = "-" . $Kriteria[6][2] . "<br>" . "\r\n";
                        } else {
                            $EB2 = '';
                        }
                        if ($Evaluasi['Bi3'] < 3) {
                            $EB3 = "-" . $Kriteria[7][2] . "<br>" . "\r\n";
                        } else {
                            $EB3 = '';
                        }
                        if ($Evaluasi['Bi4'] < 3) {
                            $EB4 = "-" . $Kriteria[8][2] . "<br>" . "\r\n";
                        } else {
                            $EB4 = '';
                        }
                        if ($Evaluasi['Bi5'] < 3) {
                            $EB5 = "-" . $Kriteria[9][2] . "<br>" . "\r\n";
                        } else {
                            $EB5 = '';
                        }
                        if ($Evaluasi['Bi6'] < 2) {
                            $EB6 = "-" . $Kriteria[10][2] . "<br>" . "\r\n";
                        } else {
                            $EB6 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekB . '<br>' . "\r\n"
                            . $EB1 . $EB2 . $EB3 . $EB4 . $EB5 . $EB6;
                    } // EVALUASI C
                    else if ($NTC < $Persentase_C['nilai_standar']) {
                        if ($Evaluasi['Ci1'] < 3) {
                            $EC1 = "-" . $Kriteria[11][2] . "<br>" . "\r\n";
                        } else {
                            $EC1 = '';
                        }
                        if ($Evaluasi['Ci2'] < 3) {
                            $EC2 = "-" . $Kriteria[12][2] . "<br>" . "\r\n";
                        } else {
                            $EC2 = '';
                        }
                        if ($Evaluasi['Ci3'] < 2) {
                            $EC3 = "-" . $Kriteria[13][2] . "<br>" . "\r\n";
                        } else {
                            $EC3 = '';
                        }
                        $LapHA = "Kinerja Dosen Kurang Perlu Meningkatkan :" . '<br>' . "\r\n"
                            . "1." . $AspekC . '<br>' . "\r\n"
                            . $EC1 . $EC2 . $EC3;
                    }
                } else if ($NHA > $MinHA) {
                    $LapHA = " Kinerja Dosen Bagus";
                }
                // SIMPAN DATA
                if (mysqli_num_rows($queryLaporan) <= 0) {
                    $sqlLaporan =  mysqli_query($koneksi, "INSERT INTO laporan values('', '{$Evaluasi['npk']}', '{$Evaluasi['nama_dosen']}','{$LapA}', '{$LapB}', '{$LapC}', '{$LapHA}')");
                } else if (mysqli_num_rows($queryHasil_Akhir) > 0) {
                    $sqlLaporan =  mysqli_query($koneksi, "DELETE FROM laporan WHERE npk_dosen='{$Evaluasi['npk']}'");
                    $sqlLaporan =  mysqli_query($koneksi, "REPLACE INTO laporan values('', '{$Evaluasi['npk']}', '{$Evaluasi['nama_dosen']}','{$LapA}', '{$LapB}', '{$LapC}', '{$LapHA}')");
                }
            }
        }
        header("refresh:0;{$_url}laporan");
    }
    ?>

    <form method="POST">
        <span class="place-right" style="margin-left: 10px;">
            <button type="laporan" name="laporan" class="button success">Laporan</button>
        </span>
    </form>
    <form method="POST">
        <span class="place-right">
            <button type="simpan" name="simpan" class="button success">Simpan Nilai</button>
        </span>
    </form>

    <br><br><br>
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